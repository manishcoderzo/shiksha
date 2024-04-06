@extends('user.layout.app')
@section('content')
    <!--<div id="internet-status">-->
    <!--    <p id="connection-message">You are not connected to the internet.</p>-->
    <!--</div>-->
    <div id="internet-status" class="alert alert-danger">
        You are not connected to the internet.
    </div>
<script>
   

document.addEventListener('DOMContentLoaded', function() {
    function updateOnlineStatus(event) {
        var status = document.getElementById("internet-status");
        if (navigator.onLine) {
            status.style.display = 'none'; // Hide the message if online
        } else {
            status.style.display = 'block'; // Show the message if offline
        }
    }

    window.addEventListener('online',  updateOnlineStatus);
    window.addEventListener('offline', updateOnlineStatus);

    updateOnlineStatus(); // Call the function initially to set the correct status
});

</script>
@endsection
