<?php

namespace App\Http\Controllers;

// use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class AdminController extends Controller
{
    public function adminindex()
    {      
        if (Auth::guard('admin')->check()) {
            return view('dashboard');
        }
        return redirect('/admin/login');
    }

    public function loginform()
    {
        return view('login');
    }

    public function adminlogin(Request $request) 
    {
              
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        $credentials = $request->only('email', 'password');
    
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended(route('index')); 
        }
    
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }

}
