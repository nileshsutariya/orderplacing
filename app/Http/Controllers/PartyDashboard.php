<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PartyDashboard extends Controller
{
    public function index(){
        return view('partydashboard');
    }
}
