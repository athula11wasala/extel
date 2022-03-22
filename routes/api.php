<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ApiTokenController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

#post
Route::post('/register', [ApiTokenController::class, 'register']);
Route::post('/login', [ApiTokenController::class, 'login']);


Route::group(['middleware' => 'auth:api'], function () {
  
    #post
    Route::post('/logout', [ApiTokenController::class, 'logout']);

    Route::group(['prefix'=>'customer','as'=>'customer'], function () {

        #get
        Route::get('/', [CustomerController::class, 'index']);
        Route::get('/show/{id}', [CustomerController::class, 'show']);
        
        #post
        Route::post('/add', [CustomerController::class, 'create']);
        
        #put
        Route::put('/update/{id}', [CustomerController::class, 'update']);

        #delete
        Route::delete('/delete/{id}', [CustomerController::class, 'destroy']);
         
    });
    
});




