<?php

use App\Http\Controllers\CityController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;

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
    Route::resource('cities', CityController::class)->only([
        'index',
        'store',
        'show',
        'update',
        // 'destroy',
    ]);
    Route::get('cities/list', [CityController::class, 'fetchCityList']);
});
Route::get('cities/viewer/fetch/list/by-prefecture', [CityController::class, 'viewerFetchCityListByPrefectureId']);
/*-------------------------------------------*/
/* VIEWER *認証なし
/*-------------------------------------------*/
Route::get('cities/viewer/{cityName}', [CityController::class, 'viewerFetchCityShow']);
Route::get('cities/viewer/fetch/list/by-prefecture', [CityController::class, 'viewerFetchCityListByPrefecture']);
