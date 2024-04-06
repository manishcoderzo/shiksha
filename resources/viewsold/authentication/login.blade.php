<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- loader-->
  <link href="{{asset('assets/css/pace.min.css') }}" rel="stylesheet" />
  <script src="{{asset('assets/js/pace.min.js') }}"></script>

  <!--plugins-->
  <link href="{{asset('assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
  <link href="{{asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
  <link href="{{asset('assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
  <link href="{{asset('assets/plugins/input-tags/css/tagsinput.css') }}" rel="stylesheet" />

  <!-- CSS Files -->
  <link href="{{asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{asset('assets/css/bootstrap-extended.css') }}" rel="stylesheet">
  <link href="{{asset('assets/css/style.css') }}" rel="stylesheet">
  <link href="{{asset('assets/css/icons.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

  <!--Theme Styles-->
  <link href="{{asset('assets/css/dark-theme.css') }}" rel="stylesheet" />
  <link href="{{asset('assets/css/semi-dark.css') }}" rel="stylesheet" />
  <link href="{{asset('assets/css/header-colors.css') }}" rel="stylesheet" />


  <title>login</title>
</head>

<body>
<!-- start page content wrapper-->
    <div class="page-content-wrapper">
        <!-- start page content-->
       <div class="page-content">
			<div class="row">
	          <div class="col-xl-4 mx-auto" style="margin-top: 10%;">
	          
	            <div class="card">
	              <div class="card-body">
	                <div class="border p-3 rounded">
	                <h6 class="mb-0 text-uppercase">Login</h6>
	                @if(Session::has('flash_message'))
                      <div class="alert {{ Session::get('alert-class', 'alert-danger') }}"> 
                        {{ Session::get('flash_message') }}
                      </div>
                    @endif
	                <hr>
	                <form action="{{route('submit')}}" method="post" class="row g-3">
	                	@csrf
	                  <div class="col-12">
	                    <label class="form-label">Email ID</label>
	                    <input type="text" name="email" class="form-control">
	                  </div>
	                  <div class="col-12">
	                    <label class="form-label">Password</label>
	                    <input type="password" name="password" class="form-control">
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
	          </div>
	        </div>
		</div>
	</div>

  <!-- JS Files-->
  <script src="{{asset('assets/js/jquery.min.js') }}"></script>
  <script src="{{asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
  <script src="{{asset('assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
  <script src="{{asset('assets/js/bootstrap.bundle.min.js') }}"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <!--plugins-->
  <script src="{{asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
  <script src="{{asset('assets/plugins/apexcharts-bundle/js/apexcharts.min.js') }}"></script>
  <script src="{{asset('assets/plugins/easyPieChart/jquery.easypiechart.js') }}"></script>
  <script src="{{asset('assets/plugins/chartjs/chart.min.js') }}"></script>
  <script src="{{asset('assets/js/index.js') }}"></script>
  <script src="{{asset('assets/plugins/input-tags/js/tagsinput.js') }}"></script>

  <!-- Main JS-->
  <script src="{{asset('assets/js/main.js') }}"></script>

</body>

</html>