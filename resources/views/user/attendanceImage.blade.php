@extends('user.layout.app')
@section('content')


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
    </style>

    <style>
    
    #webcam {
        width: 100%;
       
        background-color: #f3f3f3;
        height: auto;
        max-width: 350px;
        border: 1px solid black;
        border-radius: 8px;
    }
    #capturedImage {
        width: 100%;
/*        max-width: 500px;*/
        height: 40px;
        height: auto;
        max-width: 350px;
        border: 1px solid black;
    }
    #captureButton {
        
        padding: 12px 12px;
        font-size: 33px;
        cursor: pointer;
        border-radius: 50%;
        position: relative;
        border: 2px solid #777070;
        color: black;
        top: -61px;
        left: 37%;
        background-color: white;
    }
    #photo {
        display: none;
        margin-top: 10px;
        width: 100%;
        max-width: 350px;
    }
    /*#open-btn{
        position: absolute;
        margin-top: -265px;
    }*/
    #closeWebcam{
        border: none;
        background-color: red;
        color: white;
        height: 40px;
        width: 40px;
        border-radius: 50%;
        padding: 9px 14px 12px 16px;
        top: 73px;
        left: 84%;
        position: absolute;
    }
    #startWebcam{
         padding: 17px 18px;
        font-size: 26px;
        cursor: pointer;
        
        border-radius: 50%;

        /*padding: 12px 12px;
        font-size: 33px;
        cursor: pointer;
        border-radius: 50%;*/
        position: relative;
        border: 2px solid #777070;
        color: black;
        top: -103px;
        left: 37%;
        background-color: #f3f3f3;
    }
    
</style>
<style>
    #video-container {
        margin: auto;
        width: 100%;
        max-width: 300px;
        text-align: center;
    }
    #webcams {
        width: 100%;
/*        max-width: 500px;*/
        height: 60px;
        height: auto;
        max-width: 350px;
        border: 1px solid black;
        border-radius: 8px;
        background-color: #f3f3f3;
    }
    #capturedImages {
        width: 100%;
/*        max-width: 500px;*/
        height: 40px;
        height: auto;
        max-width: 350px;
        border: 1px solid black;
    }
    #captureButtons {
        
        padding: 10px 20px;
        font-size: 26px;
        cursor: pointer;
        position: absolute;
        margin-top: -152px;
        margin-left: 35%;
        border-radius: 50%;
    }
    #photos {
        display: none;
        margin-top: 10px;
        width: 100%;
        max-width: 350px;
    }
    #open-btns{
        position: absolute;
        margin-top: -265px;
    }
    #closeWebcams{
        position: absolute;
        margin-top: -527px;
        margin-left: 87%;
        border:none;
        background-color:red;
        color:white;
        height:40px;
        width: 40px;
        border-radius: 50%;
        padding:10px;
    }
    #startWebcams{
        padding: 10px 20px;
        font-size: 26px;
        cursor: pointer;
        position: absolute;
        margin-top: -195px;
        left: 35%;
        border-radius: 50%;
        border: 2px solid #777070;
    }
