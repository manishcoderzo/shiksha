<?php

namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\{Auth,Hash};
use Illuminate\Support\Facades\Validator;
use App\Models\{User,Headmaster,Staff};
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;

class ApiController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email_or_mobile' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $credentials = $this->getCredentials($request->input('email_or_mobile'), $request->input('password'));
        $data = Headmaster::with(['schoolList.stateList','schoolList.districtList','schoolList.blockList','Staff'])->where('email', $request->email_or_mobile )->first();

        if (isset($data) && $data && auth('headmasters')->attempt($credentials)) {
            // $token = auth('headmasters')->createToken('shiksha')->plainTextToken;
           // $token = bin2hex(random_bytes(32));
            $user = $data;
            $token = $user->createToken('shiksha')->plainTextToken;

            $data = Headmaster::with(['schoolList.stateList','schoolList.districtList','schoolList.blockList','Staff'])->where('id',auth('headmasters')->id())->first();

            return response()->json(['token' => $token, 'data' => $data], 200);
        }

        return response()->json(['message' => 'Unauthorized'], 401);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out'], 200);
    }

    private function getCredentials($emailOrMobile, $password)
    {
        $isMobile = preg_match('/^\d{10}$/', $emailOrMobile);

        if ($isMobile) {
            return ['mobile' => $emailOrMobile, 'password' => $password];
        }

        return ['email' => $emailOrMobile, 'password' => $password];
    }

    public function staffList(Request $request){
        dd(auth('headmasters')->id());
            $data = Headmaster::with(['Staff'])->where('id',auth('headmasters')->id())->first();
            //dd($data);
            // $staff = $data->Staff;
             return response()->json(['message' => 'Staff get ','data'=>$data], 200);
    }
    // public function attendance(){
    //    $head = Headmaster::where('schoolId',auth('headmasters')->schoolId)->first();
    //     dd($head,Auth::user());
    //     $data = Staff::where('schoolId',auth('headmasters')->schoolId())->get();
    //     $today = Carbon::now()->toDateString();
    //     $todayCheckout = Attendance::
    //         whereDate('created_at', $today)
    //         ->where([['headmasterId',auth('headmasters')->id],['status','1']])
    //         ->first();
    //     $todayCheckin = Attendance::
    //     whereDate('created_at', $today)
    //     ->where([['headmasterId',auth('headmasters')->id],['status','0']])
    //     ->first();

    //     return response()->json(['message' => 'attendance get', 'data' => $data,'head' => $head,'todayCheckin' => $todayCheckin,'todayCheckout' => $todayCheckout], 200);
    // }
  
}
