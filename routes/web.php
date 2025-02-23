<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::controller(LoginController::class)->group(function() {
    Route::post('login','login');
});