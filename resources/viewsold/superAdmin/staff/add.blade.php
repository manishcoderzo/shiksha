@extends('superAdmin.layout.app')
@section('title', 'Add')

@section('content')
    <!-- start page content wrapper-->
    <div class="page-content-wrapper">
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
                            <li class="breadcrumb-item active" aria-current="page">Staff</li>
                        </ol>

                    </nav>
                </div>

            </div>
            <!--end breadcrumb-->
            <div class="d-flex justify-content-between">
                <div>
                    <button class="btn btn-primary" onclick="window.location='{{route('superadmin.staffTypeCreate')}}'">Staff Type Add</button>
                </div>
                <div>
                    <button class="btn btn-primary" onclick="window.location='{{route('superadmin.staffList')}}'">List</button>
                </div>
            </div>

            
            <div class="mt-2">
                <div class="card">
                  <div class="card-body">
                    @if(Session::has('success'))
                      <div class="alert {{ Session::get('alert-class', 'alert-success') }}"> 
                        {{ Session::get('success') }}
                      </div>
                     @endif
                    <div class="border p-3 rounded">
                    <h6 class="mb-0 text-uppercase">Staff Create</h6>

                     <hr>
                    <form class="row g-3" action="{{route('superadmin.staffSubmit')}}" method="post">
                        @csrf
                      <div class="col-4">
                        <label class="form-label">Staff Type</label>
                        <select class="form-select mb-3" aria-label="Default select example" name="staffTypeId" id="staffTypeId">
                            <option selected  disabled>Option..</option>
                            @foreach($staffType as $s)
                            <option value="{{$s->id}}">{{$s->type}}</option>
                            @endforeach
                        </select>
                        @error('staffTypeId')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <!-- <input type="text" name="state" class="form-control"> -->
                      </div>

                      
                      <div class="col-4">
                        <label class="form-label">School</label>
                        <select class="form-select mb-3" aria-label="Default select example" name="schoolId" id="schoolId">
                            <option selected  disabled>Option..</option>
                            @foreach($school as $s)
                            <option value="{{$s->id}}">{{$s->schoolName}}</option>
                            @endforeach
                        </select>
                        @error('schoolId')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      
                      </div>
                      <div class="col-4">
                        <label class="form-label">Headmaster</label>
                        <select class="form-select mb-3" aria-label="Default select example" name="headmasterId" id="headmasterId">
                            <!-- <option selected  disabled>Option..</option>
                            @foreach($headmaster as $h)
                            <option value="{{$h->id}}">{{$h->name}}|{{$h->contactNo}}</option>
                            @endforeach -->
                        </select>
                        @error('headmasterId')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <!-- <input type="text" name="state" class="form-control"> -->
                      </div>
                      <div class="col-4">
                        <label class="form-label">State</label>
                        <select class="form-select mb-3" aria-label="Default select example" id="state">
                        </select>
                      </div>
                      <div class="col-4">
                        <label class="form-label">District</label>
                        <select class="form-select mb-3" aria-label="Default select example" id="district">
                        </select>
                      </div>
                      <div class="col-4">
                        <label class="form-label">Block</label>
                        <select class="form-select mb-3" aria-label="Default select example" id="block">
                        </select>
                      </div>
                      <div class="col-4">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" value="{{old('name')}}">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="col-4">
                        <label class="form-label">Contact No</label>
                        <input type="text" name="contactNo" class="form-control" value="{{old('contactNo')}}">
                        @error('contactNo')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="col-4">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="{{old('email')}}">
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      
                      <div class="col-4">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control">
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      
                      <div class="col-12">
                        <div class="d-grid">
                          <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                      </div>
            
                    </form>
                  </div>
                  </div>
                </div>
            </div>
        </div>
        <!-- end page content-->
    </div>
    <!--end page content wrapper-->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    jQuery(document).ready(function() {
        jQuery('#schoolId').change(function(){
            let sid = jQuery(this).val();
            jQuery.ajax({
                url:'/superadmin/headmasterGet',
                method: 'POST',
                data: 'sid='+sid+'&_token={{csrf_token()}}',
                success: function(result){
                    //alert(result);
                    jQuery('#headmasterId').html(result);
                }
            })
        });
    });
    jQuery(document).ready(function() {
        jQuery('#schoolId').change(function(){
            let sid = jQuery(this).val();
            jQuery.ajax({
                url:'/superadmin/schoolGet',
                method: 'POST',
                data: 'sid='+sid+'&_token={{csrf_token()}}',
                success: function(result){
                    //alert(result);
                    jQuery('#state').html(result);
                }
            })
        });
    });
    jQuery(document).ready(function() {
        jQuery('#schoolId').change(function(){
            let sid = jQuery(this).val();
            jQuery.ajax({
                url:'/superadmin/disGet',
                method: 'POST',
                data: 'sid='+sid+'&_token={{csrf_token()}}',
                success: function(result){
                    //alert(result);
                    jQuery('#district').html(result);
                }
            })
        });
    });
    jQuery(document).ready(function() {
        jQuery('#schoolId').change(function(){
            let sid = jQuery(this).val();
            jQuery.ajax({
                url:'/superadmin/bloGet',
                method: 'POST',
                data: 'sid='+sid+'&_token={{csrf_token()}}',
                success: function(result){
                    //alert(result);
                    jQuery('#block').html(result);
                }
            })
        });
    });
</script>

@endsection