<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\School;
use App\Models\Headmaster;
use App\Models\State;

class HeadmasterController extends Controller
{
    public function headmasterList(Request $request){
        $schoolId = School::where('block',Auth('web')->user()->blockId)->first();
        if(Auth('web')->user()->userType == '1'){
            $state = State::get();
            $data = Headmaster::with(['schoolList'])
            ->when($request->filled('schoolId'), function ($query) use ($request) {
            $query->where('schoolId', 'like', '%' . $request->schoolId . '%');
            })
            ->where('schoolId',$schoolId->id)->get();
        }else{
            $state = State::get();
            $data = Headmaster::with(['schoolList'])
            ->when($request->filled('schoolId'), function ($query) use ($request) {
            $query->where('schoolId', 'like', '%' . $request->schoolId . '%');
            })
            ->get();
        }
        return view('superAdmin.headmaster.list',compact('data','state'));
    }
    public function headmasterCreate(){
         if(Auth('web')->user()->userType == '1'){
            $school = School::where('status','1')->where('block',Auth('web')->user()->blockId)->get();
        }else{
        $school = School::where('status','1')->get();
        }
        return view('superAdmin.headmaster.add',compact('school'));
    }
    public function schoolGet(Request $request){
        $sid = $request->post('sid');
         $school = School::with(['stateList'])->where('id',$sid)->get();
         //print_r($school);
         $html = '';
         foreach($school as $t){
            $html .= '<option value="'.$t->stateList->state_id.'" selected disabled>'.$t->stateList->state_title.'</option>';
         }
         echo $html;
    }
    public function disGet(Request $request){
        $sid = $request->post('sid');
         $school = School::with(['districtList'])->where('id',$sid)->get();
         //print_r($school);
         $html = '';
         foreach($school as $t){
            $html .= '<option value="'.$t->districtList->districtid.'" selected disabled>'.$t->districtList->district_title.'</option>';
         }
         echo $html;
    }
    public function bloGet(Request $request){
        $sid = $request->post('sid');
         $school = School::with(['blockList'])->where('id',$sid)->get();
         //print_r($school);
         $html = '';
         foreach($school as $t){
            $html .= '<option value="'.$t->blockList->id.'" selected disabled>'.$t->blockList->blockName.'</option>';
         }
         echo $html;
    }
    public function headmasterGet(Request $request){
        $hid = $request->post('sid');
         $headmaster = Headmaster::where('schoolId',$hid)->get();
         //print_r($school);
         $html = '';
         foreach($headmaster as $t){
            $html .= '<option value="'.$t->id.'" selected disabled>'.$t->name.'</option>';
         }
         echo $html;
    }
    public function headmasterSubmit(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'contactNo' => 'required',
            'email' => 'required',
            'password' => 'required',
            'schoolId' => 'required|unique:headmasters,schoolId',
        ]);


        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        //dd($validator);
        $data = new Headmaster();
        $data->name = $request->name;
        $data->schoolId = $request->schoolId;
        $data->contactNo = $request->contactNo;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->CreaterId = Auth('web')->user()->id;
        $data->save();

        
        return redirect()->back()->with('success','Headmaster add succesfully');
    }
    public function headmasterdelete($id){
        Headmaster::where('id',$id)->delete();
        return redirect()->back();
    }
    public function headmasterEdit($id){
        if(Auth('web')->user()->userType == '1'){
            $school = School::where('status','1')->where('block',Auth('web')->user()->blockId)->get();
        }else{
        $school = School::where('status','1')->get();
        }
        //$school = School::where('status','1')->get();
        $data = Headmaster::where('id',$id)->first();
        return view('superAdmin.headmaster.edit',compact('data','school'));
    }
    public function headmasterUpdate(Request $request,$id){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'contactNo' => 'required',
            'email' => 'required',
            //'schoolId' => 'required|unique:headmasters,schoolId',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        //dd($validator);
        $data = Headmaster::find($id);
        $data->name = $request->name;
        // $data->schoolId = $request->schoolId;
        $data->contactNo = $request->contactNo;
        $data->email = $request->email;
        if($request->password){
            $data->password = Hash::make($request->password);
        }
        $data->CreaterId = Auth('web')->user()->id;
        $data->status = $request->status;
        $data->save();

        
        return redirect()->back()->with('success','Headmaster Update succesfully');
    }
}
