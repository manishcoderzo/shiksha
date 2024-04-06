@extends('user.layout.app')
@section('content')
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}
.bell-icon{
    background-color: #f3f3f3;
    border-radius: 50%;
    padding:5px;
}
.icon-badge{
    height: 8px;
    width: 8px;
    border-radius: 50%;
    background-color: red;
    color: red;
    font-size: 10px;
    border:1px solid red;
    position: absolute;
    right: 15px;
}
.user-image{
    width: 50px;
    border-radius: 50%;
}
.user-c-name{
    font-weight: 500;
    border-bottom: 1px solid #f3f3f3;
    padding-bottom: 6px;
}
.user-c-name #icons{
/*    background-color: red;*/
    border-radius: 50%;
    padding:10px;
    color: white;
}
.user-c-name .link{
    text-decoration: none;
    color: black;
}
</style>


<div class="p-2 m-2 border-bottom d-flex justify-content-between">
    @if (auth('headmasters')->user())
     <p class="h6">
        @if(auth('headmasters')->user()->photo != '' && file_exists(public_path().'/superadmin/headmaster/'.auth('headmasters')->user()->photo))
        <img src="{{asset('superadmin/headmaster/'.auth('headmasters')->user()->photo)}}" class="user-image">
        @else
        <img src="{{asset('assets/images/noimage.png')}}" class="user-image">
        @endif
        <span class="ml-2">{{auth('headmasters')->user()->name}}</span></p>
    @endif
     <!-- <a href="{{route('user.headmasterlogout')}}">logout</a> -->
</div> 
<div class="p-2 m-2">
    <div class="row">
        <div class="col-12">
            <p class="user-c-name"><a href="{{route('user.headmasterProfile')}}" class="link"><i class="fa-solid fa-user bg-primary" id="icons" style="font-size: 18px;"></i><span class="ml-2">Profile</span></a></p>
        </div>
        <div class="col-12">
            <p class="user-c-name"><a href="{{route('user.attendanceReport')}}" class="link"><i class="fa-solid fa-clipboard-user bg-success" id="icons" style="font-size: 18px;"></i><span class="ml-2">Reports</span></a></p>

        </div>
        <div class="col-12">
            <p class="user-c-name"><a href="{{route('user.headmasterlogout')}}" class="link"><i class="fa-solid fa-arrow-right bg-danger" id="icons" style="font-size: 18px;"></i><span class="ml-2">Logout</span></a></p>
        </div>
    </div>
</div>

@include('user.layout.footernav')

@endsection
