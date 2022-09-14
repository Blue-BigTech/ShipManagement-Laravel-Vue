<?php

use App\Http\Controllers\LenderController;
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
    Route::resource('lenders', LenderController::class)->only([
        'index',
        'show',
        'store',
        'update',
        'destroy',
    ]);
    Route::get('lenders/list', [LenderController::class, 'fetchLenderList']);
});
