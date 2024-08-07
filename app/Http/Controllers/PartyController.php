<?php

namespace App\Http\Controllers;

use App\Models\Party;
use Dotenv\Util\Regex;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class PartyController extends Controller
{

    public function orderview()
    {
        return view('orderview');
    }
    
    public function partyindex()
    {
        return view("partydashboard");
    }
    public function index()
    {
        $parties= Party::paginate(3);
        $data = compact("parties");
        return view("party.index")->with($data);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phonenumber' => 'required|numeric',
            'email' => 'required|email',
            'password' => 'required',
            'cpassword' => 'required|same:password',
            // 'gst' => 'required|regex:/^\d{2}[A-Z]{5}\d{4}[A-Z]{1}\d{1}[Z]{1}\d{1}$/',
            // 'pancardno' => 'required|regex:/^[A-Z]{5}[0-9]{4}[A-Z]$/',
        ])->validate();

//         // print_r($request->all());
//         $party = new Party;
//         $party->name = $request['name'];
//         $party->email = $request['email'];
//         $party->password = Hash::make($request['password']);
//         $party->address = $request['address'];
//         $party->phone_number = $request['phonenumber'];
//         $party->gst = $request['gst'];
//         $party->pancard_no = $request['pancardno'];
//         if ($request['status'] == '1') {
//             $status = 1;
//         } else {
//             $status = 0;
//         }
//         $party->status = $status;
//         $party->save();
//         $url=$request->url();
//         if (strpos($url, 'api') == true){
//             return response()->json("register successfully.");
//         } else {
//             return view('login');
//         }
        print_r($request->all());
        $party = new Party;
        $party->name = $request['name'];
        $party->email = $request['email'];
        $party->password = Hash::make($request['password']);
        $party->address = $request['address'];
        $party->phone_number = $request['phonenumber'];
        $party->gst = $request['gst'];
        $party->pancard_no = $request['pancardno'];

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
        } else {
        return redirect()->route("loginform");
        }
    }
    public function delete($id)
    {
        $party = Party::find($id)->delete();
        return redirect()->route('party.index');
    }

    public function edit($id)
    {
        $parties= Party::paginate(3);
        $party = Party::find($id);
        $party= Party::where('id',$id)->first();
        $data = compact("party","parties");
        return view("party.index")->with($data);
    }

    
    public function update(request $request)
    {
        if(isset($request['password']) && $request['password']!=""){
            $request->validate([
                'cpassword' => 'required|same:password'
            ]);
        }
        else { 
            $request->validate([
                'name' => 'required',
                'phonenumber' => 'numeric',
                'email' => 'required|email',
                // 'gst'=>'regex = “^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$”' ,
            ]);
        }
      
        $party = Party::find($request->id);        
        $party->name = $request['name'];
        $party->email = $request['email'];
        $party->gst = $request['gst'];
        $password=$request['password'];
        if(isset($password)){
            $party->password = Hash::make($request['password']);
        }
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
        return redirect()->route('loginform');
    }
}
