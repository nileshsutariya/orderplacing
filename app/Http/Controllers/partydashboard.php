<?php

namespace App\Http\Controllers;
use App\Models\Item;
use App\Models\Partyorder;   
use App\Models\Party; 
use App\Models\Cart; 
use App\Models\Tax; 

use Illuminate\Http\Request;
use Auth;

class partydashboard extends Controller
{
    public function index()
    {   
        // print_r(Auth::user());die();
        $partyid = Auth::guard('party')->id();
        $party=Party::where('id',$partyid)->first();
        $cart = Item::all();
         return view('partydashboard', compact('cart','party'));
    }
    public function delete($id){
        $cart= Cart::find($id)->delete();
        return redirect()->back();
    }

    public function cartview(){
        $partyid = Auth::guard('party')->id();
        $party=Party::where('id',$partyid)->first();
        $item = Cart::join('item','cart.item_id','=','item.id')->select('item.*','cart.*')->where('party_id',$partyid)->get();
        $taxpercentage=Tax::where('id',1)->first();
        $total=0;        $totalqty=0; $tax=0;
        foreach($item as $value){
            $total+=$value->price*$value->qty;
            $totalqty+=$value->qty;
        }
        $tax=$total*($taxpercentage->tax/100);
        return view('party.partycart', compact('party','item','total','totalqty','tax','taxpercentage'));
    }
    public function cart($id)
    {   
        $partyid = Auth::guard('party')->id();
        $item=Item::where('id',$id)->first();
        $cart=Cart::where('item_id',$id)->where('party_id',$partyid)->first();
        if(isset($cart)){
            $qty=$cart->qty +1;
            $cart->qty = $qty;
            $cart->save();
        }else{
            $cart = new Cart;
            $cart->party_id=$partyid;
            $cart->item_id=$item->id;
            $cart->qty =1;
            $cart->save();
        }
        return redirect()->route('cartview');
    }
}
