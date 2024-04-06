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
                            <li class="breadcrumb-item active" aria-current="page">Staff</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="d-flex justify-content-end">
                <button class="btn btn-primary" onclick="window.location='{{route('superadmin.staffCreate')}}'">Add</button>
            </div>
            <form method="get">
            <div class="row">
                    <div class="col-lg-4">
                        <p>Type</p>
                        <select class="form-select" id="type" name="type">
                            <option selected disabled>Select</option>
                            @foreach($staffType as $s)
                            <option value="{{$s->id}}">{{$s->type}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <p>School</p>
                        <select class="form-select" id="title" name="school">
                            <option selected disabled>Select</option>
                            @foreach($school as $s)
                            <option value="{{$s->id}}">{{$s->schoolName}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-4">
                        <br><button type="submit" class="btn btn-success mt-3">Filter</button>
                    </div>
                
            </div><br/>
            </form>
            <div class="card radius-10 w-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h6 class="mb-0">Staff List<sup>({{$data->count()}})</sup></h6>
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
                                    <th>Type</th>
                                    <th>Name</th>
                                    <th>Contact No</th>
                                    <th>Email</th>
                                    <th>School</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach($data as $key=>$d)
                                <tr>
                                    <td>{{$key++ +1}}</td>
                                    <td>{{$d->staffTypeList->type}}</td>
                                    <td>{{$d->name}}</td>
                                    <td>{{$d->contactNo}}</td>
                                    <td>{{$d->email}}</td>
                                    <td>{{$d->schoolList->schoolName}}</td>
                                    <td>
                                        @if($d->status == '1')
                                        <span class="badge bg-success">Active</span>
                                        @else
                                        <span class="badge bg-danger">Deactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3 fs-6">
                                            <!-- <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" title=""
                                                data-bs-original-title="View detail" aria-label="Views">
                                                <ion-icon name="eye-outline"></ion-icon>
                                            </a> -->
                                            <a href="{{route('superadmin.staffEdit',[$d->id])}}" class="text-warning" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" title=""
                                                data-bs-original-title="Edit info" aria-label="Edit">
                                                <ion-icon name="pencil-outline"></ion-icon>
                                            </a>
                                            <a href="{{route('superadmin.staffdelete',[$d->id])}}" class="text-danger" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" title="" data-bs-original-title="Delete"
                                                aria-label="Delete" onclick="return confirm('Are you sure ?')">
                                                <ion-icon name="trash-outline"></ion-icon>
                                            </a>
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
@endsection