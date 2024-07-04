<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homepage.homepage');
});

Route::middleware('guest')->group(function () {
    Route::get('/registro', [RegisterController::class, 'create'])->name('register');
    Route::post('/registro', [RegisterController::class, 'store']);
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('home');
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

    // Proyectos
    Route::group(['prefix' => 'proyectos'], function () {
        Route::get('/', [ProyectoController::class, 'index'])->name('proyectos.index');
        Route::get('/crear', [ProyectoController::class, 'create'])->name('proyectos.create');
        Route::post('/crear', [ProyectoController::class, 'store']);
        Route::delete('/{proyecto}', [ProyectoController::class, 'destroy'])->name('proyectos.destroy');
    });
});
