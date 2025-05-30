<?php

use App\Http\Middleware\CorsMiddleware;
use App\Http\Middleware\DisableCsrf;
use App\Http\Middleware\Authenticate;
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
        // $middleware->append(Authenticate::class);
        $middleware->alias([
            'auth' => Authenticate::class
        ]);

        $middleware->api(
            prepend: [
                \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            ],
            // append: [
            //     Authenticate::class
            // ]
        );

        $middleware->alias([
            'verified' => \App\Http\Middleware\EnsureEmailIsVerified::class,
        ]);

        // $middleware->web([
        //         // DisableCsrf::class, // <-- Ajoute ton middleware ici
        //     CorsMiddleware::class
        // ]);
        $middleware->validateCsrfTokens(except: [
            // '*',
            // 'webhook/endpoint',
            // Ajoutez d'autres routes ici
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
