<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Staff;
use App\Models\StaffType;
use App\Models\Headmaster;
use App\Models\School;
use App\Exports\StaffExport;
use Maatwebsite\Excel\Facades\Excel;


class StaffController extends Controller
{
    public function staffTypeList(){
        $data = StaffType::get();
        return view('superAdmin.staff.staffType.list',compact('data'));
    }
    public function staffTypeCreate(){
         return view('superAdmin.staff.staffType.add');
    }
    public function staffTypeSubmit(Request $request){
        $validator = Validator::make($request->all(),[
            'type' => 'required',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        //dd($validator);
        $data = new StaffType();
        $data->type = $request->type;
        $data->CreaterId = Auth('web')->user()->id;
        $data->save();

        
        return redirect()->back()->with('success','Staff Type add succesfully');
    }

    public function staffTypeEdit($id){
        $data = StaffType::where('id',$id)->first();
        return view('superAdmin.staff.staffType.edit',compact('data'));
    }
    public function staffTypeUpdate(Request $request,$id){
        $validator = Validator::make($request->all(),[
            'type' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        //dd($validator);
        $data = StaffType::find($id);
        $data->type = $request->type;
        $data->CreaterId = Auth('web')->user()->id;
        $data->status = $request->status;
        $data->save();

        
        return redirect()->back()->with('success','Staff Type Update succesfully');
    }

    public function staffList(Request $request){
        $schoolId = School::where('block',Auth('web')->user()->blockId)->first();
        if(Auth('web')->user()->userType == '1'){
            $school = School::where([['status','1'],['block',Auth('web')->user()->blockId]])->get();
            $data = Staff::with(['schoolList','staffTypeList'])
              ->when($request->filled('type'), function ($query) use ($request) {
                    $query->where('staffTypeId', 'like', '%' . $request->type . '%');
                })
              ->when($request->filled('school'), function ($query) use ($request) {
                    $query->where('schoolId', 'like', '%' . $request->school . '%');
                })->where('schoolId',$schoolId->id)
              ->get();
        }else{
            $school = School::where('status','1')->get();
            $data = Staff::with(['schoolList','staffTypeList'])
          ->when($request->filled('type'), function ($query) use ($request) {
                $query->where('staffTypeId', 'like', '%' . $request->type . '%');
            })
          ->when($request->filled('school'), function ($query) use ($request) {
                $query->where('schoolId', 'like', '%' . $request->school . '%');
            })
          ->get();
        }
        $staffType = StaffType::where('status','1')->get();

        

        //$data = Staff::with(['schoolList','staffTypeList'])->get();
        return view('superAdmin.staff.list',compact('data','staffType','school'));
    }
    public function staffCreate(){
        if(Auth('web')->user()->userType == '1'){
            $school = School::where([['status','1'],['block',Auth('web')->user()->blockId]])->get();
        }else{
            $school = School::where('status','1')->get();
        }
        $staffType = StaffType::where('status','1')->get();
        $headmaster = Headmaster::where('status','1')->get();
        return view('superAdmin.staff.add',compact('headmaster','staffType','school'));
    }
    public function staffSubmit(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'roll' => 'required',
            'teacherId' => 'required',
            'gender' => 'required',
            'category' => 'required',
            'aadharNo' => 'required',
            'class' => 'required',
            'subject' => 'required',
            'uDiskCode' => 'required',
            'contactNo' => 'required',
            'email' => 'required',
            'password' => 'required',
            'schoolId' => 'required',
            'staffTypeId' => 'required',
        ]);


        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        //dd($validator);
        $data = new Staff();
        $data->name = $request->name;
        $data->roll = $request->roll;
        $data->teacherId = $request->teacherId;
        $data->gender = $request->gender;
        $data->category = $request->category;
        $data->aadharNo = $request->aadharNo;
        $data->class = $request->class;
        $data->subject = $request->subject;
        $data->uDiskCode = $request->uDiskCode;
        $data->schoolId = $request->schoolId;
        $data->staffTypeId = $request->staffTypeId;
        $data->contactNo = $request->contactNo;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->CreaterId = Auth('web')->user()->id;
        $data->save();

        
        return redirect()->back()->with('success','Staff add succesfully');
    }
    public function staffdelete($id){
        Staff::where('id',$id)->delete();
        return redirect()->back();
    }
    public function staffEdit($id){
        $staffType = StaffType::where('status','1')->get();
        if(Auth('web')->user()->userType == '1'){
            $school = School::where([['status','1'],['block',Auth('web')->user()->blockId]])->get();
        }else{
            $school = School::where('status','1')->get();
        }
        $data = Staff::where('id',$id)->first();
        return view('superAdmin.staff.edit',compact('data','staffType','school'));
    }
    public function staffUpdate(Request $request,$id){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'roll' => 'required',
            'teacherId' => 'required',
            'gender' => 'required',
            'category' => 'required',
            'aadharNo' => 'required',
            'class' => 'required',
            'subject' => 'required',
            'uDiskCode' => 'required',
            'contactNo' => 'required',
            'email' => 'required',
            'schoolId' => 'required',
            'staffTypeId' => 'required',
        ]);
        //dd($validator);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        //dd($validator);
        $data = Staff::find($id);

        $data->name = $request->name;
        $data->roll = $request->roll;
        $data->teacherId = $request->teacherId;
        $data->gender = $request->gender;
        $data->category = $request->category;
        $data->aadharNo = $request->aadharNo;
        $data->class = $request->class;
        $data->subject = $request->subject;
        $data->uDiskCode = $request->uDiskCode;
        $data->schoolId = $request->schoolId;
        $data->staffTypeId = $request->staffTypeId;
        $data->contactNo = $request->contactNo;
        $data->email = $request->email;;
        if($request->password){
            $data->password = Hash::make($request->password);
        }
        $data->CreaterId = Auth('web')->user()->id;
        $data->status = $request->status;

        $data->save();

        
        return redirect()->back()->with('success','Staff Update succesfully');
    }
    public function staffView($id){
        $staffType = StaffType::where('status','1')->get();
        $school = School::where('status','1')->get();
        $data = Staff::where('id',$id)->first();
        return view('superAdmin.staff.view',compact('data','staffType','school'));
    }

    public function staffexport()
    {
        return Excel::download(new StaffExport, 'staffs.xlsx');
    }
}
