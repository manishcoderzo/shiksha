@extends('superAdmin.layout.app')
@section('title', 'Add')

@section('content')
<style type="text/css">
    .circle{
        height: 100px;
        width: 100px;
        border-radius: 50%;
        border: 2px solid rgba(221, 221, 221, 0.5);
        position: absolute;
        left:50%;
        top:12%;
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
    @media screen and (min-width: 767px){
    	.side-margin{
    		margin-left: 16%;
    		margin-right: 16%;
    		background-color: white;
    	}
    }
</style>
    <!-- start page content wrapper-->
    <div class="page-content-wrapper" style="background-color:rgba(221, 221, 221, 0.5);">
        <!-- start page content-->
        <div class="page-content">

            <!--start breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Dashboard</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0 align-items-center">
                            <li class="breadcrumb-item"><a href="javascript:;">
                                    <ion-icon name="home-outline"></ion-icon>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Profile Update</li>
                        </ol>

                    </nav>
                </div>

            </div>
            <!--end breadcrumb-->
            <div class="row" style="background-color:rgba(221, 221, 221, 0.5);height: 150px;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                <div class="col-md-12 dd">
                    <div class="">
                        <div class="circle">
                            @if(auth('web')->user()->photo != '' && file_exists(public_path().'/superadmin/profileImage/'.auth('web')->user()->photo))
                            <img src="{{asset('superadmin/profileImage/'.auth('web')->user()->photo)}}" class="circle-image">
                            @else
                            <img src="{{asset('assets/images/noimage.png')}}" class="circle-image">
                            @endif
                            <!-- <img src="{{asset('admin/governingbody/some1709636709.jpg')}}" class="circle-image"> -->
                        </div>
                    </div>
                </div>
            </div>
           
            <div class="mt-2 side-margin">
            	
                <div class="">
                  <div class="card-body" style="margin-top:50px;">
                    @if(Session::has('success'))
                      <div class="alert {{ Session::get('alert-class', 'alert-success') }}"> 
                        {{ Session::get('success') }}
                      </div>
                     @endif
                     <div style="background-color:#002147;color: white;padding: 12px;">
            			<h6 class="text-uppercase">Basic Information</h6>
            	    </div>
                    <div class="border p-3 rounded">
                    
                    <!-- add start -->
                    <form action="{{route('profileUpdate')}}" method="post" enctype="multipart/form-data">
                        @csrf
	                    <div class="row" style="margin-top:3%">
                            <input type="hidden" name="id" value="{{auth('web')->user()->id}}">
	                    	<div class="col-sm-3">
	                            <h6>First Name:</h6>
	                         </div>
	                         <div class="col-sm-9">
	                             <input type="text" name="fname" class="form-control"  value="{{auth('web')->user()->fname}}">
	                            @error('fname')
	                                <div class="alert alert-danger">{{ $message }}</div>
	                            @enderror
	                         </div>
	                         <div class="col-sm-3 mt-2">
	                            <h6>Last Name:</h6>
	                         </div>
	                         <div class="col-sm-9 mt-2">
	                             <input type="text" name="lname" class="form-control"  value="{{auth('web')->user()->lname}}">
	                            @error('lname')
	                                <div class="alert alert-danger">{{ $message }}</div>
	                            @enderror
	                         </div>
                             <div class="col-sm-3 mt-2">
                                <h6>Phone No:</h6>
                             </div>
                             <div class="col-sm-9 mt-2">
                                 <input type="text" name="phone" class="form-control"  value="{{auth('web')->user()->phone}}">
                                @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                             </div>
                             <div class="col-sm-3 mt-2">
                                <h6>Email:</h6>
                             </div>
                             <div class="col-sm-9 mt-2">
                                 <input type="text" name="email" class="form-control"  value="{{auth('web')->user()->email}}">
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                             </div>
                             <div class="col-sm-3 mt-2">
                                <h6>Photo:</h6>
                             </div>
                             <div class="col-sm-9 mt-2">
                                 <input type="file" name="photo" class="form-control"  value="">
                                @error('photo')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                             </div>
                             <div class="col-sm-3 mt-2">
                                <input type="submit" class="btn btn-success" value="Update">
                             </div>
	                    </div>
                	</form>

                    <!-- add end -->

                  </div>
                      
                  </div>
                </div>

            </div>
            <div class="mt-2 side-margin">
                <div class="card-body" style="margin-top:50px;margin-bottom: 20px;padding-bottom: 20px;">
                  <div style="background-color:#002147;color: white;padding: 12px;">
                    <h6 class="text-uppercase">Password Change</h6>
                   </div>
                   <form action="{{route('changePassword')}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="row" style="margin-top:3%;padding:0  20px;">
                            <input type="hidden" name="id" value="{{auth('web')->user()->id}}">
                            <div class="col-sm-3 mt-2">
                                <h6>New Password:</h6>
                             </div>
                             <div class="col-sm-9 mt-2">
                                 <input type="password" name="password" class="form-control"  value="">
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                             </div>
                             <div class="col-sm-3 mt-2">
                                <h6>Confirm Password:</h6>
                             </div>
                             <div class="col-sm-9 mt-2">
                                 <input type="text" name="con_password" class="form-control"  value="">
                                @error('con_password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                             </div>
                             <div class="col-sm-3 mt-2">
                                <input type="submit" class="btn btn-success" value="Update">
                             </div>
                        </div>
                   </form>
                </div>
            </div>
        </div>
        <!-- end page content-->
    </div>
    <!--end page content wrapper-->
  

@endsection