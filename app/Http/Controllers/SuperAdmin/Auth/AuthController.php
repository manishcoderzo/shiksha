<?php

namespace App\Http\Controllers\SuperAdmin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
    public function Login(){
        return view('authentication.login');
    }
    public function submit(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:6'
        ]);

        $admin = User::where(['email' => $request->email])->first();
      
        // $admin_status = $admincheck->status == '1' ?? '0';
       //dd($admin_status);
        if (isset($admin) == true) {
            $data =  auth('web')->attempt(['email' => $admin->email, 'password' =>  $request->password]);
          // dd($data);
            if($data){
                return redirect()->route('superadmin.dashboard')->with('flash_message','Login successfully!');
            }
            return redirect()->back()->with('flash_message','email or password do not match');
            
        }
        else{
            return back()->with('flash_message','email or password do not match');
        }
        return back()->with('flash_message','email or password do not match');
    }

    public function logout(){
        auth()->guard('web')->logout();
        return redirect()->route('login');
    }

    public function profileEdit(){
        return view('authentication.profileUpdate');
    }
    public function profileUpdate(Request $request){
        $validator = Validator::make($request->all(),[
            'fname' => 'required',
            'lname' => 'required',
            'phone' => 'required',
            'email' => 'required',
           
            // 'image' => 'mimes:jpeg,jpg,png',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $id = $request->id;
        // dd($id);
        $data = User::find($id);
        if($request->photo){
            $ext = $request->photo->getClientOriginalExtension();
            $newFileName =  time().'.'.$ext;
            $request->photo->move(public_path().'/superadmin/profileImage/',$newFileName); 
            $data->photo = $newFileName;
            $data->save();
        }
        
        $data->fname = $request->fname;
        $data->lname = $request->lname;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->save();

        
        return redirect()->back()->with('success','Your Profile Update succesfully');
    }
    public function changePassword(Request $request){
        $validator = Validator::make($request->all(),[
            'password' => 'min:6',
            'con_password' => 'required_with:password|same:password|min:6',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $id = $request->id;
        // dd($id);
        $data = User::find($id);
        
        $data->password = Hash::make($request->password);
        $data->save();

        
        return redirect()->back()->with('success','Your Password Update succesfully');
    }
}
