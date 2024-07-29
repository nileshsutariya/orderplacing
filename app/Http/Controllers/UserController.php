<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $user= User::all();
        $data = compact("user");
        return view("userlist")->with($data);
    }
    public function store(Request $request)
    {
            $validator = Validator::make($request->all(), [
                'firstname' => 'required',
                'lastname' => 'required',
                'address' => 'required',
                'phonenumber' => 'required|numeric',
                'email' => 'required|email',
                'password' => 'required',
                'cpassword' => 'required|same:password',
            ]);
            if ($validator->fails()) {
                $errors = $validator->errors();
                print_r($errors);die;
             }
            print_r($request->all());
            $user = new User;
            $user->first_name = $request['firstname'];
            $user->last_name = $request['lastname'];
            $user->email = $request['email'];
            $user->password = Hash::make($request['password']);
            $user->address = $request['address'];
            $user->phone_number = $request['phonenumber'];
            if ($request['status'] == 'on') {
                $status = 1;
            } else {
                $status = 0;
            }
            $user->status = $status;
            $user->save();
            $url=$request->url();
            if (strpos($url, 'api') == true){
                 return response()->json("register successfully.");
             }else{
                 return redirect("/user/list");
             }
    }
    public function delete($id)
    {
        $user = User::find($id)->delete();
        return redirect("/view");
    }

    public function edit($id)
    {
        $user = User::find($id);
        $user= User::where('id',$id)->first();
        if (is_null($user)) {
            return redirect("/user/list");
        } else {
            $data = compact("user");
            return view("user")->with($data);
        }
    }
    public function create()
    {
        return view('user');    
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
                'firstname' => 'required',
                'lastname' => 'required',
                'address' => 'required',
                'phonenumber' => 'required|numeric',
                'email' => 'required|email'
            ]);
         }
        $user = User::find($request->id);        
        $user->first_name = $request['firstname'];
        $user->last_name = $request['lastname'];       
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->address = $request['address'];
        $user->phone_number = $request['phonenumber'];
        if ($request['status'] == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }
        $user->status = $status;
        $user->save();
        return redirect('/user/list');
    }
}
