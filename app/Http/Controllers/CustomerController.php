<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;
use Exception;
use App\Services\CommonService;

class CustomerController extends Controller
{
    private $cmsService;

    public function __construct(CommonService $commonService)
    {
        $this->cmsService = $commonService;
    }

    /**
     * Get all customer.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = $this->cmsService->listCustomer();
            if ($data) {
                return response()->json(["data" => $data], 200);
            }

            return response()->json(
                ["error" => __("messages.un_processable_request")],
                400
            );
        } catch (Exception $ex) {
            return response()->json(["error" => $ex->getMessage()], 400);
        }
    }

    /**
     * Create a Customer.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CustomerRequest $request)
    {
        try {
            $data = $this->cmsService->createCustomer($request->all());
            if ($data) {
                return response()->json(
                    ["sucess" => "successfully added"],
                    200
                );
            }

            return response()->json(
                ["error" => __("messages.un_processable_request")],
                400
            );
        } catch (Exception $ex) {
            return response()->json(["error" => $ex->getMessage()], 400);
        }
    }

    /**
     * Display Customer.
     *
     * @bodyParam customerId integer required
     * @return \Illuminate\Http\Response
     */
    public function show($customerId = null)
    {
        try {
            $data = $this->cmsService->getCustoemr($customerId);
            if ($data) {
                return response()->json(["data" => $data], 200);
            }

            return response()->json(
                ["error" => __("messages.un_processable_request")],
                400
            );
        } catch (Exception $ex) {
            return response()->json(["error" => $ex->getMessage()], 400);
        }
    }

    /**
     * Update customer.
     *
     * @param  \Illuminate\Http\Request  $request
     * @bodyParam customerId integer required
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $customerId)
    {
        try {
            $data = $this->cmsService->updateCustomer(
                $customerId,
                $request->all()
            );
            if ($data) {
                return response()->json(
                    ["sucess" => "successfully updated"],
                    200
                );
            }

            return response()->json(
                ["error" => __("messages.un_processable_request")],
                400
            );
        } catch (Exception $ex) {
            return response()->json(["error" => $ex->getMessage()], 400);
        }
    }

    /**
     * delete customer
     *
     * @bodyParam customerId integer required
     * @return \Illuminate\Http\Response
     */
    public function destroy($customerId)
    {
        try {
            $data = $this->cmsService->deleteCustomer($customerId);
            if ($data) {
                return response()->json(
                    ["sucess" => "successfully deleted"],
                    200
                );
            }

            return response()->json(
                ["error" => __("messages.un_processable_request")],
                400
            );
        } catch (Exception $ex) {
            return response()->json(["error" => $ex->getMessage()], 400);
        }
    }
}
