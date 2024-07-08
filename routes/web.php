<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\TareaController;
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
        Route::get('/{proyecto}', [ProyectoController::class, 'show'])->name('proyectos.show');
        Route::post('/{proyecto}/invitar', [InvitationController::class, 'invitar'])->name('proyectos.invitar');
        Route::post('/proyectos/{proyecto}/tareas/{tarea}', [TareaController::class, 'asignar'])->name('tareas.asignar');
        Route::post('/crear', [ProyectoController::class, 'store']);
        Route::get('/editar/{proyecto}', [ProyectoController::class, 'edit'])->name('proyectos.edit');
        Route::put('/editar/{proyecto}', [ProyectoController::class, 'update']);
        Route::delete('/{proyecto}', [ProyectoController::class, 'destroy'])->name('proyectos.destroy');
    });

    //Notificaciones
    Route::get('/notificaciones', [NotificationController::class, 'index'])->name('notificaciones.index');
    Route::post('/notificaciones/{notification}/respond/{action}', [NotificationController::class, 'respond'])->name('proyectos.invitation.respond');

    // Tareas
    Route::group(['prefix' => 'tareas'], function () {
        Route::get('/', [TareaController::class, 'index'])->name('tareas.index');
        Route::get('/crear', [TareaController::class, 'create'])->name('tareas.create');
        Route::post('/crear', [TareaController::class, 'store']);
        Route::get('/editar/{tarea}', [TareaController::class, 'edit'])->name('tareas.update');
        Route::put('/editar/{tarea}', [TareaController::class, 'update']);
        Route::delete('/{tarea}', [TareaController::class, 'destroy'])->name('tareas.destroy');
    });
});
