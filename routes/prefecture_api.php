<?php

use App\Http\Controllers\PrefectureController;
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
/*-------------------------------------------*/
/* ADMIN/LENDER
/*-------------------------------------------*/
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::resource('prefectures', PrefectureController::class)->only([
        'index',
        'store',
        'show',
        'update',
        'destroy',
    ]);
    Route::get('prefectures/fetch/lists/with-city-port', [PrefectureController::class, 'fetchAreaLists']);
    Route::get('prefectures/fetch/list', [PrefectureController::class, 'fetchPrefectureList']);
});
/*-------------------------------------------*/
/* VIEWER *認証なし
/*-------------------------------------------*/
Route::get('prefectures/viewer/{id}', [PrefectureController::class, 'fetchPrefectureWithCityViewer']);
