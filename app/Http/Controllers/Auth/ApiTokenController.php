<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Requests\UserRequest;

class ApiTokenController extends Controller
{

     /**
     * @OA\Post(
     * path="/api/register",
     * summary="User Register",
     * description="register by email, password",
     * operationId="authRegister",
     * tags={"auth"},
     * @OA\RequestBody(
     *    required=true,
     *    description="Pass user credentials",
     *    @OA\JsonContent(
     *       required={"email-uniquee","password","name"},
     *       @OA\Property(property="email", type="string", format="email", example="user1@mail.com"),
     *       @OA\Property(property="password", type="string", format="password", example="123456"),
     *       @OA\Property(property="name", type="string", format="text", example="jame"),
     *    ),
     * ),
     * @OA\Response(
     *    response=422,
     *    description="Wrong user registration response",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="The given data was invalid.")
     *        )
     *     )
     * )
     */
    public function register(UserRequest $request)
    {
        
        $data = [
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password),
        ];

        try {
            $user = User::create($data);

            $token = $user->createToken("API Token")->accessToken;
        } catch (Exception $ex) {
            return Response::json(["error" => $ex->getMessage()], 400);
        }

        return Response::json(["user" => $user, "access_token" => $token], 201);
    }

    /**
     * @OA\Post(
     * path="/api/login",
     * summary="Sign in",
     * description="Login by email, password",
     * operationId="authLogin",
     * tags={"auth"},
     * @OA\RequestBody(
     *    required=true,
     *    description="Pass user credentials",
     *    @OA\JsonContent(
     *       required={"email","password"},
     *       @OA\Property(property="email", type="string", format="email", example="user1@mail.com"),
     *       @OA\Property(property="password", type="string", format="password", example="123456")
     *    ),
     * ),
     * @OA\Response(
     *    response=422,
     *    description="Wrong credentials response",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Sorry, wrong email address or password. Please try again")
     *        )
     *     )
     * )
     */
    public function login(Request $request)
    {
        $data = [
            "email" => $request->email,
            "password" => $request->password,
        ];

        if (!auth()->attempt($data)) {
            return Response::json(
                [
                    "error" =>
                        "Sorry, wrong email address or password. Please try again",
                ],
                422
            );
        }

        $token = auth()
            ->user()
            ->createToken("API Token")->accessToken;

        return Response::json(
            ["user" => auth()->user(), "access_token" => $token],
            201
        );
    }

    /**
     * @OA\Post(
     * path="/api/logout",
     * summary="Logout",
     * description="Logout user and invalidate token",
     * operationId="authLogout",
     * tags={"auth"},
     * security={ {"bearer": {} }},
     * @OA\Response(
     *    response=200,
     *    description="Successfully logged out"
     *     ),
     * @OA\Response(
     *    response=401,
     *    description="Returns when user is not authenticated",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Not authorized"),
     *    )
     * )
     * )
     */
    public function logout(Request $request)
    {
        $request->user()
               ->token()
              ->revoke();
        return response()->json([
            "message" => "Successfully logged out",
        ]);
    }
}
