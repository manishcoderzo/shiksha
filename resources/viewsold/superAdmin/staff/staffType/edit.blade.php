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
                            <li class="breadcrumb-item active" aria-current="page">Staff Type</li>
                        </ol>

                    </nav>
                </div>

            </div>
            <!--end breadcrumb-->
            <div class="d-flex justify-content-between">
                
                <div>
                    <button class="btn btn-primary" onclick="window.location='{{route('superadmin.staffCreate')}}'">Staff Add</button>
                </div>
                <div>
                    <button class="btn btn-primary" onclick="window.location='{{route('superadmin.staffTypeList')}}'">Staff Type List</button>
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
                    <h6 class="mb-0 text-uppercase">Staff Type Update</h6>

                     <hr>
                    <form class="row g-3" action="{{route('superadmin.staffTypeUpdate',[$data->id])}}" method="post">
                        @csrf
                      <div class="col-4">
                        <label class="form-label">Type</label>
                        <input type="text" name="type" class="form-control" value="{{$data->type}}">
                        @error('type')
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