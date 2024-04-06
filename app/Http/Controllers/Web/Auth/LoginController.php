<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Headmaster;
class LoginController extends Controller
{
    public function userLogin(){
        return view('user.auth.login');
    }
    public function usersubmit(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:6'
        ]);
        //dd($request);
        $headmaster = Headmaster::where(['email' => $request->email])->first();
      
        if (isset($headmaster) == true) {
            $data =  auth('headmasters')->attempt(['email' => $headmaster->email, 'password' =>  $request->password]);
          // dd($data);
            if($data){
                return redirect()->route('user.dashboard')->with('flash_message','Login successfully!');
            }
            return redirect()->back()->with('flash_message','email or password do not match');
            
        }
        else{
            return back()->with('flash_message','email or password do not match');
        }
        return back()->with('flash_message','email or password do not match');
    }

    public function headmasterlogout(){
        auth()->guard('headmasters')->logout();
        return redirect()->route('user.userLogin');
    }
}
