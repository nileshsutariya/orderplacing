<?php

namespace App\Http\Controllers;

use App\Models\Party;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class PartyController extends Controller
{
    public function index()
    {
        $party= Party::all();
        $data = compact("party");
        return view("partylist")->with($data);
    }
    public function store(Request $request)
    {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'address' => 'required',
                'phonenumber' => 'required|numeric',
                'email' => 'required|email',
            ]);
            if ($validator->fails()) {
                $errors = $validator->errors();
                print_r($errors);die;
             }
            print_r($request->all());
            $party = new Party;
            $party->name = $request['name'];
            $party->email = $request['email'];
            $party->gst = $request['gst'];
            $party->Pancard_no = $request['pancardno'];
            $party->address = $request['address'];
            $party->phone_number = $request['phonenumber'];
            if ($request['status'] == 'on') {
                $status = 1;
            } else {
                $status = 0;
            }
            $party->status = $status;
            $party->save();
            $url=$request->url();
            if (strpos($url, 'api') == true){
                 return response()->json("register successfully.");
             }else{
                 return redirect("/party/list");
             }
    }
    public function delete($id)
    {
        $party = Party::find($id)->delete();
        return redirect("/party/list");
    }

    public function edit($id)
    {
        $party = Party::find($id);
        $party= Party::where('id',$id)->first();
        if (is_null($party)) {
            return redirect("/party/list");
        } else { 
            $data = compact("party");
            return view("party")->with($data);
        }
    }
    public function create()
    {
        return view('party');    
    }
    public function update(request $request)
    {
         if($request['password'] !=null){
            $request->validate([
                'cpassword' => 'required|same:password'
            ]);
         }
         else{
            $request->validate([
                'name' => 'required',
                'address' => 'required',
                'phonenumber' => 'required|numeric',
                'email' => 'required|email'
            ]);
         }
        $party = Party::find($request->id);        
        $party->name = $request['name'];
        $party->email = $request['email'];
        $party->gst = $request['gst'];
        $party->Pancard_no = $request['pancardno'];
        $party->address = $request['address'];
        $party->phone_number = $request['phonenumber'];
        if ($request['status'] == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }
        $party->status = $status;
        $party->save();
        return redirect('/party/list');
    }
}
