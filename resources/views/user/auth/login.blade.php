<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        body {
            background-color: #fff;
            font-family: sans-serif;
        }
        .login-container {
            max-width: 400px;
            margin: 0 auto;
            margin-top: 50px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
/*            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);*/
        }
        .form-control:focus{
            box-shadow: none !important;
/*            border: none !important;*/
        }
        .link-forgot{
            text-align: right;
            
        }
        .link-forgot a{
            color: #4a5c70 !important;
        }
        .btn-block{
            border-radius: 12px;
            background-color: black;
        }
    </style>
    <script>
        window.addEventListener('load', function() {
    function updateOnlineStatus(event) {
        var status = document.getElementById("internet-status");
        var message = document.getElementById("connection-message");
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
</head>
<body>
    <div id="internet-status">
        <p id="connection-message">You are not connected to the internet.</p>
    </div>
    <div class="container">
        <div class="login-container">
            <h2 class="text-center mb-4"><img src="{{asset('assets/images/shikshalogo.jfif')}}" style="width:120px;"></h2>
            @if(Session::has('flash_message'))
              <div class="alert {{ Session::get('alert-class', 'alert-danger') }}"> 
                {{ Session::get('flash_message') }}
              </div>
            @endif
            <form id="login-form" action="{{route('user.usersubmit')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="username">Email Id</label>
                    <input type="text" name="email" id="username" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-group">
                        <input type="password" name="password" id="password" class="form-control" required>
                        <div class="input-group-append">
                            <span class="input-group-text" id="toggle-password">
                                <i class="fas fa-eye-slash"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <p class="link-forgot"><a href="#">Forgot Password?</a></p>
                <div class="form-group">
                    <button type="submit" class="btn btn-dark btn-block">Login</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script>
        $(document).ready(function(){
            // Toggle password visibility
            $('#toggle-password').click(function(){
                var passwordField = $('#password');
                var fieldType = passwordField.attr('type');
                if (fieldType === 'password') {
                    passwordField.attr('type', 'text');
                    $(this).html('<i class="fas fa-eye"></i>');
                } else {
                    passwordField.attr('type', 'password');
                    $(this).html('<i class="fas fa-eye-slash"></i>');
                }
            });
        });
    </script>
</body>
</html>
