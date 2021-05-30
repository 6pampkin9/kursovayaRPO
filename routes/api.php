<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactController as ContactController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\PolicyTypeController;
use App\Http\Controllers\ProductController as ProductController;
use App\Http\Controllers\PurchaseController as PurchaseController;
use App\Http\Controllers\RoadMapController as RoadMapController;
use App\Http\Controllers\UserController as UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::namespace('api')->group(function () {
    Route::prefix('clients')->group(function (){
       Route::post('create',[ClientController::class,'create']);
       Route::post('list',[ClientController::class,'getClients']);

    });
    Route::prefix('users')->group(function (){
        Route::post('auth',[UserController::class,'auth']);

    });
    Route::prefix('policy')->group(function (){
        Route::post('create',[PolicyController::class,'createPolicy']);
        Route::post('list',[PolicyController::class,'getPolicies']);

    });
    Route::prefix('policy_type')->group(function (){
        Route::post('create',[PolicyTypeController::class,'createPolicyType']);
        Route::get('list',[PolicyTypeController::class,'getPolicyTypes']);

    });
    Route::prefix('contract')->group(function (){
        Route::post('create',[ContractController::class,'createContract']);
        Route::post('list',[ContractController::class,'getContracts']);

    });
});
