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
            <div class="d-flex justify-content-end">
                <button class="btn btn-primary" onclick="window.location='{{route('superadmin.staffList')}}'">List</button>
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
                    <h6 class="mb-0 text-uppercase">Staff Edit</h6>

                     <hr>
                    <form class="row g-3" action="{{route('superadmin.staffUpdate',[$data->id])}}" method="post">
                        @csrf
                        <div class="col-4">
                        <label class="form-label">Staff Type</label>
                        <select class="form-select mb-3" aria-label="Default select example" name="staffTypeId" id="staffTypeId">
                            <option selected  disabled>Option..</option>
                            @foreach($staffType as $s)
                            <option value="{{$s->id}}" {{ $data->staffTypeId == $s->id ? 'selected' : ''}}>{{$s->type}}</option>
                            @endforeach
                        </select>
                        @error('staffTypeId')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <!-- <input type="text" name="state" class="form-control"> -->
                      </div>
                      <div class="col-4">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" value="{{$data->name}}">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="col-4">
                        <label class="form-label">Contact No</label>
                        <input type="text" name="contactNo" class="form-control" value="{{$data->contactNo}}">
                        @error('contactNo')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="col-4">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="{{$data->email}}">
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      
                      <div class="col-4">
                        <label class="form-label">School</label>
                        <select class="form-select mb-3" aria-label="Default select example" name="schoolId">
                            <option selected  disabled>Option..</option>
                            @foreach($school as $s)
                            <option value="{{$s->id}}" {{ $data->schoolId == $s->id ? 'selected' : ''}}>{{$s->schoolName}}</option>
                            @endforeach
                        </select>
                        @error('schoolId')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <!-- <input type="text" name="state" class="form-control"> -->
                      </div>
                      <div class="col-4">
                        <label class="form-label">Password(optional)</label>
                        <input type="password" name="password" class="form-control">
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="col-4">
                        <label class="form-label">Status</label>
                        <select class="form-select" id="status" name="status">
                          <option {{ $data->status == '1' ? 'selected' : ''}} value="1">Active</option>
                          <option {{ $data->status == '0' ? 'selected' : ''}} value="0">Deactive</option>
                        </select>
                        @error('status')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      
                      <div class="col-12">
                        <div class="d-grid">
                          <button type="submit" class="btn btn-primary">Update</button>
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

@endsection