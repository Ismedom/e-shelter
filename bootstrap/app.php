<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: [__DIR__ . '/../routes/web.php', __DIR__ . '/../routes/dev/.dev.php'],
        api: [__DIR__ . '/../routes/api.php', __DIR__ . '/../routes/api/v1/api.php'],
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            // 'web.auth' => \App\Http\Middleware\AuthMiddleware::class,
            'verified.email' => \App\Http\Middleware\UserVerifyMiddleware::class,
            'redirectIfAuthenticated' => \App\Http\Middleware\AuthenticatedMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
