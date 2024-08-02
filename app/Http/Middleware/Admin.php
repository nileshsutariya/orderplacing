<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role_as): Response
    {
        if(auth()->user()->type == $role_as){
            return $next($request);
        }

        // auth()->user()->role
        // if('admin' == $role){
        //     return $next($request);
        // }
        
        // print_r(Auth::user());die;
        // if (!Auth::guard('admin')->check()) {
        //     return redirect('/admin/login');
        // }


        // if (!Auth::guard('users')->check()) {
        //     return redirect('/admin/login');
        // }

        // if ($guard == "admin" && Auth::guard($guard)->check()) {
        //     return redirect('/admin/dashboard');
        // }
        // if ($guard == "users" && Auth::guard($guard)->check()) {
        //     return redirect('/admin/party/dashboard');
        // }
    }
}
