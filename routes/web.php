<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\UserController;
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

Route::controller(UserController::class)->group(function () {
    Route::get('/register', 'index')->name('register.show');
});
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'index')->name('login.show');
    Route::post('/login', 'store')->name('login');
    Route::get('/logout', 'logout')->name('logout');
});
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::controller(UserController::class)->group(function () {
        Route::post('/update/profile', 'update')->name('profile.update');
    });
    Route::controller(CarController::class)->group(function () {
        Route::get('/car', 'create')->name('car.create');
        Route::post('/car', 'store')->name('car.save');
        Route::get('/car/view', 'index')->name('car.show');
        Route::get('/car/view/{id}', 'show')->name('car.view');
        Route::post('/update', 'update')->name('car.update');
    });
    Route::controller(HouseController::class)->group(function () {
        Route::get('/home', 'create')->name('home.create');
        Route::post('/home', 'store')->name('home.save');
        Route::get('/home/view', 'index')->name('home.show');
        Route::get('/home/view/{id}', 'show')->name('home.view');
        Route::post('/update', 'update')->name('home.update');
    });
    Route::controller(BusinessController::class)->group(function () {
        Route::get('/business', 'create')->name('business.create');
        Route::post('/business', 'store')->name('business.save');
        Route::get('/business/view', 'index')->name('business.show');
        Route::get('/business/view/{id}', 'show')->name('business.view');
        Route::post('/update', 'update')->name('business.update');
    });
});
