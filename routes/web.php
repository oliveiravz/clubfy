<?php

use Illuminate\Support\Facades\Route;

Route::controller(LoginController::class)->group(function () {
    Route::get('/', 'App\Http\Controllers\LoginController@index');
    Route::post('/login', 'App\Http\Controllers\LoginController@login');
});

Route::controller(HomeController::class)->group(function () {
    Route::get('/home','App\Http\Controllers\HomeController@index')->name('home');
});

Route::controller(LogoutController::class)->group(function () {
    Route::post('/logout','App\Http\Controllers\LogoutController@logout')->name('logout');
});