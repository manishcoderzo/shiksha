<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>OTP verification</title>

    <!-- bootstrap 5 stylesheet -->
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
 
    <!-- fontawesome 6 stylesheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
        }
        .otp-letter-input{
            max-width: 100%;
            height: 45px;
            border:none;
            border-bottom: 1px solid #198754;
            color: #198754;
            font-size: 20px;
            text-align: center;
            font-weight: bold;
        }
        .otp-letter-input:focus{
            outline:none !important;
            border-bottom: 1px solid #198754 !important;
        }
        .btn{
            height: 50px;
        }
        .bottom-content{
            position: fixed;
            bottom: 0;
           
        }
    </style>
</head>
<body>
    <div class="p-2 m-2 border-bottom">
         <p class="h6"><i class="fa-solid fa-less-than" style="margin-right: 10px;"></i>Confirm your email</p>
    </div>
    <div class="row m-2">
        <div class="col-md-12 mt-3">
            <div class="bg-white p-2 rounded-3">
                <div>
                    <!-- <p class="text-center text-success" style="font-size: 5.5rem;"><i class="fa-solid fa-envelope-circle-check"></i></p> -->
                    <p class="text">Enter the OTP we sent over email to</p>
                    <p class="h5 ">manish@gmail.com</p>
                    <div class="row pt-4 pb-2">
                        <div class="col-2">
                            <input class="otp-letter-input" type="text" maxlength="1">
                        </div>
                        <div class="col-2">
                            <input class="otp-letter-input" type="text" maxlength="1">
                        </div>
                        <div class="col-2">
                            <input class="otp-letter-input" type="text" maxlength="1">
                        </div>
                        <div class="col-2">
                            <input class="otp-letter-input" type="text" maxlength="1">
                        </div>
                        <div class="col-2">
                            <input class="otp-letter-input" type="text" maxlength="1">
                        </div>
                        <div class="col-2">
                            <input class="otp-letter-input" type="text" maxlength="1">
                        </div>
                    </div>
                    <p class="text-muted text-center pt-3">0:45 seconds</p>

                    <div class="row pt-2">
                        <div class="col-12">
                            <button class="btn btn-dark w-100" style="font-weight: 500;">Submit OTP</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="p-4 bottom-content">
        <p class="text-muted">If you do not receive an OTP after three attempts, Kindly report the issue <a href="" style="color:black;">here</a></p>
    </div>
</body>
</html>