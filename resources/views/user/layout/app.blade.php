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
/* styles.css */

#preloader {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: #ffffff;
    z-index: 9999;
}

#loader {
    border: 8px solid #f3f3f3; /* Light grey */
    border-top: 8px solid #3498db; /* Blue */
    border-radius: 50%;
    width: 60px;
    height: 60px;
    animation: spin 1s linear infinite;
    position: absolute;
    top: 50%;
    left: 50%;
    margin-top: -30px;
    margin-left: -30px;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Hide content until loaded */
/*#content {*/
/*    display: none;*/
/*}*/
.hidden {
    display: none;
}
#no-internet-message {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.8);
    color: white;
    text-align: center;
    padding-top: 50vh;
    font-size: 18px;
}
.topBackbtnFixed{
    position: sticky;
    margin: 0 !important;
    top: 0;
    z-index: 11;
    background-color: white;
}
</style>
<!-- fontawesome 6 stylesheet -->
<!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div id="preloader">
        <div id="loader"></div>
    </div>
     <div id="no-internet-message">
        <p>Please check your internet connectivity and try again.</p>
    </div>
    <div id="contents">
    @yield('content')
    </div>
<script>
  // script.js

document.addEventListener("DOMContentLoaded", function() {
    function updateInternetStatus() {
        var noInternetMessage = document.getElementById("no-internet-message");
        var appContent = document.getElementById("contents");
        if (!navigator.onLine) {
            noInternetMessage.style.display = "block";
            appContent.style.display = "none";
        } else {
            noInternetMessage.style.display = "none";
            appContent.style.display = "block";
        }
    }

    // Check internet connection status on page load
    updateInternetStatus();

    // Check internet connection status whenever it changes
    window.addEventListener("online", updateInternetStatus);
    window.addEventListener("offline", updateInternetStatus);

    var preloader = document.getElementById("preloader");
    var content = document.getElementById("contents");

    setTimeout(function() {
        preloader.style.display = "none";
        content.style.display = "block";
    }, 300); 

     
});


</script>
</body>
</html>