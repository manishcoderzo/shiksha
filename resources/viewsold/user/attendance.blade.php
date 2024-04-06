<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>Attendance</title>

    <!-- bootstrap 5 stylesheet -->
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
 
    <!-- fontawesome 6 stylesheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
        }
        .top-content a{
            color: black;
            text-decoration: none;
        }
        .user-image{
            width: 50px;
            border-radius: 50%;
        }
        .user-c-name{
            font-weight: 520;
            border-bottom: 1px solid #f3f3f3;
            padding-bottom: 6px;
        }
        .checkbox-design{
            padding-top: 10px;
            margin-right: 20px;
        }
        .form-check-input{
            width: 20px;
            height: 20px;
        }
        .teacher-sec{
            border-bottom: 5px solid #f3f3f3;
        }
        #my-file {
         display: none; 
        }
        .selfie-section{
            height: 90px;
            width: 100%;
            border: 1px solid #dddddd;
            background-color: #f3f3f3;
            cursor: pointer;
        }
        .selfie-icon{
            position: absolute;
            left: 50%;
            margin-top: 30px;
            font-size: 30px;
        }
        #bottom-submit{
            position: fixed;
            bottom: 0;
            right: 0px;
            z-index: 999;
        }
    </style>
</head>
<body>
    <div class="p-2 m-2 top-content border-bottom">
         <p class="h6" style="font-weight: 600;"><a href="{{route('user.home')}}"><i class="fa-solid fa-less-than" style="margin-right: 10px;"></i>Attendance: <?php echo date("d-m-Y") ?></a></p>
    </div>
    <form action="{{route('user.attendanceSubmit')}}" method="post" enctype="multipart/form-data" id="myform">
        @csrf
        <div class="p-2 m-2 teacher-sec">
            @if(Session::has('success'))
              <div class="alert {{ Session::get('alert-class', 'alert-success') }}"> 
                {{ Session::get('success') }}
              </div>
             @endif
             @if(Session::has('failed'))
              <div class="alert {{ Session::get('alert-class', 'alert-danger') }}"> 
                {{ Session::get('failed') }}
              </div>
             @endif
             <div class="p-2 m-2 teacher-sec">
                <p class="h6" style="font-weight: 700;">Status</p>
                @error('status')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="d-flex justify-content-start">
                    <p class="ml-4">
                        <input class="form-check-input" id="349" type="radio" name="status" value="0" {{$todayCheckin ? 'disabled' : ''}}/><span class="ml-2"><label for="349">Check-In</label></span>
                    </p>
                    <p style="margin-left: 40px;">
                        <input class="form-check-input" id="350" type="radio" name="status" value="1" {{$todayCheckout ? 'disabled' : ''}} {{$todayCheckin ? '' : 'disabled'}}/><span class="ml-2"><label for="350">Check-Out</label></span>
                    </p>
                    
                </div>
            </div>
            <p class="h6" style="font-weight: 700;">Select Teachers</p>

            <div class="row" style="width: 100%;height: auto;border: none;overflow-x: hidden;overflow-y: scroll;">
                <input type="hidden" name="schoolId" value="{{$head->schoolId}}">
                @foreach($data as $d)
                <input type="hidden" name="staffId[]" value="{{$d->id}}">
                <div class="col-12 mt-2">
                    <div class="d-flex justify-content-between user-c-name">
                        <p>
                            @if($d->photo != '' && file_exists(public_path().'/superadmin/profileImage/'.$d->photo))
                            <img src="{{asset('superadmin/staff/'.$d->photo)}}" class="user-image">
                            @else
                            <img src="{{asset('assets/images/noimage.png')}}" class="user-image">
                            @endif
                            <!-- <img src="{{asset('assets/images/avatars/03.png')}}" class="user-image"> -->
                            <span class="ml-2">{{$d->name}}</span>
                        </p>
                        <p class="checkbox-design">
                            <input class="form-check-input" name="atten[]" type="checkbox" id="inlineCheckbox1" value="{{$d->id}}" />
                        </p>
                    </div>
                </div>
                 @endforeach
            </div>
           
        </div>
        
        <!-- <div class="p-2 m-2 teacher-sec">
            <p class="h6" style="font-weight: 700;">Group Selfie<sup>*</sup></p>
            
            <img id="capturedImage" src="" alt="Captured Image" style="display: none;">
            <video id="webcam" autoplay></video>
            <input type="hidden" id="photo-input" name="selfie" placeholder="Captured Photo Data URI" readonly>
            @error('selfie')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div> -->

        <div class="row m-3">
            <div class="col-12">
                <input type="submit" id="bottom-submit" value="Next" class="btn btn-dark w-100">
            </div>
        </div>
    </form>    

  
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   
   <script></script>
</body>
</html>