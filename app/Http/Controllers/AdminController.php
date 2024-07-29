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
        return view('item');
    }

    public function loginform()
    {
        return view('login');
    }

    public function adminlogin(Request $request) 
    {
        // $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required',
        // ]);
    
        // $credentials = $request->only('email', 'password');
    
        // $admin = DB::table('admin')->where('email', $request->email)->first();

        // if ($admin && Hash::check($request->password, $admin->password)) {
        //     Session::put('admin', $admin);
        //     return redirect('/admin');
        // }

        // return back()->withErrors([
        //     'email' => 'The provided credentials do not match our records.',
        // ]);
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        $credentials = $request->only('email', 'password');
    
        if (Auth::guard('admin')->attempt($credentials)) {
            // $request->session()->regenerate();

            // print_r(Auth::guard('admin'));
            // die();
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
