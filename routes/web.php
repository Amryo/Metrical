<?php

use App\Http\Controllers\Admin\CommunitiesController;
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\UsersController;


use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin-panel', function () {
    return view('admin.home.index');
});

Route::resource('admin/communities', CommunitiesController::class);
Route::resource('properties', PropertyController::class);
Route::resource('offers', OfferController::class);

Route::get('admin/binding-users', [UsersController::class, 'index'])->name('binding.users');
Route::get('admin/tenants-users', [UsersController::class, 'tenants'])->name('tenants.users');
Route::get('admin/owners-users', [UsersController::class, 'owners'])->name('owners.users');
Route::get('admin/binding-users/{id}', [UsersController::class, 'showBindingUser'])->name('binding.show');
Route::put('admin/binding-users/accept/{id}', [UsersController::class, 'acceptBinding'])->name('binding.accept');
Route::put('admin/binding-users/refuse/{id}', [UsersController::class, 'refuseBinding'])->name('binding.refuse');
