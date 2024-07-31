<?php

namespace App\Http\Controllers;

use App\Models\Party;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class PartyController extends Controller
{
    public function index()
    {
        $parties= Party::paginate(1);
        $data = compact("parties");
        return view("party.index")->with($data);
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
            if ($request['status'] == '1') {
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
                return redirect()->route('party.index');
             }
    }
    public function delete($id)
    {
        $party = Party::find($id)->delete();
        return redirect()->route('party.index');
    }

    public function edit($id)
    {
        $parties= Party::all();

        $party = Party::find($id);
        $party= Party::where('id',$id)->first();
        $data = compact("party","parties");
        return view("party.index")->with($data);
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
        if ($request['status'] == '1') {
            $status = 1;
        } else {
            $status = 0;
        }
        $party->status = $status;
        $party->save();
        return redirect()->route('party.index');
    }
}
