<?php

use App\Http\Middleware\SetLocaleMiddleware;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'setLocale' => SetLocaleMiddleware::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // $exceptions->render(function (NotFoundHttpException $e, Request $request) {
        //     if (request()->is('api/*') && $e->getPrevious() instanceof ModelNotFoundException) {
        //         $model = Str::afterLast($e->getPrevious()->getModel(), '\\');
        //         return response()->json($model . ' not found', 404);
        //     }

        //     return response()->json('Page not found', 404);
        // });
    })->create();
