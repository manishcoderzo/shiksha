<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\State;
use App\Models\District;
use App\Models\Block;
use App\Models\School;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BlockController extends Controller
{
    public function blockList(){
        $data = Block::get();
        return view('superAdmin.block.list',compact('data'));
    }
    public function blockCreate(){
        $state = State::get();
        return view('superAdmin.block.create',compact('state'));
    }
    public function districtGet(Request $request){
         $sid = $request->post('sid');
         $dis = District::where('state_id',$sid)->get();
         //$dis = DB::table('districts')->where('state_id',$sid)->orderBy('district_title','asc')->get();
         //print_r($dis);
         $html = '<option selected  disabled>Option..</option>';
         foreach($dis as $t){
            $html .= '<option value="'.$t->districtid.'">'.$t->district_title.'</option>';
         }
         echo $html;
    }
    public function blockGet(Request $request){
         if(Auth('web')->user()->userType == '1'){
            $did = $request->post('did');
            $block = Block::where('districtid',$did)->where('id',Auth('web')->user()->blockId)->get();
        }else{
         $did = $request->post('did');
         $block = Block::where('districtid',$did)->get();
        }
         //$dis = DB::table('districts')->where('state_id',$sid)->orderBy('district_title','asc')->get();
         //print_r($dis);
         $html = '<option selected  disabled>Option..</option>';
         foreach($block as $t){
            $html .= '<option value="'.$t->id.'">'.$t->blockName.'</option>';
         }
         echo $html;
    }
     public function schoolGet(Request $request){
         
         $did = $request->post('did');
         $school = School::where('block',$did)->get();
         //$dis = DB::table('districts')->where('state_id',$sid)->orderBy('district_title','asc')->get();
         //print_r($dis);
         $html = '<option selected  disabled>Option..</option>';
         foreach($school as $t){
            $html .= '<option value="'.$t->id.'">'.$t->schoolName.'</option>';
         }
         echo $html;
    }
    public function blockSubmit(Request $request){
        $validator = Validator::make($request->all(),[
            'stateId' => 'required',
            'districtid' => 'required',
            'blockName' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $block = explode(',', $request->blockName);

        // dd($block);
        foreach ($block as $b) {
            $tagName = trim($b);
             $tag = Block::where('blockName', $tagName)->first();
             if (!$tag) {
                $data = new Block();
                $data->stateId = $request->stateId;
                $data->districtid = $request->districtid;
                $data->blockName = $tagName;
                $data->save();
            }
        }
        // $data = new Block();
        // $data->stateId = $request->stateId;
        // $data->districtid = $request->districtid;
        // $data->blockName = $request->blockName;
        // $data->save();

        
        return redirect()->back()->with('success','Block add succesfully');
    }
    public function blockEdit($id){
      $state = State::get();
      $district = District::get();
      $data = Block::where('id',$id)->first();
      return view('superAdmin.block.edit',compact('data','state','district'));
    }
    public function blockUpdate(Request $request,$id){
        $validator = Validator::make($request->all(),[
            'stateId' => 'required',
            'districtid' => 'required',
            'blockName' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
      
        $data =  Block::find($id);
        $data->stateId = $request->stateId;
        $data->districtid = $request->districtid;
        $data->blockName = $request->blockName;
        $data->save();

        
        return redirect()->back()->with('success','Block Update succesfully');
    }
}
