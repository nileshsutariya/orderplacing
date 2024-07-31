<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users= User::paginate(1);
        $data = compact("users");
        return view("users.index", compact("users"));
    }
    public function store(Request $request)
    {
            $validator = Validator::make($request->all(), [
                'first_name' => 'required',
                'last_name' => 'required',
                'phone_number' => 'numeric',
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
            $user->first_name = $request['first_name'];
            $user->last_name = $request['last_name'];
            $user->email = $request['email'];
            $user->password = Hash::make($request['password']);
            $user->address = $request['address'];
            $user->phone_number = $request['phone_number'];
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
                return redirect()->route('user.index');
             }
    }
    public function delete($id)
    {
        $user = User::find($id)->delete();
        return redirect()->route('user.index');
    }
    public function edit($id)
    {
        $users = User::all();
        $user = User::find($id);
        $user= User::where('id',$id)->first();
        if (is_null($user)) {
            return redirect("/user");
        } else {
            $data = compact("user", "users");
            return view("users.index")->with($data);
        }
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
                'first_name' => 'required',
                'last_name' => 'required',
                'phone_number' => 'required|numeric',
                'email' => 'required|email'
            ]);
         }
        $user = User::find($request->id);        
        $user->first_name = $request['first_name'];
        $user->last_name = $request['last_name'];       
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->address = $request['address'];
        $user->phone_number = $request['phone_number'];
        if ($request['status'] == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }
        $user->status = $status;
        $user->save();
        return redirect()->route('user.index');
    }
}
