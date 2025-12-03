<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

// Import Sanctum
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;
use Laravel\Sanctum\Http\Middleware\EnsureAuthenticated;

return Application::configure(basePath: dirname(__DIR__))

    ->withMiddleware(function (Middleware $middleware) {

        // Sanctum: Stateful API
        $middleware->statefulApi([
            EnsureFrontendRequestsAreStateful::class,
        ]);

        // Sanctum: API middleware prepend
        $middleware->api(prepend: [
            EnsureFrontendRequestsAreStateful::class,
        ]);

        // Route Middleware (Laravel 12)
        $middleware->alias([
            'auth' => \App\Http\Middleware\Authenticate::class,
            'auth:sanctum' => EnsureAuthenticated::class,
        ]);
    })

    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )

    ->withExceptions(function (Exceptions $exceptions) {
        //
    })

    ->create();
