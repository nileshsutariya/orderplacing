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
        Auth::guard('users')->logout();
        Auth::guard('party')->logout();
        return view('login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'email' => 'required|email',
        ]);
        $credentials = $request->only('email', 'password');
        
        if (Auth::guard('users')->attempt($credentials)) {
            return redirect()->route('dashboard.index'); 
        }
        elseif(Auth::guard('party')->attempt($credentials)) {
            return redirect()->route('partydashboard.index');
        }
        else {
            // return back()->with('fail', 'The password you entered is invalid.');.
            return back()->withInput()->withErrors(['fail' => 'Wrong Password',]); 
        }
    }
    
    
    public function logout(Request $request)
    {
        Auth::guard('users')->logout();
        Auth::guard('party')->logout();
        return redirect('/');
    }
}
