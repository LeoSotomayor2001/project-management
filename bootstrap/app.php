<?php

use App\Http\Middleware\IsAuth;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'isAuth' => IsAuth::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        if ($exceptions instanceof AuthorizationException) {
            return response()->view('errors.404', [], 404);
        }
    })->create();
