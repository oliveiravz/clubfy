<?php

use Illuminate\Support\Facades\Route;

Route::controller(LoginController::class)->group(function () {
    Route::get('/', 'App\Http\Controllers\LoginController@index');
    Route::post('/login', 'App\Http\Controllers\LoginController@login');
});