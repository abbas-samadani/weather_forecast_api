<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\WeatherController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



Route::group(['prefix' => 'v1/auth'], function () {
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('user-profile', [AuthController::class , 'userProfile']);
});

Route::group(['prefix' => 'v1','middleware' => 'auth:api'], function () {
    Route::get('/weather/{city}', [WeatherController::class, 'getWeather'])->name('getWeather');
});


