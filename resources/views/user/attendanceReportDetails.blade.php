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
    .card-bodys{
        padding: 0;
    }
.zoomable {
    width: 100%;
    height: 100%;
    transition: transform 0.3s ease;
    cursor: pointer;
}

.zoomed {
    transform: scale(4);
    z-index: 1;
    position: absolute;
    width: 55% !important;
    top: 0;
    left: 79%;
}
.zoomables {
    width: 100%;
    height: 100%;
    transition: transform 0.3s ease;
    cursor: pointer;
}

.zoomeds {
    transform: scale(4);
    z-index: 1;
    position: absolute;
    width: 58% !important;
    top: 0;
    left: -41%;
}
.outzoomable {
    width: 100%;
    height: 100%;
    transition: transform 0.3s ease;
    cursor: pointer;
}

.outzoomed {
    transform: scale(4);
    z-index: 1;
    position: absolute;
    width: 55% !important;
    top: -130;
    left: 79%;
}
.outzoomables {
    width: 100%;
    height: 100%;
    transition: transform 0.3s ease;
    cursor: pointer;
}

.outzoomeds {
    transform: scale(4);
    z-index: 1;
    position: absolute;
    width: 58% !important;
    top: -130;
    left: -41%;
}
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    const zoomImage = document.getElementById('zoomImage');
    const zoomImages = document.getElementById('zoomImages');
    

    zoomImage.addEventListener('click', function() {
        this.classList.toggle('zoomed');
    });
    zoomImages.addEventListener('click', function() {
        this.classList.toggle('zoomeds');
    });
    
});

    document.addEventListener('DOMContentLoaded', function() {
    const outzoomImage = document.getElementById('outzoomImage');
    const outzoomImages = document.getElementById('outzoomImages');

    outzoomImage.addEventListener('click', function() {
        this.classList.toggle('outzoomed');
    });
    outzoomImages.addEventListener('click', function() {
        this.classList.toggle('outzoomeds');
    });
});
</script>
<div class="p-2 m-2 top-content border-bottom topBackbtnFixed">
     <p class="h6" style="font-weight: 600;">
        <a href="{{route('user.attendanceReport')}}" style="color:black">
           <i class="fa-solid fa-arrow-left" id="icons" style="margin-right: 10px;"></i>Attendance Reports Details</a>
    </p>
</div>

