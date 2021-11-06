<?php

use App\Http\Controllers\Api\AccessTokenController;
use App\Http\Controllers\API\AmenityController;
use App\Http\Controllers\API\CommunityController;
use App\Http\Controllers\API\EnquiryController;
use App\Http\Controllers\API\EventController;
use App\Http\Controllers\API\NewsController;
use App\Http\Controllers\API\PropertyController;
use App\Http\Controllers\API\RentController;
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

//API (Amr Younis)
Route::apiResource('communities', CommunityController::class)->middleware('localization');
Route::apiResource('properties', PropertyController::class)->middleware('localization');
Route::get('properties/status/{status}', [PropertyController::class, 'Status'])->middleware('localization');
Route::apiResource('rents', RentController::class)->middleware('localization');
Route::apiResource('amenities', AmenityController::class)->middleware('localization');
Route::apiResource('news', NewsController::class)->middleware('localization');
Route::apiResource('events', EventController::class)->middleware('localization');
Route::apiResource('enquiry', EnquiryController::class)->middleware('localization');




//Auth Request (Mohammed Obaid)
Route::post('auth/signUp', [AccessTokenController::class, 'signUp']);
Route::post('auth/code/send', [AccessTokenController::class, 'sendCode']);
Route::post('auth/code/check', [AccessTokenController::class, 'checkCode']);

Route::post('auth/password/before-update', [AccessTokenController::class, 'beforeUpdate']);
Route::post('auth/password/update', [AccessTokenController::class, 'updatePassword']);
Route::post('auth/tokens', [AccessTokenController::class, 'store']);
Route::delete('auth/tokens', [AccessTokenController::class, 'destroy'])
    ->middleware('auth:sanctum');

Route::post('auth/request/tenant', [AccessTokenController::class, 'requestAsTenant'])
    ->middleware('auth:sanctum');

Route::post('auth/request/owner', [AccessTokenController::class, 'requestAsOwner'])
    ->middleware('auth:sanctum');
