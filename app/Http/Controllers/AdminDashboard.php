<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\Party;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminDashboard extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }
    public function ordernow(Request $request, $id){
        $id = Auth::check() ? Auth::id() : true;
        $party = Party::where('id',$id)->first();
        Auth::user()->id;
        return view("order",compact('item', 'items', 'party'));
    }

    public function orderview()
    {
        return view('orderview');
    }
}
