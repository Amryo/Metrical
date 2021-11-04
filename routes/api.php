<?php

use App\Http\Controllers\API\CommunityController;
use App\Http\Controllers\API\PropertyController;
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
Route::apiResource('communities', CommunityController::class)->middleware('localization');
Route::apiResource('properties', PropertyController::class)->middleware('localization');
