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
.bell-icon{
    background-color: #f3f3f3;
    border-radius: 50%;
    padding:5px;
}
.icon-badge{
    height: 8px;
    width: 8px;
    border-radius: 50%;
    background-color: red;
    color: red;
    font-size: 10px;
    border:1px solid red;
    position: absolute;
    right: 15px;
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
</style>
<!-- fontawesome 6 stylesheet -->
<!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<div class="p-2 m-2 border-bottom d-flex justify-content-between">
     <p class="h6" style="font-weight: 500;">Home</p>
     <p class="h6 bell-icon"><i class="fa-regular fa-bell"></i></p>
     <span class="icon-badge"></span>
</div> 
<div class="p-2 m-2">
    <p class="h6" style="font-weight: 700;">Teachers ({{$data->count()}})</p>
    <div class="row">
        @foreach($data as $d)
        <div class="col-12">
            <p class="user-c-name">
                @if($d->photo != '' && file_exists(public_path().'/superadmin/staff/'.$d->photo))
                <img src="{{asset('superadmin/staff/'.$d->photo)}}" class="user-image">
                @else
                <img src="{{asset('assets/images/noimage.png')}}" class="user-image">
                @endif
                <!-- <img src="{{asset('assets/images/avatars/03.png')}}" class="user-image"> -->
                <span class="ml-2">{{$d->name}}</span></p>
        </div>
        @endforeach
        <!-- <div class="col-12">
            <p class="user-c-name"><img src="{{asset('assets/images/avatars/01.png')}}" class="user-image"><span class="ml-2">Bageshar Kumar</span></p>
        </div>
        <div class="col-12">
            <p class="user-c-name"><img src="{{asset('assets/images/avatars/02.png')}}" class="user-image"><span class="ml-2">Ronak Kumar</span></p>
        </div>
        <div class="col-12">
            <p class="user-c-name"><img src="{{asset('assets/images/avatars/04.png')}}" class="user-image"><span class="ml-2">anant singh</span></p>
        </div>
        <div class="col-12">
            <p class="user-c-name"><img src="{{asset('assets/images/avatars/05.png')}}" class="user-image"><span class="ml-2">Sohan Kumar</span></p>
        </div>
        <div class="col-12">
            <p class="user-c-name"><img src="{{asset('assets/images/avatars/04.png')}}" class="user-image"><span class="ml-2">Sohan Kumar</span></p>
        </div>
        <div class="col-12">
            <p class="user-c-name"><img src="{{asset('assets/images/avatars/02.png')}}" class="user-image"><span class="ml-2">Sohan Kumar</span></p>
        </div> -->
    </div>
</div>
@include('user.layout.footernav')



</body>
</html>
