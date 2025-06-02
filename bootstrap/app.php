<?php

use App\Http\Middleware\CorsMiddleware;
use App\Http\Middleware\DisableCsrf;
use App\Http\Middleware\Authenticate;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Request;
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
        // attantion ici:
        // pour Request on utilise la lib: use Symfony\Component\HttpFoundation\Request;
        $exceptions->render(function (ModelNotFoundException $e, Request $request) {
            if ($request->is('api/*')) {
                return response()->json(['error' => 'Resource not found'], 404);
            }
        });

        $exceptions->render(function (NotFoundHttpException $e, Request $request) {
            if ($request->is('api/*')) {
                return response()->json(['error' => 'API endpoint not found'], 404);
            }
        });
    })->create();
