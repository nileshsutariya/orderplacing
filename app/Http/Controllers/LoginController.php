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
            // echo "user";
            return redirect()->intended(route('party.index')); 
        }
        elseif(Auth::guard('admin')->attempt($credentials)) {
            // echo "admin";
            return redirect()->intended(route('item.index'));
            // die();
        }
    
    }
  
    public function logout(Request $request)
    {
        Auth::logout();

        // $request->session()->invalidate();
        // $request->session()->regenerateToken();

        return redirect('/');
    }
       
}

