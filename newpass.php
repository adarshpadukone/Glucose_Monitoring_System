<?php
session_start();
if(isset($_SESSION["newpass"]))
{
    if($_SESSION["newpass"]=="")
        header("location:index.php");
}
else{
    header("location:index.php");
}
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
        <script>
        $(document).ready(function(){
            $("#bt").click(function() {
                var pass = $("#pass").val();
                var pass2= $("#passr").val();
                if(pass==pass2)
                {
                    $("#ft").submit();
                }
               else
               {
                   $("h3").text("Password doesn't match");
                   $("#pass").val()="";
                   $("#passr").val()="";
               }
            });
        });
               
        </script>
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
            <form action="rp.php" autocomplete="off" id="ft" method="POST">
                    <div class="form-group">
                        <h2 class=" text-center">Reset Password</h2>
                    </div>
                    <div class="form-group">
                        <label for="email">Enter Password:</label>
                        <input type="password" placeholder="Enter Password"  class="form-control" id="pass" name="pass" autofocus required>
                    </div>
                    <div class="form-group">
                        <label for="email">Repeat Password :</label>
                        <input type="Password" placeholder="Repeat Password"  class="form-control" id="passr" name="passr" required>
                    </div>
                    <div class="form-group">
                    <input type="button" class="btn btn-success" id="bt" value="Change Password">&nbsp;&nbsp;&nbsp;&nbsp;
                        <input  type="reset" class="btn btn-danger" value="Reset">
                    </div>
                    <div class="form-group">
                    <h3 class="text-center alert-danger" id="h"></h3>
                    </div>
                </form>

            </div>
            <div class="col-sm-4"></div>
     </row>
</div>
</body>
</html>