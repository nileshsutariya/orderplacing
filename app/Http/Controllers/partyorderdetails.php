<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Party;
use App\Models\Tax;

use Auth;
use Illuminate\Http\Request;

class partyorderdetails extends Controller
{
    public function draft(){
            $party=Party::where('id',Auth::guard('party')->id())->first();
            $item = Cart::leftjoin('item','cart.item_id','=','item.id')->select('item.*','cart.*')->where('party_id',Auth::guard('party')->id())->get();
            $taxpercentage=Tax::where('id',1)->first();
            $total=0;  $totalqty=0; $tax=0;
            foreach($item as $value){
                $total+=$value->price*$value->qty;
                $totalqty+=$value->qty;
            }
            $tax=$total*($taxpercentage->tax/100);
            return view('party.draft', compact('party','item','total','totalqty','tax','taxpercentage'));
        
    }
    public function pendingorder(){
        $party=Party::where('id',Auth::guard('party')->id())->first();
        $orders = Order::where('party_id', Auth::guard('party')->id())->where('status',0)->orwhere('party_id', Auth::guard('party')->id())->where('status',1)->get();
        if(sizeof($orders)!=0){
        $partyorders = Order::where('party_id', Auth::guard('party')->id())->where('status',0)->orwhere('party_id', Auth::guard('party')->id())->where('status',1)->get();
            foreach($partyorders as $key => $details){
                $createDate = new \DateTime($details->created_at);
                $date[$key]= $createDate->format('d-m-Y');
                $orderitem[$key]=OrderDetails::leftJoin('item','item.id','=','order_details.item_id')->where('order_id',$details->id)->select('order_details.*','item.name as item_name','item.price')->get();
            }
        return view('party.pendingorder', compact('partyorders','orderitem','party','date'));
         }else{
            return view('party.pendingorder',compact('party'));
         }
    }
    public function completeorder(){
        $party=Party::where('id',Auth::guard('party')->id())->first();
        $orders=Order::where('party_id', Auth::guard('party')->id())->where('status',2)->get();
        if(sizeof($orders)!=0){
            $partyorders= Order::where('party_id', Auth::guard('party')->id())->where('status',2)->get();
            foreach($partyorders as $key => $details){
                $createDate = new \DateTime($details->created_at);
                $date[$key]= $createDate->format('d-m-Y');
                $orderitem[$key]=OrderDetails::leftJoin('item','item.id','=','order_details.item_id')->where('order_id',$details->id)->select('order_details.*','item.name as item_name','item.price')->get();
            }
                return view('party.completeorder', compact('partyorders','orderitem','party','date'));
        }else{
            return view('party.completeorder',compact('party'));

        }
    }
}
