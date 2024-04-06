<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\School;
use App\Models\User;
use App\Models\Headmaster;
use App\Models\Staff;

class DashboardController extends Controller
{
    public function dashboard(){
        $admin = User::where('userType','1')->where('status','1')->get();
        $school = School::where('status','1')->get();
        $headmaster = Headmaster::where('status','1')->get();
        $staff = Staff::where('status','1')->get();
        return view('superAdmin.dashboard',compact('admin','school','headmaster','staff'));
    }
}
