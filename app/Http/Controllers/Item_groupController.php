<?php

namespace App\Http\Controllers;

use App\Models\Item_group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Item_groupController extends Controller
{
    public function index()
    {
        $itemgroup= Item_group::all();
        $data = compact("itemgroup");
        return view("itemgrouplist")->with($data);
    }
    public function create()
    {
        return view('itemgroup');    
    }
    public function store(Request $request)
    {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
            ]);
            if ($validator->fails()) {
                $errors = $validator->errors();
                print_r($errors);die;
             }
            print_r($request->all());
            $itemgroup= new Item_group();
            $itemgroup->name = $request['name'];
            $itemgroup->description = $request['description'];
            if ($request['status'] == 'on') {
                $status = 1;
            } else {
                $status = 0;
            }
            $itemgroup->status = $status;
            $itemgroup->save();
            $url=$request->url();
            if (strpos($url, 'api') == true){
                 return response()->json("register successfull.");
             }else{
                 return redirect("/itemgroup/list");
             }
            
    }


    public function delete($id)
    {
        $itemgroup = Item_group::find($id);
        $itemgroup = Item_group::find($id)->delete();
        return redirect("/itemgroup/list");
    }

    public function edit($id)
    {
        $itemgroup = Item_group::find($id);
        $itemgroup = Item_group::where('id',$id)->first();
        // print_r($itemgroup); die();
        if (is_null($itemgroup)) {
            return redirect("/itemgroup/list");
        } else {
            $data = compact("itemgroup");
            return view("itemgroup")->with($data);
        }
    }
    public function update(request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            print_r($errors);die;
         }  
        print_r($request->all());
        $itemgroup = Item_group::find($request->id);        
        $itemgroup->name = $request['name'];
        $itemgroup->description = $request['description'];
        if ($request['status'] == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }
        $itemgroup->status = $status;
        $itemgroup->save();
        $url=$request->url();
        if (strpos($url, 'api') == true){
             return response()->json("register successfull.");
         }else{
             return redirect("/itemgroup/list");
         }
        
        }

}
