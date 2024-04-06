@extends('user.layout.app')
@section('content')
@php use Carbon\Carbon;; @endphp
<style type="text/css">
    .card-title{
        font-size: 13px;
    }
    .card-subtitle{
        font-size: 12px;
    }
    .card-body{
        padding: 0;
    }
    .main-card-sec{
        width: 100%;
    }
    @media screen and (max-width:461px){
        .main-card-sec{
            width: 105%;
        }
    }
</style>
<div class="p-2 top-content border-bottom topBackbtnFixed">
     <p class="h6" style="font-weight: 600;">
        <a href="{{route('user.dashboard')}}" style="color:black">
           <i class="fa-solid fa-arrow-left" id="icons" style="margin-right: 10px;"></i>Attendance Reports</a>
    </p>
</div>

<div class="p-2 m-2">
    <form method="get">
        <div class="row mb-4">
            <div class="col-lg-4 col-md-4 col-6">
                <h6>From Date:</h6>
                <input type="date" name="fromdate" class="form-control"  value="">
             </div>
             <div class="col-lg-4 col-md-4 col-6">
                 <h6>To Date:</h6>
                <input type="date" name="todate" class="form-control"  value="">
             </div>
             <div class="col-lg-4 col-md-4 col-2 mt-2">
                <input type="submit" value="Filter" class="btn btn-success mt-3">
             </div>
        </div>
    </form>
    <div class="row main-card-sec">
    @foreach($todayCheckin as $t)
        <div class="col-lg-3 col-md-4 col-6 mt-2" style="padding-left:2%;padding-right: 0;"> 
            <div class="card shadow p-1">
                <div class="col-12">
                    @if($t->status == 0)
                    <p id="teacher-name" style="font-weight:500;font-size: 14px;margin-bottom: 0"><a href="{{route('user.attendanceReportDetails',[$t->id])}}" style="color:black;">Checkin Date:<br> {{$t->created_at->format('d-m-Y')}}</a></p>
                    @else
                        <p id="teacher-name" style="font-weight:500;font-size: 14px;margin-bottom: 0"><a href="{{route('user.attendanceReportDetails',[$t->id])}}" style="color:black;">Checkout Date:<br> {{$t->created_at->format('d-m-Y')}}</a></p>
                    @endif
                </div>
                <div class="row">
                    @if($t->status == 0)
                    <div class="col-9 mt-2">
                        <div class="card" style="width: 100%;">
                          <div class="card-body">
                            <h5 class="card-title text-center">CheckIn Time</h5>
                            <p class="card-text text-center">{{$t->created_at->format('H:i')}}</p>
                          </div>
                        </div>
                    </div>
                    @elseif($t->status == 1)
                    <div class="col-9 mt-2">
                        <div class="card" style="width: 100%;">
                          <div class="card-body">
                            <h5 class="card-title text-center">CheckOut Time</h5>
                            <p class="card-text text-center">{{$t->created_at->format('H:i')}}</p>
                          </div>
                        </div>
                    </div>
                    @endif
                    @if($t->status == 1)
                    <div class="col-3 mt-2" style="padding-left: 1%;">
                        <a href="{{route('user.reportPresent',[$t->id])}}" style="color: black;text-decoration: none;">
                            <div class="card" style="width: 100%;">
                              <div class="card-body">
                                <h5 class="card-title text-center">P</h5>
                                @php
                                $today = Carbon::now()->toDateString();
                                $present = App\Models\AttendanceManage::where([['headmasterId',Auth('headmasters')->user()->id],['p','1'],['attendanceId',$t->id]])->get();
                                 @endphp
                                <p class="card-text text-center">{{$present->count()}}</p>
                                
                              </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-3 mt-2" style="padding-right: 1%;">
                        <a href="{{route('user.reportAbsent',[$t->id])}}" style="color: black;text-decoration: none;">
                            <div class="card" style="width: 100%;">
                              <div class="card-body">
                                 @php
                                $today = Carbon::now()->toDateString();
                                $absent = App\Models\AttendanceManage::where([['headmasterId',Auth('headmasters')->user()->id],['a','1'],['attendanceId',$t->id]])->get();
                                 @endphp
                                <h5 class="card-title text-center">A</h5>
                               
                                <p class="card-text text-center">{{$absent->count()}}</p>
                              </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-3 mt-2" style="padding-right: 1%;">
                        <a href="{{route('user.reportCl',[$t->id])}}" style="color: black;text-decoration: none;">
                            <div class="card" style="width: 100%;">
                              <div class="card-body">
                                <h5 class="card-title text-center">CL</h5>
                                @php
                                $today = Carbon::now()->toDateString();
                                $cl = App\Models\AttendanceManage::where([['headmasterId',Auth('headmasters')->user()->id],['cl','1'],['attendanceId',$t->id]])->get();
                                 @endphp
                                <p class="card-text text-center">{{$cl->count()}}</p>
                                
                              </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-3 mt-2" style="padding-left: 1%;">
                        <a href="{{route('user.reportSl',[$t->id])}}" style="color: black;text-decoration: none;">
                            <div class="card" style="width: 100%;">
                              <div class="card-body">
                                 @php
                                $today = Carbon::now()->toDateString();
                                $sl = App\Models\AttendanceManage::where([['headmasterId',Auth('headmasters')->user()->id],['sl','1'],['attendanceId',$t->id]])->get();
                                 @endphp
                                <h5 class="card-title text-center">SL</h5>
                               
                                <p class="card-text text-center">{{$sl->count()}}</p>
                              </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-3 mt-2" style="padding-left: 1%;">
                        <a href="{{route('user.reportEl',[$t->id])}}" style="color: black;text-decoration: none;">
                            <div class="card" style="width: 100%;">
                              <div class="card-body">
                                <h5 class="card-title text-center">EL</h5>
                                @php
                                $today = Carbon::now()->toDateString();
                                $el = App\Models\AttendanceManage::where([['headmasterId',Auth('headmasters')->user()->id],['el','1'],['attendanceId',$t->id]])->get();
                                 @endphp
                                <p class="card-text text-center">{{$el->count()}}</p>
                                
                              </div>
                            </div>
                        </a>
                    </div>
                    @endif
            
                    @if($t->status == 0)
                    <div class="col-3 mt-2" style="padding-left: 1%;">
                        <a href="{{route('user.reportPresent',[$t->id])}}" style="color: black;text-decoration: none;">
                            <div class="card" style="width: 100%;">
                              <div class="card-body">
                                <h5 class="card-title text-center">P</h5>
                                @php
                                $today = Carbon::now()->toDateString();
                                $present = App\Models\AttendanceManage::where([['headmasterId',Auth('headmasters')->user()->id],['p','1'],['attendanceId',$t->id]])->get();
                                 @endphp
                                <p class="card-text text-center">{{$present->count()}}</p>
                                
                              </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-3 mt-2" style="padding-right: 1%;">
                        <a href="{{route('user.reportAbsent',[$t->id])}}" style="color: black;text-decoration: none;">
                            <div class="card" style="width: 100%;">
                              <div class="card-body">
                                 @php
                                $today = Carbon::now()->toDateString();
                                $absent = App\Models\AttendanceManage::where([['headmasterId',Auth('headmasters')->user()->id],['a','1'],['attendanceId',$t->id]])->get();
                                 @endphp
                                <h5 class="card-title text-center">A</h5>
                               
                                <p class="card-text text-center">{{$absent->count()}}</p>
                              </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-3 mt-2" style="padding-right: 1%;">
                        <a href="{{route('user.reportCl',[$t->id])}}" style="color: black;text-decoration: none;">
                            <div class="card" style="width: 100%;">
                              <div class="card-body">
                                <h5 class="card-title text-center">CL</h5>
                                @php
                                $today = Carbon::now()->toDateString();
                                $cl = App\Models\AttendanceManage::where([['headmasterId',Auth('headmasters')->user()->id],['cl','1'],['attendanceId',$t->id]])->get();
                                 @endphp
                                <p class="card-text text-center">{{$cl->count()}}</p>
                                
                              </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-3 mt-2" style="padding-left: 1%;">
                        <a href="{{route('user.reportSl',[$t->id])}}" style="color: black;text-decoration: none;">
                            <div class="card" style="width: 100%;">
                              <div class="card-body">
                                 @php
                                $today = Carbon::now()->toDateString();
                                $sl = App\Models\AttendanceManage::where([['headmasterId',Auth('headmasters')->user()->id],['sl','1'],['attendanceId',$t->id]])->get();
                                 @endphp
                                <h5 class="card-title text-center">SL</h5>
                               
                                <p class="card-text text-center">{{$sl->count()}}</p>
                              </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-3 mt-2" style="padding-left: 1%;">
                        <a href="{{route('user.reportEl',[$t->id])}}" style="color: black;text-decoration: none;">
                            <div class="card" style="width: 100%;">
                              <div class="card-body">
                                <h5 class="card-title text-center">EL</h5>
                                @php
                                $today = Carbon::now()->toDateString();
                                $el = App\Models\AttendanceManage::where([['headmasterId',Auth('headmasters')->user()->id],['el','1'],['attendanceId',$t->id]])->get();
                                 @endphp
                                <p class="card-text text-center">{{$el->count()}}</p>
                                
                              </div>
                            </div>
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
    </div>
    <p style="margin-top:50px"></p>
</div>

@include('user.layout.footernav')

@endsection
