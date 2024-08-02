<?php

namespace App\Http\Controllers;
use App\Models\Item;
use App\Models\Partyorder;   
use App\Models\Party; 
use Illuminate\Http\Request;
use Auth;

class partydashboard extends Controller
{
    public function index()
    {   
        $items = Item::all();
         return view('partydashboard', compact('items'));
    }
    
    public function ordernow($pid)
    {
        $partyid=Auth::guard('party')->id;
       print_r($partyid);die;
        $party=Party::where('id',$partyid)->first();
        $items= Item::paginate(2);
        $item = Item::find($id);
        return view("party.partyorder",compact('item', 'items', 'party'));
    }
    public function orderconfirm(request $request)
    {   
        $partyorder = new Partyorder;
        $partyorder->party_id=$request['id'];
        $partyorder->buyer_name = $request['buyer'];
        $partyorder->phone_number = $request['phone_number'];
        $partyorder->address = $request['address'];
        $partyorder->item_name = $request['item'];
        $partyorder->price = $request['price'];
        $partyorder->qty = $request['qty'];
        $partyorder->total = $request['total1'];
        $partyorder->save();
        return redirect()->route('dashboard.index');
    }
}
