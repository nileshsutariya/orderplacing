<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    public function orderview()
    {
        $partyOrders = Order::leftJoin('party_master', 'party_master.id', '=', 'order.party_id')
                            ->select('party_master.*', 'order.*')
                            ->get(); 
                            
        // $partyOrders = DB::table('order')
        //                     ->leftjoin('party_master', 'party_master.id', '=', 'order.party_id')
        //                     ->leftjoin('order_details', 'party_master.id', '=', 'order_details.id')
        //                     ->select('party_master.*', 'order.*', 'order_details.*')
        //                     ->get();   
        // print_r($partyOrders); die;
        
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
            $order->save();

            $order_id=$order->id;

            $cart=Cart::where('party_id', $partyid)->get();

            foreach($cart as $value){
                $order_details= new OrderDetails();
                $order_details->order_id=$order_id;
                $order_details->item_id=$value->item_id;   
                $order_details->qty=$value->qty;
                // print_r($order_details);die;
                $order_details->save();

                $cartdelete=Cart::where('party_id', $partyid)->where('item_id',$value->item_id)->delete();
            }
        
            $url=$request->url();
            if (strpos($url, 'api') == true){
                 return response()->json("register successfully.");
             }else{
                return redirect()->route("partydashboard.index");
             }
    }
}
