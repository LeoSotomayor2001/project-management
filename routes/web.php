<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homepage.homepage');
});

Route::get('/registro',[RegisterController::class, 'create'])->name('register');
Route::post('/registro',[RegisterController::class, 'store']);

