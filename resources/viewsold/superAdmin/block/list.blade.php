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
                            <li class="breadcrumb-item active" aria-current="page">Block</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="d-flex justify-content-end">
                <button class="btn btn-primary" onclick="window.location='{{route('blockCreate')}}'">Add</button>
            </div>

            <div class="card radius-10 w-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h6 class="mb-0">Block List</h6>
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
                        <table class="table align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>SNo.</th>
                                    <th>Block</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach($data as $key=>$d)
                                <tr>
                                    <td>{{$key++ +1}}</td>
                                    <td>{{$d->blockName}}</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3 fs-6">
                                            <!-- <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" title=""
                                                data-bs-original-title="View detail" aria-label="Views">
                                                <ion-icon name="eye-outline"></ion-icon>
                                            </a> -->
                                            <a href="{{route('blockEdit',[$d->id])}}" class="text-warning" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" title=""
                                                data-bs-original-title="Edit info" aria-label="Edit">
                                                <ion-icon name="pencil-outline"></ion-icon>
                                            </a>
                                            <!-- <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" title="" data-bs-original-title="Delete"
                                                aria-label="Delete">
                                                <ion-icon name="trash-outline"></ion-icon>
                                            </a> -->
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
@endsection