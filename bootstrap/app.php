<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
   ->withMiddleware(function ($middleware) {

    // // Mendaftarkan alias middleware agar bisa dipakai di route
    $middleware->alias([

    // // Middleware auth → membatasi akses hanya untuk user yang sudah login
        'auth'  => \App\Http\Middleware\AuthMiddleware::class,

    // // Middleware admin → membatasi akses khusus user dengan role admin
        'admin' => \App\Http\Middleware\IsAdmin::class,
    ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
