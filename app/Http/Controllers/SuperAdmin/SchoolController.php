<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\School;
use App\Models\State;
use App\Models\District;
use App\Models\Block;

class SchoolController extends Controller
{
    public function schoolList(Request $request){
        if(Auth('web')->user()->userType == '1'){
            $state = State::get();
            $data = School::
            when($request->filled('state'), function ($query) use ($request) {
            $query->where('state', 'like', '%' . $request->state . '%');
            })
            ->when($request->filled('district'), function ($query) use ($request) {
            $query->where('district', 'like', '%' . $request->district . '%');
            })
            ->when($request->filled('block'), function ($query) use ($request) {
            $query->where('block', 'like', '%' . $request->block . '%');
            })
            ->when($request->filled('schoolId'), function ($query) use ($request) {
            $query->where('id', 'like', '%' . $request->schoolId . '%');
            })
            ->where('block',Auth('web')->user()->blockId)->get();
        }else{
            $state = State::get();
            $data = School::
            when($request->filled('state'), function ($query) use ($request) {
            $query->where('state', 'like', '%' . $request->state . '%');
            })
            ->when($request->filled('district'), function ($query) use ($request) {
            $query->where('district', 'like', '%' . $request->district . '%');
            })
            ->when($request->filled('block'), function ($query) use ($request) {
            $query->where('block', 'like', '%' . $request->block . '%');
            })
            ->when($request->filled('schoolId'), function ($query) use ($request) {
            $query->where('id', 'like', '%' . $request->schoolId . '%');
            })
            ->get();
        }
        
        return view('superAdmin.school.list',compact('data','state'));
    }
    public function schoolCreate(){
        $state = State::get();
        return view('superAdmin.school.create',compact('state'));
    }
    public function schoolSubmit(Request $request){
        $validator = Validator::make($request->all(),[
            'schoolName' => 'required',
            'address' => 'required',
            'state' => 'required',
            'district' => 'required',
            'block' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'radius' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
      
        $data = new School();
        $data->schoolName = $request->schoolName;
        $data->address = $request->address;
        $data->state = $request->state;
        $data->district = $request->district;
        $data->block = $request->block;
        $data->latitude = $request->latitude;
        $data->longitude = $request->longitude;
        $data->radius = $request->radius;
        $data->userId = Auth('web')->user()->id;
        $data->save();

        
        return redirect()->back()->with('success','School add succesfully');
    }
    public function schooldelete($id){
        School::where('id',$id)->delete();
        return redirect()->back();
    }
    public function schoolEdit($id){
        $data = School::where('id',$id)->first();
        $state = State::get();
        $district = District::get();
        $block = Block::get();
        return view('superAdmin.school.edit',compact('state','district','block','data'));
    }
    public function schoolUpdate(Request $request,$id){
        $validator = Validator::make($request->all(),[
            'schoolName' => 'required',
            'address' => 'required',
            'state' => 'required',
            'district' => 'required',
            'block' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'radius' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
      
        $data = School::find($id);
        $data->schoolName = $request->schoolName;
        $data->address = $request->address;
        $data->state = $request->state;
        $data->district = $request->district;
        $data->block = $request->block;
        $data->latitude = $request->latitude;
        $data->longitude = $request->longitude;
        $data->radius = $request->radius;
        $data->userId = Auth('web')->user()->id;
        $data->status = $request->status;
        $data->save();

        
        return redirect()->back()->with('success','School Update succesfully');
    }
}
