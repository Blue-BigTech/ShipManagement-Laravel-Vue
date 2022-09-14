<?php

use App\Http\Controllers\PortController;
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
    Route::resource('ports', PortController::class)->only([
        'index',
        'store',
        'show',
        'update',
        'destroy',
    ]);
    // Route::get('prefectures/with-city-port/lists', [PrefectureController::class, 'fetchAreaLists']);
    // Route::get('ports/list', [PortController::class, 'fetchPortList']);
});
