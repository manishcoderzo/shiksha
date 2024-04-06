<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Staff;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Headmaster;
use App\Models\Attendance;
use App\Models\AttendanceManage;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class WebController extends Controller
{
    
    public function otpVarification(){
        return view('user.auth.opt-varification');
    }
    public function home(){
        $data = Staff::where('schoolId',Auth('headmasters')->user()->schoolId)->get();
        //dd(Auth('headmasters')->user()->schoolId);
        return view('user.home',compact('data'));
    }
    public function dashboard(){
        $data = Staff::where('schoolId',Auth('headmasters')->user()->schoolId)->get();
        //dd(Auth('headmasters')->user()->schoolId);
        $school = Headmaster::with(['schoolList'])->where('id',Auth('headmasters')->user()->id)->first();
        return view('user.dashboard',compact('data','school'));
    }
    public function account(){
        //dd(Auth('headmasters')->user()->schoolId);
        return view('user.account');
    }
    public function attendance(){
        $head = Headmaster::where('schoolId',Auth('headmasters')->user()->schoolId)->first();
        //dd($head);
        $data = Staff::where('schoolId',Auth('headmasters')->user()->schoolId)->get();
        $today = Carbon::now()->toDateString();
        $todayCheckout = Attendance::
            whereDate('created_at', $today)
            ->where([['headmasterId',Auth('headmasters')->user()->id],['status','1']])
            ->first();
        $todayCheckin = Attendance::
        whereDate('created_at', $today)
        ->where([['headmasterId',Auth('headmasters')->user()->id],['status','0']])
        ->first();
        return view('user.attendance',compact('data','head','todayCheckout','todayCheckin'));
    }

    public function attendanceSubmit(Request $request){
        // dd($request->all());
        $validator = Validator::make($request->all(),[
            'status' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $today = Carbon::now()->toDateString();

        $existingAttendance = Attendance::
            whereDate('created_at', $today)
            ->where('headmasterId',Auth('headmasters')->user()->id)->where('status', $request->status)
            ->first();
      
        if (!$existingAttendance) {

            $head = new Attendance();
            
            $head->schoolId = $request->schoolId;
            $head->status = $request->status;
            $head->headmasterId = Auth('headmasters')->user()->id;
            $head->save();

            // $statusData = [
            //     $request->staffId => $request->todayStaffStatus,
            // ];
            //$staff = $request->staffId;
             $staffGet = Auth('headmasters')->user()->Staff;
             // dd($staffGet,);
            foreach($staffGet as $s){
                $staffIdKey = "staffId_" . $s->id;
                $pKey = "p_" . $s->id;
                $aKey = "a_" . $s->id;
                $slKey = "sl_" . $s->id;
                $clKey = "cl_" . $s->id;
                $elKey = "el_" . $s->id;
                // dd($request->staffId_.$s->id);
                $manage = new AttendanceManage();
                
               
                $manage->staffId = $s->id;
                $manage->schoolId = $request->schoolId;
                $manage->status  = $head->status;
                $manage->attendanceId  = $head->id;
                // $manage->atten  = $request->atten;
                if(isset($request->$pKey)){
                    $manage->p  = $request->$pKey;
                }
                if(isset($request->$aKey)){
                    $manage->a  = $request->$aKey;
                }
                if(isset($request->$clKey)){
                    $manage->cl  = $request->$clKey;
                }
                if(isset($request->$slKey)){
                    $manage->sl  = $request->$slKey;
                }
                if(isset($request->$elKey)){
                    $manage->el  = $request->$elKey;
                }
                $manage->headmasterId = Auth('headmasters')->user()->id;
                $manage->save();
            }
            return redirect()->route('user.attendanceImage',$head->id)->with('success','succesfully for next step');
        }else{
            return redirect()->back()->with('failed','Attendance already marked for today');
        }
        
    }
    public function attendanceImage($id){
        return view('user.attendanceImage',compact('id'));
    }
    public function attendanceImageSubmit(Request $request){
        $validator = Validator::make($request->all(),[
            'selfie' => 'required',
            'attendanceImage' => 'required',
        ]);


        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // $todayImageCheck = Attendance::
        // whereDate('created_at', $today)
        // ->where([['headmasterId',Auth('headmasters')->user()->id],['status','0']])
        // ->first();
        $attendanceId = $request->attendanceId;
        $head = Attendance::find($attendanceId);
        if($request->selfie){
            $photoData  =$request->selfie;
             $photoData = substr($photoData, strpos($photoData, ',') + 1);
             $filename = 'captured_photo_' . time() . '.jpg'; // Generate a unique filename
            $filePath = public_path('superadmin/selfie/' . $filename); // Path to save the photo in the public folder

            // Save the image file
            file_put_contents($filePath, base64_decode($photoData));
             $head->selfie = $filename;
        }
        if($request->attendanceImage){
            $photoDatas  =$request->attendanceImage;
             $photoDatas = substr($photoDatas, strpos($photoDatas, ',') + 1);
             $filename = 'captured_photo_' . time() . '.jpg'; // Generate a unique filename
            $filePath = public_path('superadmin/attendanceImage/' . $filename); // Path to save the photo in the public folder

            // Save the image file
            file_put_contents($filePath, base64_decode($photoDatas));
             $head->registerImage = $filename;
        }
        $head->save();
        return redirect()->route('user.dashboard')->with('success','Attendance marked succesfully');
    }

    public function headmasterProfile(){
        return view('user.auth.headmasterProfile');
    }
    public function headmasterProfileSubmit(Request $request){
        $validator = Validator::make($request->all(),[
            'photo' => 'required|mimes:jpeg,jpg,png',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $id = $request->id;
        // dd($id);
        $data = Headmaster::find($id);
        if($request->photo){
            $ext = $request->photo->getClientOriginalExtension();
            $newFileName =  time().'.'.$ext;
            $request->photo->move(public_path().'/superadmin/headmaster/',$newFileName); 
            $data->photo = $newFileName;
            $data->save();
        }        
        return redirect()->back()->with('success','Your Profile Update succesfully');
    }
    public function teacherDetails($id){
        $data = Staff::with(['schoolList'])->where('id',$id)->first();
        return view('user.teacherDetails',compact('data'));
    }
    public function attendanceReport(Request $request){
        $today = Carbon::now()->toDateString();
        $startDate = $request->fromdate;
        $endDate = $request->todate;
        // $startDate = $request->fromdate;
        // $endDate = $request->todate;
        $todayCheckin = Attendance::with(['attendanceManage'])->
        when($startDate && $endDate, function ($query) use ($startDate, $endDate) {
                $query->whereBetween('created_at', [$startDate, $endDate]);
            })
        ->where([['schoolId',Auth('headmasters')->user()->schoolId]])->orderBy('id','DESC')->get();
        //dd($todayCheckin);
        
        return view('user.attendanceReport',compact('todayCheckin'));

    }
    public function attendanceReportDetails($id){
        $data = Attendance::where('id',$id)->first();
        $manage = AttendanceManage::with(['attendances','staffList'])->where('attendanceId',$id)->get();
        $present = AttendanceManage::with(['attendances','staffList'])->where([['attendanceId',$id],['p','1']])->get();
        $absent = AttendanceManage::with(['attendances','staffList'])->where([['attendanceId',$id],['a','1']])->get();
        
        return view('user.attendanceReportDetails',compact('data','manage','absent','present'));
    }
    public function reportPresent($id){
        $attetable = Attendance::where([['schoolId',Auth('headmasters')->user()->schoolId],['id',$id]])->orderBy('id','DESC')->first();

        $present = AttendanceManage::with(['attendances','staffList'])->where([['attendanceId',$id],['p','1']])->get();
        return view('user.reportPresent',compact('present','attetable'));
    }
    public function reportAbsent($id){
         $attetable = Attendance::where([['schoolId',Auth('headmasters')->user()->schoolId],['id',$id]])->orderBy('id','DESC')->first();
        $absent = AttendanceManage::with(['attendances','staffList'])->where([['attendanceId',$id],['a','1']])->get();
        return view('user.reportAbsent',compact('absent','attetable'));
    }
    public function reportCl($id){
         $attetable = Attendance::where([['schoolId',Auth('headmasters')->user()->schoolId],['id',$id]])->orderBy('id','DESC')->first();
        $cl = AttendanceManage::with(['attendances','staffList'])->where([['attendanceId',$id],['cl','1']])->get();
        return view('user.reportCl',compact('cl','attetable'));
    }
    public function reportSl($id){
         $attetable = Attendance::where([['schoolId',Auth('headmasters')->user()->schoolId],['id',$id]])->orderBy('id','DESC')->first();
        $sl = AttendanceManage::with(['attendances','staffList'])->where([['attendanceId',$id],['sl','1']])->get();
        return view('user.reportSl',compact('sl','attetable'));
    }
    public function reportEl($id){
         $attetable = Attendance::where([['schoolId',Auth('headmasters')->user()->schoolId],['id',$id]])->orderBy('id','DESC')->first();
        $el = AttendanceManage::with(['attendances','staffList'])->where([['attendanceId',$id],['el','1']])->get();
        return view('user.reportEl',compact('el','attetable'));
    }

}
