<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Cart;

use Illuminate\Http\Request;
use Auth;

class OrderController extends Controller
{
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
