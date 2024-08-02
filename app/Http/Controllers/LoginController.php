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
     $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if($user=User::where('email',$request->email)){
            $l=User::where('email',$request->email)->first();
            if($l){
                $login=[
                    'email'=>$request['email'],
                    'password'=>$request['password']
                ];
             if ($l){
                 if (Auth::attempt($login)) {
                     return redirect()->route('dashboard.index');
                    }
                 else {
                    Auth::logout();
                }
            }
        }else{
            $l=Admin::where('email',$request->email)->first();
            if($l){
                $login=[
                    'email'=>$request['email'],
                    'password'=>$request['password']
                ];
             if ($l){
                 if (Auth::guard('admin')->attempt($login)) {
                     return redirect()->route('party.index');
                    }
                 else {
                    Auth::logout();
                }
            }
        }
    }}} 
    

    
   
    


    public function logout(Request $request)
    {
        Auth::logout();

        // $request->session()->invalidate();
        // $request->session()->regenerateToken();

        return redirect('/');
    }
       
    }

