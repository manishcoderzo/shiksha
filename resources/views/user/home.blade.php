@extends('user.layout.app')
@section('content')
<div class="p-2 m-2 border-bottom d-flex justify-content-between">
     <p class="h6" style="font-weight: 500;"><a href="{{route('user.dashboard')}}" style="color:black;"><i class="fa-solid fa-less-than" style="margin-right: 10px;"></i>Dashboard</a></p>
     <p class="h6 bell-icon"><i class="fa-regular fa-bell"></i></p>
     <span class="icon-badge"></span>
</div> 
<div class="p-2 m-2">
    <p class="h6" style="font-weight: 700;">Teachers ({{$data->count()}})</p>
    <div class="row">
        @foreach($data as $d)
        <div class="col-lg-3 col-md-4 col-12 mb-4">
            <p class="user-c-name">
                <a href="{{route('user.teacherDetails',[$d->id])}}" style="color:black;text-decoration: none;"> 
                @if($d->photo != '' && file_exists(public_path().'/superadmin/staff/'.$d->photo))
                <img src="{{asset('superadmin/staff/'.$d->photo)}}" class="user-image">
                @else
                <img src="{{asset('assets/images/noimage.png')}}" class="user-image">
                @endif
                <!-- <img src="{{asset('assets/images/avatars/03.png')}}" class="user-image"> -->
                <span class="ml-2">{{$d->name}}</span></a></p>
        </div>
        @endforeach
        <!-- <div class="col-12">
            <p class="user-c-name"><img src="{{asset('assets/images/avatars/01.png')}}" class="user-image"><span class="ml-2">Bageshar Kumar</span></p>
        </div>
        <div class="col-12">
            <p class="user-c-name"><img src="{{asset('assets/images/avatars/02.png')}}" class="user-image"><span class="ml-2">Ronak Kumar</span></p>
        </div>
        <div class="col-12">
            <p class="user-c-name"><img src="{{asset('assets/images/avatars/04.png')}}" class="user-image"><span class="ml-2">anant singh</span></p>
        </div>
        <div class="col-12">
            <p class="user-c-name"><img src="{{asset('assets/images/avatars/05.png')}}" class="user-image"><span class="ml-2">Sohan Kumar</span></p>
        </div>
        <div class="col-12">
            <p class="user-c-name"><img src="{{asset('assets/images/avatars/04.png')}}" class="user-image"><span class="ml-2">Sohan Kumar</span></p>
        </div>
        <div class="col-12">
            <p class="user-c-name"><img src="{{asset('assets/images/avatars/02.png')}}" class="user-image"><span class="ml-2">Sohan Kumar</span></p>
        </div> -->
    </div>
</div>
@include('user.layout.footernav')


@endsection
