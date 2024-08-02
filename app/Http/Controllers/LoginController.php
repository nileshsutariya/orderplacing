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
        $email=User::where('email',$request->email)->first();
        $email=Party::where('email',$request->email)->first();
        if($email){
            $login=[
                'email'=>$request['email'],
                'password'=>$request['password']
            ];
        
        
         // $request->session()->regenerate();
         
         if ($email) {
             if (Auth::attempt($login)) {
                 print_r("hdgwqy");die;
                 return redirect()->route('party.index');
                }
             else {
                print_r("dfghjky");die;
                // return redirect()->route('party.index');
            }
        }
        else{
            print_r("wertyui");die;
            return redirect()->route('user.index');
        }
    
    }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }


    public function logout(Request $request)
    {
        Auth::logout();

        // $request->session()->invalidate();
        // $request->session()->regenerateToken();

        return redirect('/');
    }
       
    }

