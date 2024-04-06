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
                        <label class="form-label">School</label>
                        <select class="select mb-3" aria-label="Default select example" name="schoolId" id="schoolId">
                            <option value="">Option..</option>
                            @foreach($school as $s)
                            <option value="{{$s->id}}" {{ $data->schoolId == $s->id ? 'selected' : ''}}>{{$s->schoolName}}</option>
                            @endforeach
                        </select>
                        @error('schoolId')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      
                      </div>
                      
                      <div class="col-4">
                        <label class="form-label">Roll No.</label>
                        <input type="text" name="roll" class="form-control" value="{{$data->roll}}">
                        @error('roll')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="col-4">
                        <label class="form-label">Name Of Candidate</label>
                        <input type="text" name="name" class="form-control" value="{{$data->name}}">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="col-4">
                        <label class="form-label">Gender</label>
                        <select class="form-select mb-3" aria-label="Default select example" name="gender" id="gender">
                            <option selected  disabled>Option..</option>
                            <option value="male" {{ $data->gender == 'male' ? 'selected' : ''}}>Male</option>
                            <option value="female" {{ $data->gender == 'female' ? 'selected' : ''}}>female</option>
                            <option value="transgender" {{ $data->gender == 'transgender' ? 'selected' : ''}}>Transgender</option>
                        </select>
                        @error('gender')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="col-4">
                        <label class="form-label">Category</label>
                        <input type="text" name="category" class="form-control" value="{{$data->category}}">
                        @error('category')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="col-4">
                        <label class="form-label">Teacher ID</label>
                        <input type="text" name="teacherId" class="form-control" value="{{$data->teacherId}}">
                        @error('teacherId')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="col-4">
                        <label class="form-label">Aadhar No.</label>
                        <input type="text" name="aadharNo" class="form-control" value="{{$data->aadharNo}}">
                        @error('aadharNo')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      
                      <div class="col-4">
                        <label class="form-label">Class</label>
                        <select class="form-select mb-3" aria-label="Default select example" name="class" id="class">
                            <option selected  disabled>Option..</option>
                            <option value="1to5" {{ $data->class == '1to5' ? 'selected' : ''}}>1 TO 5</option>
                            <option value="6to8" {{ $data->class == '6to8' ? 'selected' : ''}}>6 TO 8</option>
                            <option value="9to10" {{ $data->class == '9to10' ? 'selected' : ''}}>9 TO 10</option>
                            <option value="11to12" {{ $data->class == '11to12' ? 'selected' : ''}}>11 TO 12</option>
                        </select>
                        @error('class')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="col-4">
                        <label class="form-label">Subject</label>
                        <select class="form-select mb-3" aria-label="Default select example" name="subject" id="subject">
                            <option selected  disabled>Option..</option>
                            <option value="businessStudies" {{ $data->subject == 'businessStudies' ? 'selected' : ''}}>Business Studis</option>
                            <option value="history" {{ $data->subject == 'history' ? 'selected' : ''}}>History</option>
                        </select>
                        @error('subject')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="col-4">
                        <label class="form-label">U-DISH Code</label>
                        <input type="text" name="uDiskCode" class="form-control" value="{{$data->uDiskCode}}">
                        @error('uDiskCode')
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