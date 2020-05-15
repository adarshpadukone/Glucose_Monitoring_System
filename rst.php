<?php
session_start();
?>
<!DOCTYPE html>
<htm>
   <head>
         <title>Forgot password</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="logo.png" type="image/png">
        <link rel="shortcut icon" href="logo.png" type="image/png"> 
        <meta name="robots" content="index, follow">
        <meta name="author" content="Adarsh padukone">
        <meta name="copyright" content="All rights reserved"> 
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta http-equiv="content-language" content="en">
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="adarsh,adarshpadukone,ap,jssateb,jss collge,blood glucose,glucometer,non invasive,monitoring" />
        <meta name="description" content="Non-invasive Blood Glucose Monitoring system. Developed by Students of Electronics and Communication Engineering , JSSATE Bangalore" />
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/bootstrap.min.css";>
        <style>
               
        </style>
   </head>
   <body class="alert-warning">
   <nav class="navbar navbar-inverse">
        <div class="container-fluid">
        <div class="navbar-header">
        <a class="navbar-brand" href="#">Reset password</a>
        </div>
        </div>
     </nav>
    <div class="container">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <form action="forgot.php" autocomplete="off" method="POST">
                    <div class="form-group">
                        <h2 class=" text-center">Forgot Password</h2>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="mail" placeholder="Enter Email id"  class="form-control" id="email" name="email"  required>
                    </div>
                    <div class="form-group">
                        <label for="email">Mobile Number :</label>
                        <input type="text" placeholder="Enter mobile number"  class="form-control" id="mob" name="mob" pattern="[987]{1}[0-9]{9}" required>
                    </div>
                    <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Request OTP">&nbsp;&nbsp;&nbsp;&nbsp;
                        <input  type="reset" class="btn btn-danger" value="Reset">
                    </div>
                    <div class="form-group">
                    <h3 class="text-center alert-danger">
                    <?php
                    if(isset($_SESSION["em"]))
                    {
                        if($_SESSION["em"]=="f")
                        {
                            $_SESSION["em"]="";
                            echo "Invalid Email/Mobile Number";
                        }
                    }
                    ?>
                    </h3>
                    </div>
                </form>

            </div>
            <div class="col-sm-4"></div>
     </row>
</div>
</body>
</html>
