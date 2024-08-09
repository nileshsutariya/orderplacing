<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin 
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
    //  */
    // public function handle(Request $request, Closure $next, $role_as): Response
    // {
        //   if (!Auth::guard('users')->check()) {
            //             return redirect()->route('login');
            //         }else{
                
                //             return $next($request);
                //         }
                //     }
                // // protected function redirectTo(Request $request): ?string
                // if(auth()->user()->type == $role_as){
                //     return $next($request);
                // }
    // // {
    // //     print_r($request->all());die();
    // //     return $request->expectsJson() ? null : route('loginform');
    // // }
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        return $response->header('Access-Control-Allow-Origin', '*');

    }
}
