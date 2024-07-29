<?php

namespace App\Http\Controllers;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ItemController extends Controller
{
    public function index()
    {
        $item= Item::all();
        $data = compact("item");
        return view("itemlist")->with($data);
    }
    public function create()
    {
        return view('item');    
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
            $item= new item;
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
        $item = Item::find($id);
        $item= Item::where('id',$id)->first();
        if (is_null($item)) {
            return redirect("/item/list");
        } else {
            $data = compact("item");
            return view("item")->with($data);
        }
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
        $item = Item::find($request->id);        
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
