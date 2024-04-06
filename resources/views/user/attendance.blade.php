@extends('user.layout.app')
@section('content')
@php use Carbon\Carbon;; @endphp

    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
        }
        .top-content a{
            color: black;
            text-decoration: none;
        }
        .user-image{
            width: 50px;
            border-radius: 50%;
        }
        .user-c-name{
            font-weight: 520;
            border-bottom: 1px solid #f3f3f3;
            padding-bottom: 6px;
        }
        .checkbox-design{
            padding-top: 10px;
            margin-right: 20px;
        }
        .form-check-input{
            width: 20px;
            height: 20px;
        }
        .teacher-sec{
            border-bottom: 5px solid #f3f3f3;
        }
        #my-file {
         display: none; 
        }
        .selfie-section{
            height: 90px;
            width: 100%;
            border: 1px solid #dddddd;
            background-color: #f3f3f3;
            cursor: pointer;
        }
        .selfie-icon{
            position: absolute;
            left: 50%;
            margin-top: 30px;
            font-size: 30px;
        }
        #bottom-submit{
            position: fixed;
            bottom: 0;
            right: 0px;
            z-index: 999;
            padding:10px;
        }
        p{
            margin-bottom: 0 !important;
        }
        .attendaceSubBut{
            padding-bottom: 60px;
            margin:0.2rem !important;
        }
        .break-word {
            display: block;
        }
        @media screen and (max-width:480px){
            
            .checkbox-designs{
                padding-right: 5px !important;
                padding-left: 3px !important;
            }
        }
    </style>

    <div class="p-2 top-content border-bottom topBackbtnFixed">
         <p class="h6" style="font-weight: 600;"><a href="{{route('user.dashboard')}}"><i class="fa-solid fa-arrow-left" id="icons" style="margin-right: 10px;"></i>Attendance: <?php echo date("d-m-Y") ?></a></p>
    </div>
    
    <form action="{{route('user.attendanceSubmit')}}" method="post" enctype="multipart/form-data" id="myform">
        @csrf
        <div class="p-2 m-2 teacher-sec">
            @if(Session::has('success'))
              <div class="alert {{ Session::get('alert-class', 'alert-success') }}"> 
                {{ Session::get('success') }}
              </div>
             @endif
             @if(Session::has('failed'))
              <div class="alert {{ Session::get('alert-class', 'alert-danger') }}"> 
                {{ Session::get('failed') }}
              </div>
             @endif
             <div class="p-2 m-2 teacher-sec">
                <p class="h6" style="font-weight: 700;">Status</p>
                @error('status')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="d-flex justify-content-start">
                    <p class="ml-4">
                        <input class="form-check-input" id="349" type="radio" name="status" value="0" {{$todayCheckin ? 'disabled' : ''}}/><span class="ml-2"><label for="349">Check-In</label></span>
                    </p>
                    <p style="margin-left: 40px;">
                        <input class="form-check-input" id="350" type="radio" name="status" value="1" {{$todayCheckout ? 'disabled' : ''}} {{$todayCheckin ? '' : 'disabled'}}/><span class="ml-2"><label for="350">Check-Out</label></span>
                    </p>
                    
                </div>
            </div>
            <p class="h6" style="font-weight: 700;">Select Teachers</p>
            <div class="row">
                <input type="hidden" name="schoolId" value="{{$head->schoolId}}">
                @foreach($data as $d)
                <input type="hidden" name="staffId_{{$d->id}}" value="{{$d->id}}">
                <div class="col-12 mt-2">
                    <div class="d-flex justify-content-between user-c-name">
                        <p id="teacher-name">
                            @if($d->photo != '' && file_exists(public_path().'/superadmin/profileImage/'.$d->photo))
                            <img src="{{asset('superadmin/staff/'.$d->photo)}}" class="user-image">
                            @else
                            <img src="{{asset('assets/images/noimage.png')}}" class="user-image">
                            @endif
                            <!-- <img src="{{asset('assets/images/avatars/03.png')}}" class="user-image"> -->
                            <span class="ml-2">{{$d->name}}</span>
                        </p>
                        @php 
                         $today = Carbon::now()->toDateString();
                        $today = App\Models\AttendanceManage::whereDate('created_at', $today)->where('staffId',$d->id)->first();
                        @endphp
                        <p class="checkbox-design">
                            <div class="row">
                                <div class="col-2 checkbox-designs">
                                    <span class="break-word">P</span>
                                    <input type="checkbox" class="checkbox-group" {{isset($today) && $today->p == '1' ? 'checked' : ''}}  data-group="{{$d->id}}" name="p_{{$d->id}}" value="1"> 
                                </div>
                                <div class="col-2 checkbox-designs">
                                    <span class="break-word">A</span>
                                    <input type="checkbox" {{isset($today) && $today->a == '1' ? 'checked' : ''}} class="checkbox-group" data-group="{{$d->id}}" name="a_{{$d->id}}" value="1">
                                </div>
                                <div class="col-2 checkbox-designs">
                                    <span class="break-word">CL</span>
                                    <input type="checkbox" {{isset($today) && $today->cl == '1' ? 'checked' : ''}} class="checkbox-group" data-group="{{$d->id}}" name="cl_{{$d->id}}" value="1">
                                </div>
                                <div class="col-2 checkbox-designs">
                                    <span class="break-word">SL</span>
                                    <input type="checkbox" {{isset($today) && $today->sl == '1' ? 'checked' : ''}} class="checkbox-group" data-group="{{$d->id}}" name="sl_{{$d->id}}" value="1">
                                </div>
                                <div class="col-3 checkbox-designs">
                                    <span class="break-word">EL</span>
                                    <input type="checkbox" {{isset($today) && $today->el == '1' ? 'checked' : ''}} class="checkbox-group" data-group="{{$d->id}}" name="el_{{$d->id}}" value="1">
                                </div>
                            </div>
                             
                        </p>
                        <!-- <p class="checkbox-design">
                            <input class="form-check-input" name="atten[]" type="checkbox" id="inlineCheckbox1" value="{{$d->id}}" />
                        </p> -->
                    </div>
                </div>
                 @endforeach
            </div>
           
        </div>
        
       

        <div class="row m-3 attendaceSubBut">
            <div class="col-12">
                <input type="submit" name="" value="Next" class="btn btn-dark w-100">
            </div>
        </div>
    </form>
@include('user.layout.footernav')    
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <script>
       $('#teacher-name').click(function() {
         $('#inlineCheckbox1').trigger('click');
    });
   </script> -->
<script>
$(document).ready(function(){
    $('.checkbox-group').change(function(){
        var group = $(this).data('group');
        $('.checkbox-group[data-group="' + group + '"]').not(this).prop('checked', false);
    });
});
</script>
@endsection