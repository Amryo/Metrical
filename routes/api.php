<?php

use App\Http\Controllers\Api\AccessTokenController;
use App\Http\Controllers\API\CommunityController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('auth/signUp', [AccessTokenController::class, 'signUp']);
Route::post('auth/code/send',[AccessTokenController::class , 'sendCode']);
Route::post('auth/code/check',[AccessTokenController::class , 'checkCode']);

Route::post('auth/password/before-update',[AccessTokenController::class , 'beforeUpdate']);
Route::post('auth/password/update',[AccessTokenController::class , 'updatePassword']);
Route::post('auth/tokens', [AccessTokenController::class , 'store']);
Route::delete('auth/tokens', [AccessTokenController::class, 'destroy'])
    ->middleware('auth:sanctum');

Route::post('auth/request/tenant', [AccessTokenController::class , 'requestAsTenant'])
->middleware('auth:sanctum');

Route::post('auth/request/owner', [AccessTokenController::class , 'requestAsOwner'])
->middleware('auth:sanctum');



Route::apiResource('comminications', CommunityController::class);
