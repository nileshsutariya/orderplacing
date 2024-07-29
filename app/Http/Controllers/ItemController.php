<?php

namespace App\Http\Controllers;
use App\Models\Item;
use App\Models\Item_group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class ItemController extends Controller
{
    public function index()
    {
        $item= Item::all();
        $itemgroup= Item_group::all();
        return view("item.itemlist",compact('item','itemgroup'));
    }
    public function create()
    {
        $itemgroup= Item_group::all();
        // print_r('hguws'); die();
        return view('item.item', compact('itemgroup'));    
    }
    public function store(Request $request)
    {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'price' => 'required|numeric',
                'qty' => 'required|numeric',
            ]);
            if ($validator->fails()) {
                $errors = $validator->errors();
                print_r($errors);die;
             }
            print_r($request->all());
            $item= new Item();
            // Item::create($request->all());
            $item->group_id = $request['group_id'];
            // print_r($item); die();
            $item->name = $request['name'];
            $item->description = $request['description'];
            $item->price = $request['price'];
            $item->qty = $request['qty'];
            if ($request['status'] == 'on') {
                $status = 1;
            } else {
                $status = 0;
            }
            $item->status = $status;
            $item->save();
            $url=$request->url();
            if (strpos($url, 'api') == true){
                 return response()->json("register successfull.");
             }else{
                 return redirect("/item/list");
             }
            
    }
    public function delete($id)
    {
        $item = Item::find($id);
        $item= Item::find($id)->delete();
        return redirect("/item/list");
    }

    public function edit($id)
    {
        $itemgroup= Item_group::all();
        $item = Item::find($id);
        $item= Item::where('id',$id)->first();
        return view("item.item",compact('item','itemgroup'));
    }
    public function update(request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required|numeric',
            'qty' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            print_r($errors);die;
         }  
         
        print_r($request->all());
        $itemgroup= Item_group::all();
        $item = Item::find($request->id); 
        $item->group_id = $request['group_id'];       
        $item->name = $request['name'];
        $item->description = $request['description'];
        $item->price = $request['price'];
        $item->qty = $request['qty'];
        if ($request['status'] == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }
        $item->status = $status;
        $item->save();
        $url=$request->url();
        if (strpos($url, 'api') == true){
             return response()->json("register successfull.");
         }else{
             return redirect("/item/list");
         }
        
        }
    
}
