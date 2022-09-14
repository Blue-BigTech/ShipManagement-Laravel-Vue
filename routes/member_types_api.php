<?php

use App\Http\Controllers\MemberTypeController;
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
    // Route::resource('member-types', MemberTypeController::class)->only([
    //     'show',
    //     'update',
    //     'destroy',
    // ]);
    Route::get('member-types/list', [MemberTypeController::class, 'fetchMemberTypeList']);
});
