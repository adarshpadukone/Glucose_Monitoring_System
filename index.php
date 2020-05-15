<?php
session_start();
setcookie("username", "", time() - 3600);
setcookie("password", "", time() - 3600);
setcookie("login", "", time() - 3600);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Glucometer</title>
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
        <script src="js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/bootstrap.min.css";>
        <style>
        /*body{
            background-color: darkorchid;
         }*/
        </style>
    </head>
    <body class="alert-warning">
        <center><h1><b style="color:red;">GLUCOMETER</b></h1></center><br><br>
    <div class="container">
        <div class="row">
            <div class="col-sm-2">
                 <img src="jss.png" height="100" width="100" style="float:left;">
            </div>
            <div class="col-sm-10"><br>
                <h2>Department of Electronic and Communication Engineering</h2>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                
                <form action="login.php" autocomplete="off" method="POST">
                    <div class="form-group">
                        <label for="Login">Login As :</label>
                        <select  class="form-control" required name="login" id="login">
                            <option value="">Select</option>
                            <option value="doctor">Doctor</option>
                            <option value="patient">Patient</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="username">User Name :</label>
                        <input type="text" placeholder="Enter Username"  class="form-control" id="username" name="username"  pattern="[A-Za-z0-9 ]+" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password :</label>
                        <input type="password" id="pass" class="form-control" name="pass" required placeholder="Enter password">
                    </div>
                    <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Login">&nbsp;&nbsp;&nbsp;&nbsp;
                        <input  type="reset" class="btn btn-danger" value="Reset">&nbsp;&nbsp;&nbsp;
                        <a href="rst.php">Forgot Password?</a>
                    </div>
                    <div class="form-group text-center alert-danger">
                  
                    <?php
                        if(isset($_SESSION["err"])){
                                        if($_SESSION["err"]=="invalid")
                                            {
                                                echo "Invalid username or Password"; 
                                                $_SESSION["err"]="" ;
                                            }
                                            else  if($_SESSION["err"]=="logout")
                                            {   $_SESSION["err"]="" ;
                                                echo "You're logged out. Please login again"; 
                                            }
                                           }   
                          if(isset($_SESSION["passchange"]))  
                          {
                              if($_SESSION["passchange"]=="s")
                              {
                                  echo "Password Changed Successfully";
                                  $_SESSION["passchange"]="";
                              }
                          }               
                                           
                                           
                                           ?>
                    </div>



            </form>
        </div>
        <div class="col-sm-4"></div>
    </div>
    
    <div class="row"><br><br><br><Br>
        <div class="col-sm-12  text-center">
        &copy; 2020 Department of Electronics and Communication <br>All Rights reserved
        </div>          
    </div>
</div>
   <br>
</body>
</html>