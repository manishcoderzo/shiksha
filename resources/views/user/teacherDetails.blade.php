@extends('user.layout.app')
@section('content')
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
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
.circle{
        height: 100px;
        width: 100px;
        border-radius: 50%;
        border: 2px solid rgba(221, 221, 221, 0.5);
        position: absolute;
        left: 35%;
        top: 49%;
        padding:3px;
        background-color: white;
        cursor: pointer;
    }
    .circle:hover{
        border: 2px solid powderblue;
    }
    .circle-image{
        height: 90px;
        width: 90px;
        border-radius: 50%;
    }
    .dd{
        background-image:url({{url('assets/images/pngtree.jpg')}});
        height:100px
    }
    .side-margin{
        margin:10px;
    }
    @media screen and (min-width:730px){
        .side-margin-large{
            margin-left: 20%;
            margin-right: 20%;
        }
    }
</style>
<div class="p-2 m-2 border-bottom d-flex justify-content-between">
     <p class="h6"><a href="{{route('user.dashboard')}}" style="color: black;"><i class="fa-solid fa-less-than" style="margin-right: 10px;"></i>
        <span class="ml-2">Teacher Details</span></a></p>
     <!-- <a href="{{route('user.headmasterlogout')}}">logout</a> -->
</div> 
<div class="p-2 m-2">
    <div class="row" style="background-color:rgba(221, 221, 221, 0.5);height: 150px;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                <div class="col-md-12 dd">
                    <div class="">
                        <div class="circle">
                            @if($data->photo != '' && file_exists(public_path().'/superadmin/staff/'.$data->photo))
                            <img src="{{asset('superAdmin/staff/'.$data->selfie)}}" class="circle-image">
                            @else
                            <img src="{{asset('assets/images/noimage.png')}}" class="circle-image">
                            @endif
                            <!-- <img src="{{asset('admin/governingbody/some1709636709.jpg')}}" class="circle-image"> -->
                        </div>
                    </div>
                </div>
            </div>
    <div class="side-margin">
        @if(Session::has('success'))
          <div class="alert {{ Session::get('alert-class', 'alert-success') }}"> 
            {{ Session::get('success') }}
          </div>
         @endif
         
                        <div class="row side-margin-large" style="margin-top:3%">
                            <div class="col-sm-3 mt-2">
                                <h6>Teacher ID:</h6>
                             </div>
                             <div class="col-sm-9 mt-2">
                                 <input type="text" name="teacherId" class="form-control"  value="{{$data->teacherId}}" disabled>
                                @error('teacherId')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                             </div>
                            <div class="col-sm-3 mt-2">
                                <h6>Name:</h6>
                             </div>
                             <div class="col-sm-9 mt-2">
                                 <input type="text" name="fname" class="form-control"  value="{{$data->name}}" disabled>
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                             </div>
                             
                             <div class="col-sm-3 mt-2">
                                <h6>Phone No:</h6>
                             </div>
                             <div class="col-sm-9 mt-2">
                                 <input type="text" name="phone" class="form-control"  value="{{$data->contactNo}}" disabled>
                                @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                             </div>
                             <div class="col-sm-3 mt-2">
                                <h6>Email:</h6>
                             </div>
                             <div class="col-sm-9 mt-2">
                                 <input type="text" name="email" class="form-control"  value="{{$data->email}}" disabled>
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                             </div>
                             <div class="col-sm-3 mt-2">
                                <h6>School Name:</h6>
                             </div>
                             <div class="col-sm-9 mt-2">
                                 <input type="text" name="email" class="form-control"  value="{{$data->schoolList->schoolName}}" disabled>
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                             </div>
                             <div class="col-sm-3 mt-2">
                                <h6>School Address:</h6>
                             </div>
                             <div class="col-sm-9 mt-2">
                                 <input type="text" name="email" class="form-control"  value="{{$data->schoolList->address}}" disabled>
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                             </div>
                             <div class="col-sm-3 mt-2">
                                <h6>Roll No.:</h6>
                             </div>
                             <div class="col-sm-9 mt-2">
                                 <input type="text" name="email" class="form-control"  value="{{$data->roll}}" disabled>
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                             </div>
                             <div class="col-sm-3 mt-2">
                                <h6>Gender:</h6>
                             </div>
                             <div class="col-sm-9 mt-2">
                                 <input type="text" name="email" class="form-control"  value="{{$data->gender}}" disabled>
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                             </div>
                             <div class="col-sm-3 mt-2">
                                <h6>Category:</h6>
                             </div>
                             <div class="col-sm-9 mt-2">
                                 <input type="text" name="category" class="form-control"  value="{{$data->category}}" disabled>
                                @error('category')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                             </div>
                             
                             <div class="col-sm-3 mt-2">
                                <h6>Class:</h6>
                             </div>
                             <div class="col-sm-9 mt-2">
                                 <input type="text" name="teacherId" class="form-control"  value="{{$data->class}}" disabled>
                                @error('class')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                             </div>
                             <div class="col-sm-3 mt-2">
                                <h6>Subject:</h6>
                             </div>
                             <div class="col-sm-9 mt-2">
                                 <input type="text" name="teacherId" class="form-control"  value="{{$data->subject}}" disabled>
                                @error('subject')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                             </div>
                             <div class="col-sm-3 mt-2">
                                <h6>U-DISK Code:</h6>
                             </div>
                             <div class="col-sm-9 mt-2" style="margin-bottom: 40px;">
                                 <input type="text" name="teacherId" class="form-control"  value="{{$data->uDiskCode}}" disabled>
                                @error('subject')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                             </div>
                             
                             
                        </div>
                   
        <!-- <div class="col-12">
            <p class="user-c-name"><a href="#" class="link"><i class="fa-solid fa-user bg-primary" id="icons" style="font-size: 18px;"></i><span class="ml-2">Profile</span></a></p>
        </div> -->
    </div>
</div>

@include('user.layout.footernav')

@endsection