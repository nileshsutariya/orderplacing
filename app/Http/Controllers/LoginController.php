<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Party;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        if (Auth::guard('users')->attempt($credentials)) {
            return redirect()->intended(route('dashboard.index')); 
        }
        elseif(Auth::guard('party')->attempt($credentials)) {
            // echo "admin";
            return redirect()->route('partydashboard.index');
        }
    
    }
  
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
       
}

