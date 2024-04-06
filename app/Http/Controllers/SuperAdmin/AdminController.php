<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\State;
use App\Models\District;
use App\Models\Block;

class AdminController extends Controller
{
    public function adminList(Request $request){
        $block = Block::get();
        $data = User::with(['blockList'])
      ->when($request->filled('block'), function ($query) use ($request) {
            $query->where('blockId', 'like', '%' . $request->block . '%');
        })
      ->where('userType','1')->get();

        // $data = User::with(['blockList'])->where('userType','1')->get();
        return view('superAdmin.admin.list',compact('data','block'));
    }
    public function adminCreate(){
        $state = State::get();
        return view('superAdmin.admin.add',compact('state'));
    }
    public function adminSubmit(Request $request){
        $validator = Validator::make($request->all(),[
            'fname' => 'required',
            'lname' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'password' => 'required',
            'stateId' => 'required',
            'districtId' => 'required',
            'blockId' => 'required|unique:users,blockId',
            'perCreate' => 'required',
            'perView' => 'required',
            'perEdit' => 'required',
            'PerDelete' => 'required',
        ]);


        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        //dd($validator);
        $data = new User();
        if($request->photo){
            $ext = $request->photo->getClientOriginalExtension();
            $newFileName =  time().'.'.$ext;
            $request->photo->move(public_path().'/superadmin/admin/',$newFileName); 
            $data->photo = $newFileName;
        }
        $data->fname = $request->fname;
        $data->lname = $request->lname;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->stateId = $request->stateId;
        $data->districtId = $request->districtId;
        $data->blockId = $request->blockId;
        $data->perCreate = $request->perCreate;
        $data->perView = $request->perView;
        $data->perEdit = $request->perEdit;
        $data->PerDelete = $request->PerDelete;
        $data->userType = '1';
        $data->password = Hash::make($request->password);

        $data->save();

        
        return redirect()->back()->with('success','Admin add succesfully');
    }
    public function admindelete($id){
        User::where('id',$id)->delete();
        return redirect()->back();
    }
    public function adminEdit($id){
        $state = State::get();
        $district = District::get();
        $block = Block::get();
        $data = User::where('id',$id)->first();
        return view('superAdmin.admin.edit',compact('data','state','district','block'));
    }
    public function adminUpdate(Request $request,$id){
        $validator = Validator::make($request->all(),[
            'fname' => 'required',
            'lname' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        //dd($validator);
        $data = User::find($id);
       if($request->photo){
            $ext = $request->photo->getClientOriginalExtension();
            $newFileName =  time().'.'.$ext;
            $request->photo->move(public_path().'/superadmin/admin/',$newFileName); 
            $data->photo = $newFileName;
        }
        $data->fname = $request->fname;
        $data->lname = $request->lname;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->perCreate = $request->perCreate;
        $data->perView = $request->perView;
        $data->perEdit = $request->perEdit;
        $data->PerDelete = $request->PerDelete;
        if($request->password){
            $data->password = Hash::make($request->password);
        }
        $data->status = $request->status;
        $data->save();

        
        return redirect()->back()->with('success','Admin Update succesfully');
    }
}
