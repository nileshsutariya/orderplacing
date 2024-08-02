<?php

namespace App\Http\Controllers;
use App\Models\Item;
use App\Models\Partyorder;   
use App\Models\Party;   
use Illuminate\Http\Request;

class dashboard extends Controller
{
    public function index()
    {   
        return view('dashboard');
        // $items = Item::all();
        //  return view('dashboard', compact('items'));
    }
    
    public function ordernow($id)
    {
        $party=Party::where('id',6)->first();
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
