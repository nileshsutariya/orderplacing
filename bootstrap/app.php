<?php

// use App\Http\Middleware\Admin;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
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
            'users' => \App\Http\Middleware\users::class,
        ]);
       
    })
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'party' => \App\Http\Middleware\party::class,
        ]);
    })
    // ->withMiddleware(function (Middleware $middleware) {
    //     $middleware->append(Admin::class);
    // })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
