<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\School;
use App\Models\Attendance;
use App\Models\AttendanceManage;
use App\Models\Staff;
use App\Models\State;

class AttendanceController extends Controller
{
    public function staffGet(Request $request){
        $sid = $request->post('sid');
         $staff = Staff::where('schoolId',$sid)->get();
         //print_r($school);
         $html = '<option selected disabled>Select</option>';
         foreach($staff as $t){
            $html .= '<option value="'.$t->id.'">'.$t->name.'</option>';
         }
         echo $html;
    }
    public function attendanceList(Request $request){
        $state = State::get();
        $fromDate = $request->fromdate;
        $toDate = $request->todate;
        if(Auth('web')->user()->userType == '1'){
        $school = School::where('block',Auth('web')->user()->blockId)->first();
        $data = Attendance::with(['schoolList','headmasterList'])
        ->when($request->filled('schoolId'), function ($query) use ($request) {
            $query->where('schoolId', 'like', '%' . $request->schoolId . '%');
        })
      ->when($fromDate && $toDate, function ($query) use ($fromDate, $toDate) {
            return $query->whereBetween('created_at', [$fromDate, $toDate]);
        }, function ($query) use ($fromDate) {
            return $query->whereDate('created_at', $fromDate);
        })
      ->where('schoolId',$school->id)
      ->orderBy('id','DESC')->get();
      }else{
        $school = School::where('status','1')->get();
        $data = Attendance::with(['schoolList','headmasterList'])
        ->when($request->filled('schoolId'), function ($query) use ($request) {
            $query->where('schoolId', 'like', '%' . $request->schoolId . '%');
        })
      
        ->when($fromDate && $toDate, function ($query) use ($fromDate, $toDate) {
            return $query->whereBetween('created_at', [$fromDate, $toDate]);
        }, function ($query) use ($fromDate) {
            // return $query->whereDate('created_at', $fromDate);
            if ($fromDate !== null) {
            return $query->whereDate('created_at', $fromDate);
    }
        })
      ->orderBy('id','DESC')->get();
      }
        return view('superAdmin.attendance.list',compact('data','school','state'));
    }

    public function attendanceManageList(Request $request,$id){
        $school = School::where('status','1')->get();
        $data = AttendanceManage::with(['schoolList','headmasterList','staffList'])
        ->when($request->filled('schoolId'), function ($query) use ($request) {
            $query->where('schoolId', 'like', '%' .$request->schoolId. '%');
        })
        ->when($request->filled('staffId'), function ($query) use ($request) {
            $query->where('staffId', 'like', '%' .$request->staffId. '%');
        })
      ->when($request->filled('date'), function ($query) use ($request) {
            $query->where('created_at', 'like', '%' .$request->date. '%');
        })
      ->where('attendanceId',$id)->orderBy('id','DESC')->get();

        return view('superAdmin.attendanceManage.list',compact('data','school'));
    }
}
