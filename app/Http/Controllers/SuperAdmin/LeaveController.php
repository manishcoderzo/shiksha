<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Leave;
use App\Models\School;

class LeaveController extends Controller
{
    public function leaveList(Request $request){
        if(Auth('web')->user()->userType == '1'){
       $school = School::where('block',Auth('web')->user()->blockId)->get();
       $schools = School::where('block',Auth('web')->user()->blockId)->first();
        $data = Leave::with(['schoolList','headmasterList'])
        ->when($request->filled('schoolId'), function ($query) use ($request) {
            $query->where('schoolId', 'like', '%' . $request->schoolId . '%');
        })
      ->when($request->filled('date'), function ($query) use ($request) {
            $query->where('date', 'like', '%' . $request->date . '%');
        })
      ->where([['status','1'],['schoolId',$schools->id]])->orderBy('id','DESC')->get();
      }else{
        $school = School::where('status','1')->get();
        $data = Leave::with(['schoolList','headmasterList'])
        ->when($request->filled('schoolId'), function ($query) use ($request) {
            $query->where('schoolId', 'like', '%' . $request->schoolId . '%');
        })
      ->when($request->filled('date'), function ($query) use ($request) {
            $query->where('date', 'like', '%' . $request->date . '%');
        })
      ->where('status','1')->orderBy('id','DESC')->get();
      }
        return view('superAdmin.leave.list',compact('data','school'));
    }
    public function leaveStatusSubmit(Request $request){
        $id = $request->id;
        $data =  Leave::find($id);
        $data->leaveStatus = $request->leaveStatus;
        $data->save();

        return redirect()->back()->with('success','Leave Status Update succesfully');
    }
}
