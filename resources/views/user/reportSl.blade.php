@extends('user.layout.app')
@section('content')
<div class="p-2 top-content border-bottom topBackbtnFixed">
     <p class="h6" style="font-weight: 600;">
        <a href="{{route('user.attendanceReport')}}" style="color:black">
           <i class="fa-solid fa-arrow-left" id="icons" style="margin-right: 10px;"></i>Attendance Sl</a>
    </p>
</div>

<div class="p-2 m-2">
    @if($attetable->status == 0)
    <p id="teacher-name" style="font-weight:500">
     Checkin Time
        Date: {{$attetable->created_at->format('d-m-Y')}}</p>
     @elseif($attetable->status == 1)
     <p id="teacher-name" style="font-weight:500">
     Checkout Time<br>
        Date: {{$attetable->created_at->format('d-m-Y')}}</p>
    @endif
    @if($attetable->status == 0)
    <p class="h6 border-bottom mt-4" style="font-weight: 600;">
        SL
    </p>
    <div class="row mb-4" style="width: 100%;">
        @foreach($sl as $s)
        <div class="col-lg-3 col-md-4 col-12 mt-2">
            <div class=" user-c-name">
                
                <p id="teacher-name">
                    <a href="{{route('user.teacherDetails',[$s->staffList->id])}}" style="color:black;text-decoration: none;"> 
                    @if($s->staffList->photo != '' && file_exists(public_path().'/superadmin/profileImage/'.$s->staffList->photo))
                    <img src="{{asset('superadmin/staff/'.$s->staffList->photo)}}" class="user-image">
                    @else
                    <img src="{{asset('assets/images/noimage.png')}}" class="user-image">
                    @endif
                    <span class="ml-2">{{$s->staffList->name}}</span></a>
                </p>
                
               
            </div>
        </div>
         @endforeach
    </div>
    @elseif($attetable->status == 1)
    <p class="h6 border-bottom" style="font-weight: 600;">
      SL
    </p>
    <div class="row mb-4" style="width: 100%;">
        @foreach($sl as $s)
        <div class="col-lg-3 col-md-4 col-12 mt-2">
            <div class="user-c-name">
                
                <p id="teacher-name">
                    <a href="{{route('user.teacherDetails',[$s->staffList->id])}}" style="color:black;text-decoration: none;">
                    @if($s->staffList->photo != '' && file_exists(public_path().'/superadmin/profileImage/'.$s->staffList->photo))
                    <img src="{{asset('superadmin/staff/'.$s->staffList->photo)}}" class="user-image">
                    @else
                    <img src="{{asset('assets/images/noimage.png')}}" class="user-image">
                    @endif
                    <span class="ml-2">{{$s->staffList->name}}</span></a>
                </p>
                
                
            </div>
        </div>
        @endforeach
    </div>
    @endif

</div>
@include('user.layout.footernav')

@endsection
