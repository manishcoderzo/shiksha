@extends('layout.app')
@section('title', 'Forms Layouts')

@section('content')
    <!-- start page content wrapper-->
    <div class="page-content-wrapper">
        <!-- start page content-->
       <div class="page-content">

        <!--start breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
          <div class="breadcrumb-title pe-3">Forms</div>
          <div class="ps-3">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb mb-0 p-0 align-items-center">
                <li class="breadcrumb-item"><a href="javascript:;"><ion-icon name="home-outline"></ion-icon></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Form Layouts</li>
              </ol>
            </nav>
          </div>
          <div class="ms-auto">
            <div class="btn-group">
              <button type="button" class="btn btn-outline-primary">Settings</button>
              <button type="button" class="btn btn-outline-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
              </button>
              <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
                <a class="dropdown-item" href="javascript:;">Another action</a>
                <a class="dropdown-item" href="javascript:;">Something else here</a>
                <div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
              </div>
            </div>
          </div>
        </div>
        <!--end breadcrumb-->


        <div class="row">
          <div class="col-xl-8 mx-auto">
          
            <div class="card">
              <div class="card-body">
                <div class="border p-3 rounded">
                <h6 class="mb-0 text-uppercase">Basic Form</h6>
                <hr>
                <form class="row g-3">
                  <div class="col-12">
                    <label class="form-label">Email ID</label>
                    <input type="text" class="form-control">
                  </div>
                  <div class="col-12">
                    <label class="form-label">Password</label>
                    <input type="text" class="form-control">
                  </div>
                  <div class="col-6">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="gridCheck1">
                      <label class="form-check-label" for="gridCheck1">
                        Check me out
                      </label>
                    </div>
                  </div>
                  <div class="col-6 text-end">
                    <a href="javascript:;">Forgot Password?</a>
                  </div>
                  <div class="col-12">
                    <div class="d-grid">
                      <button type="submit" class="btn btn-primary">Sign in</button>
                    </div>
                  </div>
                </form>
              </div>
              </div>
            </div>

            
            <div class="card">
              <div class="card-body">
                <div class="border p-3 rounded">
                <h6 class="mb-0 text-uppercase">Login form</h6>
                 <hr>
                <form class="row g-3">
                  <div class="col-12">
                    <label class="form-label">Email ID</label>
                    <input type="text" class="form-control">
                  </div>
                  <div class="col-12">
                    <label class="form-label">Password</label>
                    <input type="text" class="form-control">
                  </div>
                  <div class="col-6">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="gridCheck2">
                      <label class="form-check-label" for="gridCheck2">
                        Check me out
                      </label>
                    </div>
                  </div>
                  <div class="col-6 text-end">
                    <a href="javascript:;">Forgot Password?</a>
                  </div>
                  <div class="col-12">
                    <div class="d-grid">
                      <button type="submit" class="btn btn-primary">Sign in</button>
                    </div>
                  </div>
                  <div class="col-12 text-center">
                    <p class="mb-0">Not a member? <a href="javascript:;">Register</a></p>
                  </div>
                  <div class="col-12 text-center">
                    <p class="mb-0">or sign up with:</p>
                  </div>
                  <div class="col-12 text-center">
                    <div class="error-social d-flex align-items-center justify-content-center gap-2">
                      <a href="javascript:;" class="bg-facebook"><i class="bx bxl-facebook"></i></a>
                      <a href="javascript:;" class="bg-twitter"><i class="bx bxl-twitter"></i></a>
                      <a href="javascript:;" class="bg-google"><i class="bx bxl-google"></i></a>
                      <a href="javascript:;" class="bg-linkedin"><i class="bx bxl-linkedin"></i></a>
                    </div>
                  </div>
                </form>
              </div>
              </div>
            </div>

            <div class="card">
              <div class="card-body">
                <div class="border p-3 rounded">
                <h6 class="mb-0 text-uppercase">Register form</h6>
                 <hr>
                <form class="row g-3">
                  <div class="col-6">
                    <label class="form-label">First Name</label>
                    <input type="text" class="form-control">
                  </div>
                  <div class="col-6">
                    <label class="form-label">Last Name</label>
                    <input type="text" class="form-control">
                  </div>
                  <div class="col-12">
                    <label class="form-label">Email ID</label>
                    <input type="text" class="form-control">
                  </div>
                  <div class="col-12">
                    <label class="form-label">Password</label>
                    <input type="text" class="form-control">
                  </div>
                  <div class="col-6">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="gridCheck3-a" checked="">
                      <label class="form-check-label" for="gridCheck3-a">
                        Subscribe to our newsletter
                      </label>
                    </div>
                  </div>
                  <div class="col-6 text-end">
                    <a href="javascript:;">Forgot Password?</a>
                  </div>
                  <div class="col-12">
                    <div class="d-grid">
                      <button type="submit" class="btn btn-primary">Sign in</button>
                    </div>
                  </div>
                  <div class="col-12 text-center">
                    <p class="mb-0">Not a member? <a href="javascript:;">Register</a></p>
                  </div>
                  <div class="col-12 text-center">
                    <p class="mb-0">or sign up with:</p>
                  </div>
                  <div class="col-12 text-center">
                    <div class="error-social d-flex align-items-center justify-content-center gap-2">
                      <a href="javascript:;" class="bg-facebook"><i class="bx bxl-facebook"></i></a>
                      <a href="javascript:;" class="bg-twitter"><i class="bx bxl-twitter"></i></a>
                      <a href="javascript:;" class="bg-google"><i class="bx bxl-google"></i></a>
                      <a href="javascript:;" class="bg-linkedin"><i class="bx bxl-linkedin"></i></a>
                    </div>
                  </div>
                </form>
              </div>
              </div>
            </div>

            <div class="card">
              <div class="card-body">
                <div class="border p-3 rounded">
                <h6 class="mb-0 text-uppercase">Contact Form</h6>
                <hr>
                <form class="row g-3">
                  <div class="col-12">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control">
                  </div>
                  <div class="col-12">
                    <label class="form-label">Email ID</label>
                    <input type="text" class="form-control">
                  </div>
                  <div class="col-12">
                    <label class="form-label">Message</label>
                    <textarea class="form-control" rows="4" cols="4"></textarea>
                  </div>
                  <div class="col-12">
                    <div class="form-check d-flex justify-content-center gap-2">
                      <input class="form-check-input" type="checkbox" id="gridCheck3-b" checked="">
                      <label class="form-check-label" for="gridCheck3-b">
                        Subscribe to our newsletter
                      </label>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="d-grid">
                      <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                  </div>
                </form>
              </div>
              </div>
            </div>

            <div class="card">
              <div class="card-body">
                <div class="border p-3 rounded">
                <h6 class="mb-0 text-uppercase">Checkout Form</h6>
                <hr>
                <form class="row g-3">
                  <div class="col-12">
                    <label class="form-label">First Name</label>
                    <input type="text" class="form-control">
                  </div>
                  <div class="col-12">
                    <label class="form-label">Last Name</label>
                    <input type="text" class="form-control">
                  </div>
                  <div class="col-12">
                    <label class="form-label">Company Name</label>
                    <input type="text" class="form-control">
                  </div>
                  <div class="col-12">
                    <label class="form-label">Address</label>
                    <input type="text" class="form-control">
                  </div>
                  <div class="col-12">
                    <label class="form-label">Email</label>
                    <input type="text" class="form-control">
                  </div>
                  <div class="col-12">
                    <label class="form-label">Phone</label>
                    <input type="text" class="form-control">
                  </div>
                  <div class="col-12">
                    <label class="form-label">Additional Information</label>
                    <textarea class="form-control" rows="4" cols="4"></textarea>
                  </div>
                  <div class="col-12">
                    <div class="form-check d-flex justify-content-center gap-2">
                      <input class="form-check-input" type="checkbox" id="gridCheck3-c" checked="">
                      <label class="form-check-label" for="gridCheck3-c">
                        Create an account?
                      </label>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="d-grid">
                      <button type="submit" class="btn btn-primary">Place Order</button>
                    </div>
                  </div>
                </form>
              </div>
              </div>
            </div>

          </div>
        </div>
           

        </div>
        <!-- end page content-->
       </div>
    <!--end page content wrapper-->
@endsection
