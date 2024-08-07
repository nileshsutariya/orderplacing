<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Party;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index() {
        return view('login');
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        if (Auth::guard('users')->attempt($credentials)) {
            // print_r('jhch'); die();
            return redirect()->route('dashboard.index'); 
        }
        elseif(Auth::guard('party')->attempt($credentials)) {
            // echo "admin";
            return redirect()->route('partydashboard.index');
        }
        else {
            return redirect()->back();
        }
    
    }
  
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
