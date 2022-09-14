<?php

use App\Http\Controllers\PaymentOptionController;
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

Route::group(['middleware' => 'auth:sanctum'], function () {
    // Route::resource('payment-options', PaymentOptionController::class)->only([
    //     'show',
    //     'update',
    //     'destroy',
    // ]);
    Route::get('payment-options/list', [PaymentOptionController::class, 'fetchPaymentOptionList']);
});
