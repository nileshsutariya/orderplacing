<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function orderview()
    {
        $partyOrders = Order::all();
        return view('orderview', compact('partyOrders'));
    }
    public function orderstatus() 
    {
        $partyOrders = Order::all();
        return view('orderstatus', compact('partyOrders'));
    }
    public function statusupdate(Request $request, $id) {
        $order = Order::find($id);
        if ($order) {
            if ($order->status == "0") {
                $order->status = "1";
            } else {
                $order->status = "2";
            } 
            $order->save();
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
}
