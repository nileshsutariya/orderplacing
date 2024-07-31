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
        $items= Item::paginate(1);
        $itemgroup= Item_group::all();
        return view('item.index', compact('items', 'itemgroup'));
    }
    public function store(Request $request)
    {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'price' => 'numeric',
                'qty' => 'numeric',
            ]);
            if ($validator->fails()) {
                $errors = $validator->errors();
                print_r($errors);die;
             }
            print_r($request->all());
            $item= new Item();
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
                return redirect()->route('item.index');
            }
            
    }
    public function delete($id)
    {
        $items= Item::find($id)->delete();
        return redirect()->route('item.index');
    }

    public function edit($id)
    {
        $items= Item::paginate(1);
        $item = Item::find($id);
        $itemgroup= Item_group::all();
        return view("item.index",compact('item', 'items', 'itemgroup'));
    }
    public function update(request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'numeric',
            'qty' => 'numeric',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            print_r($errors);die;
         }  
        $item = Item::find($request->id); 
        print_r($request->all());
        $itemgroup= Item_group::all();
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
            $items= Item::all();
            $itemgroup= Item_group::all();
            return redirect()->route('item.index');
         }
        
        }
    
}
