<?php

use App\Http\Controllers\LenderPostController;
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
    Route::resource('lender-posts', LenderPostController::class)->only([
        'index',
        'store',
        'show',
        'update',
    ]);
    Route::post('lender-posts/delete/{id}', [LenderPostController::class, 'delete']);
});
/*-------------------------------------------*/
/* VIEWER *認証なし
/*-------------------------------------------*/
Route::get('lender-posts/viewer/index', [LenderPostController::class, 'viewerIndex']);
Route::get('lender-posts/viewer/list', [LenderPostController::class, 'viewerList']);
