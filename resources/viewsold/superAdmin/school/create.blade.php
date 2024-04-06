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
                            <li class="breadcrumb-item active" aria-current="page">Schools</li>
                        </ol>

                    </nav>
                </div>

            </div>
            <!--end breadcrumb-->
            <div class="d-flex justify-content-end">
                <button class="btn btn-primary" onclick="window.location='{{route('superadmin.schoolList')}}'">List</button>
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
                    <h6 class="mb-0 text-uppercase">School Create</h6>

                     <hr>
                    <form class="row g-3" action="{{route('superadmin.schoolSubmit')}}" method="post">
                        @csrf
                      <div class="col-12">
                        <label class="form-label">School Name</label>
                        <input type="text" name="schoolName" class="form-control">
                      </div>
                      <div class="col-12">
                        <label class="form-label">Address</label>
                        <input type="text" name="address" class="form-control">
                      </div>
                      
                      <div class="col-4">
                        <label class="form-label">State</label>
                        <select class="form-select mb-3" aria-label="Default select example" id="state" name="state">
                            <option selected  disabled>Option..</option>
                            @foreach($state as $s)
                            <option value="{{$s->state_id}}">{{$s->state_title}}</option>
                            @endforeach
                        </select>
                        <!-- <input type="text" name="state" class="form-control"> -->
                      </div>
                      <div class="col-4">
                        <label class="form-label">District</label>
                        <select class="form-select mb-3" aria-label="Default select example" id="district" name="district">
                            
                        </select>
                        <!-- <input type="text" name="district" class="form-control"> -->
                      </div>
                      <div class="col-4">
                        <label class="form-label">Block</label>
                        <select class="form-select mb-3" aria-label="Default select example" id="block" name="block">
                            
                        </select>
                        <!-- <input type="text" name="block" class="form-control"> -->
                      </div>
                      <div class="col-4">
                        <label class="form-label">Latitude</label>
                        <input type="text" name="latitude" class="form-control">
                      </div>
                      <div class="col-4">
                        <label class="form-label">Longitude</label>
                        <input type="text" name="longitude" class="form-control">
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
        jQuery('#state').change(function(){
            let sid = jQuery(this).val();
            jQuery('#block').html('<option selected  disabled>Option..</option>');
            jQuery.ajax({
                url:'/districtGet',
                method: 'POST',
                data: 'sid='+sid+'&_token={{csrf_token()}}',
                success: function(result){
                    jQuery('#district').html(result);
                    // alert(result)
                    // $("#title").html(result);
                }
            })
        });
    });

    jQuery(document).ready(function() {
        jQuery('#district').change(function(){
            let did = jQuery(this).val();
            jQuery.ajax({
                url:'/blockGet',
                method: 'POST',
                data: 'did='+did+'&_token={{csrf_token()}}',
                success: function(result){
                    jQuery('#block').html(result);
                    // alert(result)
                    // $("#title").html(result);
                }
            })
        });
    });
</script>
@endsection