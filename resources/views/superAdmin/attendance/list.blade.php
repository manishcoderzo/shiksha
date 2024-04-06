@extends('superAdmin.layout.app')
@section('title', 'List')

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
                            <li class="breadcrumb-item active" aria-current="page">Attendance</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
           
            <form method="get">
            <div class="row">
                <div class="col-lg-3">
                        <label class="form-label">State</label>
                        <select class="form-select mb-3" aria-label="Default select example" id="state" name="state">
                            <option selected  disabled>Option..</option>
                            @foreach($state as $s)
                            <option value="{{$s->state_id}}">{{$s->state_title}}</option>
                            @endforeach
                        </select>
                        <!-- <input type="text" name="state" class="form-control"> -->
                      </div>
                      <div class="col-lg-3">
                        <label class="form-label">District</label>
                        <select class="form-select mb-3" aria-label="Default select example" id="district" name="district">
                            
                        </select>
                        <!-- <input type="text" name="district" class="form-control"> -->
                      </div>
                      <div class="col-lg-3">
                        <label class="form-label">Block</label>
                        <select class="form-select mb-3" aria-label="Default select example" id="block" name="block">
                            
                        </select>
                        <!-- <input type="text" name="block" class="form-control"> -->
                      </div>
                    <div class="col-lg-3">
                        <p>School</p>
                        <select class="form-select" id="schoolId" name="schoolId">
                            
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <p>Headmaster</p>
                        <select class="form-select" id="headmasterId" name="headmasterId">
                            
                        </select>
                    </div>
                    <!-- <div class="col-lg-3">
                        <p>Date</p>
                        <input type="date" name="date" class="form-control">
                    </div> -->
                    <div class="col-lg-3">
                        <p>From Date:</p>
                        <input type="date" name="fromdate" class="form-control"  value="">
                     </div>
                     <div class="col-lg-3">
                         <p>To Date:</p>
                        <input type="date" name="todate" class="form-control"  value="">
                     </div>
                    <div class="col-3">
                        <br><button type="submit" class="btn btn-success mt-3">Filter</button>
                    </div>
                
            </div><br/>
            </form>

            <div class="card radius-10 w-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h6 class="mb-0">Attendance List</h6>
                        <div class="fs-5 ms-auto dropdown">
                            <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots"></i></div>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="table-responsive mt-2">
                        <div style="text-align: right;">
                        Search:<input type="text" id="myInput" onkeyup="searchTable()" placeholder="Search for Any.." class="ml-4">
                        </div>
                        <table class="table align-middle mb-0" id="myTable">
                            <thead class="table-light">
                                <tr>
                                    <th>SNo.</th>
                                    <th>Date</th>
                                    <th>School Name</th>
                                    <th>Headmaster Name</th>
                                    <th>Selfie</th>
                                    <th>Register</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach($data as $key=>$d)
                                <tr>
                                    <td>{{$key++ +1}}</td>
                                    <td>{{$d->created_at->format('d/m/Y')}}</td>
                                    <td>{{$d->schoolList->schoolName}}</td>
                                    <td>{{$d->headmasterList->name}}</td>
                                    <td><img src="{{asset('superAdmin/selfie/'.$d->selfie)}}" style="width: 100px;height: 100px;"></td>
                                    <td><img src="{{asset('superAdmin/attendanceImage/'.$d->registerImage)}}" style="width: 100px;height: 100px;"></td>
                                    <td>
                                        @if($d->status == '1')
                                        <span class="badge bg-success">Checkout</span></td>
                                        @elseif($d->status == '0')
                                        <span class="badge bg-primary">checkin</span></td>
                                        @endif
                                    <td>
                                        <div class="d-flex align-items-center gap-3 fs-6">
                                            <a href="{{route('superadmin.attendanceManageList',[$d->id])}}" class="text-primary" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" title=""
                                                data-bs-original-title="View detail" aria-label="Views">
                                                <ion-icon name="eye-outline"></ion-icon>
                                            </a>
                                            <!-- <a href="{{route('superadmin.headmasterEdit',[$d->id])}}" class="text-warning" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" title=""
                                                data-bs-original-title="Edit info" aria-label="Edit">
                                                <ion-icon name="pencil-outline"></ion-icon>
                                            </a>
                                            <a href="{{route('superadmin.headmasterdelete',[$d->id])}}" class="text-danger" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" title="" data-bs-original-title="Delete"
                                                aria-label="Delete" onclick="return confirm('Are you sure ?')">
                                                <ion-icon name="trash-outline"></ion-icon>
                                            </a>-->
                                        </div>
                                        </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page content-->
    </div>
    <!--end page content wrapper-->
    <script>
    function searchTable() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td");
            for (var j = 0; j < td.length; j++) {
                if (td[j]) {
                    txtValue = td[j].textContent || td[j].innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                        break; // Break out of inner loop since match found
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    }
</script>
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
    jQuery(document).ready(function() {
        jQuery('#block').change(function(){
            let did = jQuery(this).val();
            jQuery.ajax({
                url:'/schoolGet',
                method: 'POST',
                data: 'did='+did+'&_token={{csrf_token()}}',
                success: function(result){
                    jQuery('#schoolId').html(result);
                    // alert(result)
                    // $("#title").html(result);
                }
            })
        });
    });
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
</script>
@endsection