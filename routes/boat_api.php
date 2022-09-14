<?php

use App\Http\Controllers\BoatController;
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
    //
});
/*-------------------------------------------*/
/* VIEWER *認証なし
/*-------------------------------------------*/
Route::get('boats/viewer/index', [BoatController::class, 'viewerIndex']);
Route::get('boats/viewer/show/{id}', [BoatController::class, 'viewerShow']);
