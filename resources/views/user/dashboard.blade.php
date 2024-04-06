@extends('user.layout.app')
@section('content')
<style>
.clock {
font-family: Arial, sans-serif;
text-align: center;
}

.time {
    font-size: 3em;
}

.date {
    font-size: 1.5em;
}
.seconds {
    font-size: 0.5em; /* Adjust the font size for seconds */
}

.ampm {
    font-size: 0.6em; /* Adjust the font size for AM/PM */
}
.location-dash{
    margin-bottom:0;
    font-weight: bold;
    font-size: 15px;
}
.location-dashs{
    margin-bottom:0;
    font-weight: bold;
    font-size: 12px;
}
.user-image{
    margin-left: 5px;
    
}
.user-design{
    
    
}
#icons{
    color:white;
    padding: 15px;
    border-radius: 50%;
}
</style>
<div class="p-2 m-2 d-flex justify-content-center" style="padding-bottom:0;margin-bottom: 0;">
     <!-- <p class="user-c-name user-design" style="border:none;">
        <i class="fa-solid fa-user bg-primary ml-2" id="icons" style="font-size: 18px;"></i>
        <span id="greeting"></span>
        <br><span class="">Hello,{{Auth('headmasters')->user()->name}}</span>
    </p> -->
     <!-- <p class="user-c-name" style="border:none;text-align: center;">
        <img src="{{asset('assets/images/shikshalogo.jfif')}}" class="user-image" style="width:60px"><br><span class=""><span id="greeting"></span></span>
    </p>  -->   
     
</div> 

<div class="p-2 m-2" style="padding-top:0 !important;margin-top: 0 !important;">
    <div class="row">
        <div class="col-lg-6 col-12">
             <p class="user-c-name" style="border:none;text-align: center;">
                <img src="{{asset('assets/images/shikshalogo.jfif')}}" class="user-image" style="width:60px"><br><span id="greeting"></span>
            </p>   
        </div>

        <div class="col-lg-6 col-12">
            <!-- <div style="text-align:center;">
            <p class="user-c-name"> -->
                <div class="clock">
                    <div class="time"></div>
                    <div class="date"></div>
                </div>
           <!--  </p>
            </div> -->
        </div>
        <div class="col-12 mt-4">
            <p class="location-dash">Location</p>
            <p>{{$school->schoolList->address}}</p>
        </div>
        <div class="col-lg-3 col-md-4 col-6">
            <p class="location-dash">School Latitude</p>
            <p class="location-dashs">{{$school->schoolList->latitude}}</p>
        </div>
        <div class="col-lg-3 col-md-4 col-6">
            <p class="location-dash">Your Latitude</p>
            <p style="color:green" class="location-dashs" id="latitude"></p>
        </div>
        <div class="col-lg-3 col-md-4 col-6">
            <p class="location-dash" style="margin-bottom:0">School Longitude</p>
            <p class="location-dashs">{{$school->schoolList->longitude}}</p>
        </div>
        <div class="col-lg-3 col-md-4 col-6">
            <p class="location-dash" style="margin-bottom:0">Your Longitude</p>
            <p style="color:green" class="location-dashs" id="longitude"></p>
        </div>
    </div>
        <div class="mb-4">
            <h4 style="font-weight: 700;" title="Click on go to all teacher section">Teachers List({{$data->count()}})</h4>
            <div class="row">
                @foreach($data as $d)
                <div class="col-lg-3 col-md-4 col-12">
                    <p class="user-c-name">
                        <a href="{{route('user.teacherDetails',[$d->id])}}" style="color:black;text-decoration: none;"> 
                        @if($d->photo != '' && file_exists(public_path().'/superadmin/staff/'.$d->photo))
                        <img src="{{asset('superadmin/staff/'.$d->photo)}}" class="user-image">
                        @else
                        <img src="{{asset('assets/images/noimage.png')}}" class="user-image">
                        @endif
                        <!-- <img src="{{asset('assets/images/avatars/03.png')}}" class="user-image"> -->
                        <span class="ml-2">{{$d->name}}</span></a></p>
                </div>
                @endforeach
            </div>
        </div>
       
   
</div>
@include('user.layout.footernav')
<script>
  function updateTime() {
    var now = new Date();
    var hours = now.getHours();
    var amPm = hours >= 12 ? 'PM' : 'AM';

    // Convert hours to 12-hour format
    hours = hours % 12;
    hours = hours ? hours : 12; // If hours is 0, set it to 12

    var minutes = now.getMinutes();
    var seconds = now.getSeconds();

    // Add leading zero if needed
    hours = hours < 10 ? '0' + hours : hours;
    minutes = minutes < 10 ? '0' + minutes : minutes;
    seconds = seconds < 10 ? '0' + seconds : seconds;

    var timeString = hours + ':' + minutes + '<span class="seconds">' + ':' + seconds + '</span>' + ' <span class="ampm">' + amPm + '</span>';
    document.querySelector('.time').innerHTML = timeString;

    var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    var day = days[now.getDay()];
    var month = months[now.getMonth()];
    var date = now.getDate();
    var year = now.getFullYear();

    var dateString = day + ', ' + date + ' ' + month + ' ' + year;
    document.querySelector('.date').textContent = dateString;
}

updateTime(); // Call the function initially
setInterval(updateTime, 1000); // Update time every second

</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;

            document.getElementById("latitude").textContent += latitude;
            document.getElementById("longitude").textContent += longitude;
        }, function(error) {
            switch(error.code) {
                case error.PERMISSION_DENIED:
                    console.error("User denied the request for Geolocation.");
                    break;
                case error.POSITION_UNAVAILABLE:
                    console.error("Location information is unavailable.");
                    break;
                case error.TIMEOUT:
                    console.error("The request to get user location timed out.");
                    break;
                case error.UNKNOWN_ERROR:
                    console.error("An unknown error occurred.");
                    break;
            }
        });
    } else {
        console.error("Geolocation is not supported by this browser.");
    }
});

</script>
<script>
  function getGreeting() {
    var now = new Date();
    var hour = now.getHours();
    var greeting;

    if (hour >= 5 && hour < 12) {
      greeting = 'Good morning!';
    } else if (hour >= 12 && hour < 18) {
      greeting = 'Good afternoon!';
    } else if (hour >= 18 && hour < 22) {
      greeting = 'Good evening!';
    } else {
      greeting = 'Good night!';
    }

    return greeting;
  }

  document.getElementById('greeting').innerText = getGreeting();
</script>
@endsection