</style>
    <div class="p-2 top-content border-bottom topBackbtnFixed">
         <p class="h6" style="font-weight: 600;"><a href="{{route('user.dashboard')}}"><i class="fa-solid fa-arrow-left" id="icons" style="margin-right: 10px;"></i>Attendance: <?php echo date("d-m-Y") ?></a></p>
    </div>
    <!-- <div class="p-2 m-2 top-content border-bottom">
         <p class="h6" style="font-weight: 600;"><a href="{{route('user.attendance')}}"><i class="fa-solid fa-less-than" style="margin-right: 10px;"></i>Attendance: <?php echo date("d-m-Y") ?></a></p>
    </div> -->
    <form action="{{route('user.attendanceImageSubmit')}}" method="post" enctype="multipart/form-data" id="myform">
        @csrf
        <input type="hidden" value="{{$id}}" name="attendanceId">
        <div class="p-2 m-2 teacher-sec">
            <p class="h6" style="font-weight: 700;">Upload selfie<sup>*</sup></p>
            @error('selfie')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <img id="capturedImage" src="" alt="Captured Image" style="display: none;">
            <video id="webcam" autoplay></video>
            <input type="hidden" id="photo-input" name="selfie" placeholder="Captured Photo Data URI" readonly>
            <!-- selfie camera take -->
            <a href="#" id="startWebcam"><i class="fa-solid fa-circle-plus"></i></a>
          <a  href="#"id="closeWebcam" style="display: none;"><i class="fa-solid fa-xmark"></i></a>
          <a href="#" id="captureButton" style="display: none;"><i class="fa-solid fa-camera"></i></a>
          <canvas id="canvas" style="display: none;"></canvas>
            
        </div>
        <div class="p-2 m-2 teacher-sec">
            <p class="h6" style="font-weight: 700;">Upload register<sup>*</sup></p>
            @error('attendanceImage')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <img id="capturedImages" src="" alt="Captured Image" style="display: none;">
            <video id="webcams" autoplay></video>
            <input type="hidden" id="photo-inputs" name="attendanceImage" placeholder="Captured Photo Data URI" readonly>
            
        </div>

        <div class="row m-3">
            <div class="col-12">
                <input type="submit" name="" value="Final Submit" class="btn btn-dark w-100">
            </div>
        </div>
    </form>
    <!--<div id="video-container">-->
    <!--    <button id="open-btn">Open Camera</button>-->
    <!--    <button id="close-btn" style="display: none;">Close Camera</button>-->
   
    <!--    <canvas id="canvas" style="display: none;"></canvas>-->
    <!--</div>-->
    <!-- register camera take -->
    <button id="startWebcams"><i class="fa-solid fa-circle-plus"></i></button>
  <button id="closeWebcams" style="display: none;"><i class="fa-solid fa-xmark"></i></button>
  <button id="captureButtons" style="display: none;"><i class="fa-solid fa-camera"></i></button>
  
  <canvas id="canvass" style="display: none;"></canvas>

    <!-- selfie camera take -->
    <!-- <button id="startWebcam"><i class="fa-solid fa-circle-plus"></i></button>
  <button id="closeWebcam" style="display: none;"><i class="fa-solid fa-xmark"></i></button>
  <button id="captureButton" style="display: none;"><i class="fa-solid fa-camera"></i></button>
  <canvas id="canvas" style="display: none;"></canvas> -->
  
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <script type="text/javascript">
        $('#my-button').click(function(){
            $('#my-file').click();
        });
    </script> -->
     
    <script>

document.addEventListener("DOMContentLoaded", function() {
    // const video = document.getElementById('video');webcam
    const photoInput = document.getElementById('photo-input');
  const startWebcamButton = document.getElementById("startWebcam");
  const closeWebcamButton = document.getElementById("closeWebcam");
  const captureButton = document.getElementById("captureButton");
  const video = document.getElementById("webcam");
  const canvas = document.getElementById("canvas");
  const capturedImage = document.getElementById("capturedImage");

  let stream;

  startWebcamButton.addEventListener("click", async () => {
    
      const constraints = {
        video: true
      };

  navigator.mediaDevices.getUserMedia(constraints)
    .then(function(stream) {
      const video = document.getElementById('webcam');
      video.srcObject = stream;
      video.play();
      videoStream = stream;
         startWebcamButton.style.display = "none";
      closeWebcamButton.style.display = "inline";
      captureButton.style.display = "inline";
      capturedImage.style.display = "none";
      document.getElementById("webcam").style.display = "inline";
      
    })
    .catch(function(error) {
      console.error('Error accessing webcam:', error);
    });
  });

  closeWebcamButton.addEventListener("click", () => {
      if (videoStream) {
        const tracks = videoStream.getTracks();
        tracks.forEach(function(track) {
          track.stop();
          startWebcamButton.style.display = "inline";
          closeWebcamButton.style.display = "none";
          captureButton.style.display = "none";
          capturedImage.style.display = "none";
          
        });
      }
  });

  captureButton.addEventListener("click", () => {
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;
    canvas.getContext("2d").drawImage(video, 0, 0, canvas.width, canvas.height);
    capturedImage.src = canvas.toDataURL("image/png");
    photoInput.value = capturedImage.src;
    capturedImage.style.display = "inline";
    captureButton.style.display = "none";
    closeWebcamButton.style.display = "none";
    startWebcamButton.style.display = "none";
    document.getElementById("webcam").style.display = "none";
    
    if (videoStream) {
    const tracks = videoStream.getTracks();
    tracks.forEach(function(track) {
      track.stop();
    });
  }
    
  });
  capturedImage.addEventListener("click", () => {
    startWebcamButton.style.display = "inline";
    capturedImage.style.display = "none";
    document.getElementById("webcam").style.display = "inline";
    });
});

