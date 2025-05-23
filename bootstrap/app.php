<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\MedewerkerMiddleware;
use App\Http\Middleware\ManagerMiddleware;
use App\Http\Middleware\RedirectManager;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias(['medewerker' => MedewerkerMiddleware::class]);
    })
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias(['manager' => ManagerMiddleware::class]);
    })
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias(['RedirectManager' => RedirectManager::class]);
    })


    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
