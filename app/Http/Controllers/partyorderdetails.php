<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Party;
use App\Models\Tax;

use Auth;
use Illuminate\Http\Request;

class partyorderdetails extends Controller
{
    public function draft(){
        // $partyid = Auth::guard('party')->id();
        // $party=Party::where('id',$partyid)->first();
        // $item = Cart::leftjoin('item','cart.item_id','=','item.id')->select('item.*','cart.*')->where('party_id',$partyid)->get();
     
        // return view('party.draft', compact('party','item'));

            $partyid = Auth::guard('party')->id();
            $party=Party::where('id',$partyid)->first();
            $item = Cart::leftjoin('item','cart.item_id','=','item.id')->select('item.*','cart.*')->where('party_id',$partyid)->get();
            $taxpercentage=Tax::where('id',1)->first();
            $total=0;  $totalqty=0; $tax=0;
            foreach($item as $value){
                $total+=$value->price*$value->qty;
                $totalqty+=$value->qty;
            }
            $tax=$total*($taxpercentage->tax/100);
            return view('party.draft', compact('party','item','total','totalqty','tax','taxpercentage'));
        
    }
}
