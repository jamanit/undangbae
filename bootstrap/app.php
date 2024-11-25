<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'isOwner' => \App\Http\Middleware\IsOwner::class,
            'isAdmin' => \App\Http\Middleware\IsAdmin::class,
            'isUser' => \App\Http\Middleware\IsUser::class,
            'notUser' => \App\Http\Middleware\NotUser::class,
            'notAffiliate' => \App\Http\Middleware\NotAffiliate::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