</script>

<!-- register image photo -->
   <script>

document.addEventListener("DOMContentLoaded", function() {
    // const video = document.getElementById('video');webcam
    const photoInputs = document.getElementById('photo-inputs');
  const startWebcamButtons = document.getElementById("startWebcams");
  const closeWebcamButtons = document.getElementById("closeWebcams");
  const captureButtons = document.getElementById("captureButtons");
  const videos = document.getElementById("webcams");
  const canvass = document.getElementById("canvass");
  const capturedImages = document.getElementById("capturedImages");

  let stream;

  startWebcamButtons.addEventListener("click", async () => {
    // try {
    //   stream = await navigator.mediaDevices.getUserMedia({ video: true });
    //   video.srcObject = stream;
    //   startWebcamButton.style.display = "none";
    //   closeWebcamButton.style.display = "inline";
    //   captureButton.style.display = "inline";
    // } catch (err) {
    //   console.error("Error accessing camera:", err);
    // }
       const constraints = {
        video: {
            facingMode: { exact: 'environment' }
        }
      };

  navigator.mediaDevices.getUserMedia(constraints)
    .then(function(stream) {
      const video = document.getElementById('webcams');
      video.srcObject = stream;
      video.play();
      videoStreams = stream;
         startWebcamButtons.style.display = "none";
      closeWebcamButtons.style.display = "inline";
      captureButtons.style.display = "inline";
      capturedImages.style.display = "none";
      document.getElementById("webcams").style.display = "inline";
      
    })
    .catch(function(error) {
      console.error('Error accessing webcam:', error);
    });
  });

  closeWebcamButtons.addEventListener("click", () => {
      if (videoStreams) {
        const tracks = videoStreams.getTracks();
        tracks.forEach(function(track) {
          track.stop();
          startWebcamButtons.style.display = "inline";
          closeWebcamButtons.style.display = "none";
          captureButtons.style.display = "none";
          capturedImages.style.display = "none";
          
        });
      }
  });

  captureButtons.addEventListener("click", () => {
    canvass.width = videos.videoWidth;
    canvass.height = videos.videoHeight;
    canvass.getContext("2d").drawImage(videos, 0, 0, canvass.width, canvass.height);
    capturedImages.src = canvass.toDataURL("image/png");
    photoInputs.value = capturedImages.src;
    capturedImages.style.display = "inline";
    captureButtons.style.display = "none";
    closeWebcamButtons.style.display = "none";
    startWebcamButtons.style.display = "none";
    document.getElementById("webcams").style.display = "none";
    
    if (videoStreams) {
    const tracks = videoStreams.getTracks();
    tracks.forEach(function(track) {
      track.stop();
    });
  }
    
  });
  capturedImages.addEventListener("click", () => {
    startWebcamButtons.style.display = "inline";
    capturedImages.style.display = "none";
    document.getElementById("webcams").style.display = "inline";
    });
});

</script>

@endsection