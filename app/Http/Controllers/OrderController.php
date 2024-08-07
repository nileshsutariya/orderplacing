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
    public function store(Request $request)
    {
        $partyid = Auth::guard('party')->id();

            print_r($request->all());
            $order = new Order();
            $order->party_id = $partyid;
            $order->total_products = $request['subqty'];
            $order->subtotal = $request['subtotal'];
            $order->tax_percentage = $request['tax'];
            $order->tax_amount = $request['taxamount'];
            $order->final_total = $request['finaltotal'];
            $order->status = 0;
            // $order->save()
            $cart=Cart::where('party_id', $partyid)->get();
            print_r($cart->toArray()); die();

            
            $url=$request->url();
            if (strpos($url, 'api') == true){
                 return response()->json("register successfully.");
             }else{
                return redirect()->route("partydashboard.index");
             }
    }
}