<div class="p-2 m-2">
     @if($data->status == 0)
    <p id="teacher-name" style="font-weight:500">
     Checkin Time<br>
        Date: {{$data->created_at->format('d-m-Y')}}</p>
     @elseif($data->status == 1)
     <p id="teacher-name" style="font-weight:500">
     Checkout Time<br>
        Date: {{$data->created_at->format('d-m-Y')}}</p>
    @endif
    <div class="row">
        @if($data->status == 0)
        <div class="col-lg-3 col-md-4 col-6">
            <div class="card" style="width: 100%;">
              <div class="card-body">
                <h5 class="card-title">Selfie</h5>
                <!-- <h6 class="card-subtitle mb-2 text-muted">CheckIn Time</h6> -->
                <p class="card-text">
                    @if($data->selfie != '' && file_exists(public_path().'/superadmin/selfie/'.$data->selfie))
                    <img src="{{asset('superadmin/selfie/'.$data->selfie)}}" style="width: 70px" id="zoomImage" class="zoomable">
                    @else
                    <img src="{{asset('assets/images/noimage.png')}}" style="width: 70px">
                    @endif
              </div>
            </div>
        </div>
        <div class=" col-lg-3 col-md-4 col-6">
            <div class="card" style="width: 100%;">
              <div class="card-body">
                <h5 class="card-title">Attendace</h5>
                <!-- <h6 class="card-subtitle mb-2 text-muted">CheckIn Time</h6> -->
                <p class="card-text">
                    @if($data->registerImage != '' && file_exists(public_path().'/superadmin/attendanceImage/'.$data->registerImage))
                    <img src="{{asset('superadmin/attendanceImage/'.$data->registerImage)}}" style="width: 70px" id="zoomImages" class="zoomables">
                    @else
                    <img src="{{asset('assets/images/noimage.png')}}" style="width: 70px">
                    @endif
                    <!-- <img src="{{asset('assets/images/avatars/03.png')}}" style="width: 70px" id="zoomImages" class="zoomables"> -->
                </p>
              </div>
            </div>
        </div>
        @elseif($data->status == 1)
        <div class="col-lg-3 col-md-4 col-6 mt-2">
            <div class="card" style="width: 100%;">
              <div class="card-body">
                <h5 class="card-title">Selfie</h5>
                <!-- <h6 class="card-subtitle mb-2 text-muted">Checkout Time</h6> -->
                <p class="card-text">
                    @if($data->selfie != '' && file_exists(public_path().'/superadmin/selfie/'.$data->selfie))
                    <img src="{{asset('superadmin/selfie/'.$data->selfie)}}" style="width: 70px" id="outzoomImage" class="outzoomable">
                    @else
                    <img src="{{asset('assets/images/noimage.png')}}" style="width: 70px">
                    @endif
                    <!-- <img src="{{asset('assets/images/avatars/03.png')}}" style="width: 70px" id="outzoomImage" class="outzoomable"> -->
                </p>
              </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-6 mt-2">
            <div class="card" style="width: 100%;">
              <div class="card-body">
                <h5 class="card-title">Register</h5>
                <!-- <h6 class="card-subtitle mb-2 text-muted">Checkout Time</h6> -->
                <p class="card-text">
                    @if($data->registerImage != '' && file_exists(public_path().'/superadmin/attendanceImage/'.$data->registerImage))
                    <img src="{{asset('superadmin/attendanceImage/'.$data->registerImage)}}" style="width: 70px" id="outzoomImages" class="outzoomables">
                    @else
                    <img src="{{asset('assets/images/noimage.png')}}" style="width: 70px">
                    @endif
                    <!-- <img src="{{asset('assets/images/avatars/03.png')}}" style="width: 70px" id="outzoomImages" class="outzoomables"> -->
                </p>
              </div>
            </div>
        </div>
        @endif
        <div class="col-lg-3 col-md-4 col-6 mt-2">
            <div class="card" style="width: 100%;">
              <div class="card-body">
                <h5 class="card-title">Total Teacher</h5>
                <h6 class="card-subtitle mb-2 text-muted">In School</h6>
                <p class="card-text">{{$manage->count()}}</p>
              </div>
            </div>
        </div>
        @if($data->status == 0)
        <div class="col-lg-3 col-md-4 col-6 mt-2">
            <div class="card" style="width: 100%;">
              <div class="card-body">
                <h5 class="card-title">Attendace</h5>
                <h6 class="card-subtitle mb-2 text-muted">CheckIn Time</h6>
                <p class="card-text">{{$data->created_at->format('H:i')}}</p>
              </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-6 mt-2">
            <div class="card" style="width: 100%;">
                <div class="row">
                <div class="col-4 mt-2" style="padding-right: 2%;">
                    <a href="{{route('user.reportPresent',[$data->id])}}" style="color: black;text-decoration: none;">
                        <div class="card" style="width: 100%;">
                          <div class="card-bodys card-bodys">
                            <h5 class="card-title text-center">P</h5>
                            @php
                            $today = Carbon::now()->toDateString();
                            $present = App\Models\AttendanceManage::where([['headmasterId',Auth('headmasters')->user()->id],['p','1'],['attendanceId',$data->id]])->get();
                             @endphp
                            <p class="card-text text-center">{{$present->count()}}</p>
                            
                          </div>
                        </div>
                    </a>
                </div>
                <div class="col-4 mt-2" style="padding-right: 1%;">
                    <a href="{{route('user.reportAbsent',[$data->id])}}" style="color: black;text-decoration: none;">
                        <div class="card" style="width: 100%;">
                          <div class="card-body card-bodys">
                             @php
                            $today = Carbon::now()->toDateString();
                            $absent = App\Models\AttendanceManage::where([['headmasterId',Auth('headmasters')->user()->id],['a','1'],['attendanceId',$data->id]])->get();
                             @endphp
                            <h5 class="card-title text-center">A</h5>
                           
                            <p class="card-text text-center">{{$absent->count()}}</p>
                          </div>
                        </div>
                    </a>
                </div>
                <div class="col-4 mt-2" style="padding-left: 1%;">
                    <a href="{{route('user.reportCl',[$data->id])}}" style="color: black;text-decoration: none;">
                        <div class="card" style="width: 100%;">
                          <div class="card-body card-bodys">
                            <h5 class="card-title text-center">CL</h5>
                            @php
                            $today = Carbon::now()->toDateString();
                            $cl = App\Models\AttendanceManage::where([['headmasterId',Auth('headmasters')->user()->id],['cl','1'],['attendanceId',$data->id]])->get();
                             @endphp
                            <p class="card-text text-center">{{$cl->count()}}</p>
                            
                          </div>
                        </div>
                    </a>
                </div>
                <div class="col-4 mt-2" style="padding-right: 1%;">
                    <a href="{{route('user.reportSl',[$data->id])}}" style="color: black;text-decoration: none;">
                        <div class="card" style="width: 100%;">
                          <div class="card-body card-bodys">
                             @php
                            $today = Carbon::now()->toDateString();
                            $sl = App\Models\AttendanceManage::where([['headmasterId',Auth('headmasters')->user()->id],['sl','1'],['attendanceId',$data->id]])->get();
                             @endphp
                            <h5 class="card-title text-center">SL</h5>
                           
                            <p class="card-text text-center">{{$sl->count()}}</p>
                          </div>
                        </div>
                    </a>
                </div>
                <div class="col-4 mt-2" style="padding-right: 2%;">
                    <a href="{{route('user.reportEl',[$data->id])}}" style="color: black;text-decoration: none;">
                        <div class="card" style="width: 100%;">
                          <div class="card-body card-bodys">
                            <h5 class="card-title text-center">EL</h5>
                            @php
                            $today = Carbon::now()->toDateString();
                            $el = App\Models\AttendanceManage::where([['headmasterId',Auth('headmasters')->user()->id],['el','1'],['attendanceId',$data->id]])->get();
                             @endphp
                            <p class="card-text text-center">{{$el->count()}}</p>
                            
                          </div>
                        </div>
                    </a>
                </div>
            </div>
            </div>
        </div>

        @elseif($data->status == 1)
        <div class="col-lg-3 col-md-4 col-6 mt-2">
            <div class="card" style="width: 100%;">
              <div class="card-body">
                <h5 class="card-title">Attendace</h5>
                <h6 class="card-subtitle mb-2 text-muted">CheckOut Time</h6>
                <p class="card-text">{{$data->created_at->format('H:i')}}</p>
              </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-6 mt-2">
            <div class="card" style="width: 100%;">
                <div class="row">
                <div class="col-4 mt-2" style="padding-right: 2%;">
                    <a href="{{route('user.reportPresent',[$data->id])}}" style="color: black;text-decoration: none;">
                        <div class="card" style="width: 100%;">
                          <div class="card-bodys card-bodys">
                            <h5 class="card-title text-center">P</h5>
                            @php
                            $today = Carbon::now()->toDateString();
                            $present = App\Models\AttendanceManage::where([['headmasterId',Auth('headmasters')->user()->id],['p','1'],['attendanceId',$data->id]])->get();
                             @endphp
                            <p class="card-text text-center">{{$present->count()}}</p>
                            
                          </div>
                        </div>
                    </a>
                </div>
                <div class="col-4 mt-2" style="padding-right: 1%;">
                    <a href="{{route('user.reportAbsent',[$data->id])}}" style="color: black;text-decoration: none;">
                        <div class="card" style="width: 100%;">
                          <div class="card-body card-bodys">
                             @php
                            $today = Carbon::now()->toDateString();
                            $absent = App\Models\AttendanceManage::where([['headmasterId',Auth('headmasters')->user()->id],['a','1'],['attendanceId',$data->id]])->get();
                             @endphp
                            <h5 class="card-title text-center">A</h5>
                           
                            <p class="card-text text-center">{{$absent->count()}}</p>
                          </div>
                        </div>
                    </a>
                </div>
                <div class="col-4 mt-2" style="padding-left: 1%;">
                    <a href="{{route('user.reportCl',[$data->id])}}" style="color: black;text-decoration: none;">
                        <div class="card" style="width: 100%;">
                          <div class="card-body card-bodys">
                            <h5 class="card-title text-center">CL</h5>
                            @php
                            $today = Carbon::now()->toDateString();
                            $cl = App\Models\AttendanceManage::where([['headmasterId',Auth('headmasters')->user()->id],['cl','1'],['attendanceId',$data->id]])->get();
                             @endphp
                            <p class="card-text text-center">{{$cl->count()}}</p>
                            
                          </div>
                        </div>
                    </a>
                </div>
                <div class="col-4 mt-2" style="padding-right: 1%;">
                    <a href="{{route('user.reportSl',[$data->id])}}" style="color: black;text-decoration: none;">
                        <div class="card" style="width: 100%;">
                          <div class="card-body card-bodys">
                             @php
                            $today = Carbon::now()->toDateString();
                            $sl = App\Models\AttendanceManage::where([['headmasterId',Auth('headmasters')->user()->id],['sl','1'],['attendanceId',$data->id]])->get();
                             @endphp
                            <h5 class="card-title text-center">SL</h5>
                           
                            <p class="card-text text-center">{{$sl->count()}}</p>
                          </div>
                        </div>
                    </a>
                </div>
                <div class="col-4 mt-2" style="padding-right: 2%;">
                    <a href="{{route('user.reportEl',[$data->id])}}" style="color: black;text-decoration: none;">
                        <div class="card" style="width: 100%;">
                          <div class="card-body card-bodys">
                            <h5 class="card-title text-center">EL</h5>
                            @php
                            $today = Carbon::now()->toDateString();
                            $el = App\Models\AttendanceManage::where([['headmasterId',Auth('headmasters')->user()->id],['el','1'],['attendanceId',$data->id]])->get();
                             @endphp
                            <p class="card-text text-center">{{$el->count()}}</p>
                            
                          </div>
                        </div>
                    </a>
                </div>
            </div>
            </div>
        </div>
        @endif
    </div>
  
</div>

@include('user.layout.footernav')

@endsection
