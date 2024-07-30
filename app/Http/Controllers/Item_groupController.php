<?php

namespace App\Http\Controllers;

use App\Models\Item_group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Item_groupController extends Controller
{

    public function index()
    {
        $itemgroups= Item_group::all();
        $data = compact("itemgroups");
        return view('itemgroup.index', compact('itemgroups'));
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
                return redirect()->route('itemgroup.index');
             }
            // Item_group::create($request->all());
            // return route("itemgroup.index");
    }


    public function delete($id)
    {
        $itemgroup = Item_group::find($id)->delete();
        return redirect()->route('itemgroup.index');
    }

    public function edit($id)
    {
        $itemgroups = Item_group::all();
        $itemgroup = Item_group::find($id);
        $itemgroup = Item_group::where('id',$id)->first();
        if (is_null($itemgroup)) {
            return redirect()->route('itemgroup.index');
        } else {
            $data = compact("itemgroup","itemgroups");
            return view("itemgroup.index")->with($data);
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

        $itemgroup->name = $request->name;
        $itemgroup->description = $request->description;
        if ($request['status'] == '1') {
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
            return redirect()->route('itemgroup.index');
         }
        
    }

}
