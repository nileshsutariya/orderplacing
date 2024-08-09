<?php

namespace App\Http\Controllers;

use Auth;
use Session;
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
        Auth::logout();
        $credentials = $request->only('email', 'password');
        
        if (Auth::guard('users')->attempt($credentials)) {
            // print_r("hgedgh"); die;
            return redirect("/Admin/dashboard"); 
        }
        elseif(Auth::guard('party')->attempt($credentials)) {
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
