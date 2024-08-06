<?php

namespace App\Http\Controllers;

use App\Models\Tax;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class taxController extends Controller
{
    public function index(){

       $tax= Tax::first();
        return view('tax', compact('tax'));
    }
    public function update(Request $request)
    {
            $validator = Validator::make($request->all(), [
                'tax' => 'required|numeric',
            ])->validate();
  
            $tax=Tax::find($request->id);   ;
            $tax->tax = $request['tax'];
    ;
            $tax->save();
            $url=$request->url();
            if (strpos($url, 'api') == true){
                 return response()->json("register successfull.");
             }else{
                return redirect()->route('tax.index');
             }
    }
}
