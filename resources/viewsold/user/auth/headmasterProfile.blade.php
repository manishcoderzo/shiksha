<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<title>Home</title>
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.user-image{
    width: 50px;
    border-radius: 50%;
}
.user-c-name{
    font-weight: 500;
    border-bottom: 1px solid #f3f3f3;
    padding-bottom: 6px;
}
.user-c-name #icons{
/*    background-color: red;*/
    border-radius: 50%;
    padding:10px;
    color: white;
}
.user-c-name .link{
    text-decoration: none;
    color: black;
}
.circle{
        height: 100px;
        width: 100px;
        border-radius: 50%;
        border: 2px solid rgba(221, 221, 221, 0.5);
        position: absolute;
        left: 35%;
        top: 49%;
        padding:3px;
        background-color: white;
        cursor: pointer;
    }
    .circle:hover{
        border: 2px solid powderblue;
    }
    .circle-image{
        height: 90px;
        width: 90px;
        border-radius: 50%;
    }
    .dd{
        background-image:url({{url('assets/images/pngtree.jpg')}});
        height:100px
    }
    .side-margin{
        margin:10px;
    }
</style>
<!-- fontawesome 6 stylesheet -->
<!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<div class="p-2 m-2 border-bottom d-flex justify-content-between">
     <p class="h6">
        <span class="ml-2">Profile Update</span></p>
     <!-- <a href="{{route('user.headmasterlogout')}}">logout</a> -->
</div> 
<div class="p-2 m-2">
    <div class="row" style="background-color:rgba(221, 221, 221, 0.5);height: 150px;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                <div class="col-md-12 dd">
                    <div class="">
                        <div class="circle">
                            @if(auth('headmasters')->user()->photo != '' && file_exists(public_path().'/superadmin/headmaster/'.auth('headmasters')->user()->photo))
                            <img src="{{asset('superadmin/headmaster/'.auth('headmasters')->user()->photo)}}" class="circle-image">
                            @else
                            <img src="{{asset('assets/images/noimage.png')}}" class="circle-image">
                            @endif
                            <!-- <img src="{{asset('admin/governingbody/some1709636709.jpg')}}" class="circle-image"> -->
                        </div>
                    </div>
                </div>
            </div>
    <div class="side-margin">
        @if(Session::has('success'))
          <div class="alert {{ Session::get('alert-class', 'alert-success') }}"> 
            {{ Session::get('success') }}
          </div>
         @endif
         <form action="{{route('user.headmasterProfileSubmit')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row" style="margin-top:3%">
                            <input type="hidden" name="id" value="{{auth('headmasters')->user()->id}}">
                            <div class="col-sm-3">
                                <h6>Name:</h6>
                             </div>
                             <div class="col-sm-9">
                                 <input type="text" name="fname" class="form-control"  value="{{auth('headmasters')->user()->name}}" disabled>
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                             </div>
                             
                             <div class="col-sm-3 mt-2">
                                <h6>Phone No:</h6>
                             </div>
                             <div class="col-sm-9 mt-2">
                                 <input type="text" name="phone" class="form-control"  value="{{auth('headmasters')->user()->contactNo}}" disabled>
                                @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                             </div>
                             <div class="col-sm-3 mt-2">
                                <h6>Email:</h6>
                             </div>
                             <div class="col-sm-9 mt-2">
                                 <input type="text" name="email" class="form-control"  value="{{auth('headmasters')->user()->email}}" disabled>
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                             </div>
                             <div class="col-sm-3 mt-2">
                                <h6>Photo:</h6>
                             </div>
                             <div class="col-sm-9 mt-2">
                                 <input type="file" name="photo" class="form-control"  value="">
                                @error('photo')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                             </div>
                             <div class="col-sm-3 mt-2" style="margin-bottom: 50px;">
                                <input type="submit" class="btn btn-success" value="Update">
                             </div>
                        </div>
                    </form>
        <!-- <div class="col-12">
            <p class="user-c-name"><a href="#" class="link"><i class="fa-solid fa-user bg-primary" id="icons" style="font-size: 18px;"></i><span class="ml-2">Profile</span></a></p>
        </div> -->
    </div>
</div>

@include('user.layout.footernav')


</body>
</html>
