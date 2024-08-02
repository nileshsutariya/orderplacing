<?php

namespace App\Http\Controllers;
use App\Models\Item;
use Illuminate\Http\Request;

class dashboard extends Controller
{
    public function index()
    {   
        return view('dashboard');
        // $items = Item::all();
        //  return view('dashboard', compact('items'));
    }
}
