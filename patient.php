<?php
session_start();
$databaseHost = 'localhost';//or localhost
$databaseName = 'project'; // your db_name
$databaseUsername = 'root'; // root by default for localhost 
$databasePassword = '';  // by defualt empty for localhost

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
 
if(isset($_COOKIE["username"]) && isset($_COOKIE["password"]) && isset($_COOKIE["login"]))
{
    $username=$_COOKIE["username"];
    $password=$_COOKIE["password"];
    $login=$_COOKIE["login"];
    $cser=mysqli_connect("localhost","root","","project") or die("connection failed:".mysqli_error());
    $res = mysqli_query($cser,"select * from users where username='$username'and password='$password'and login='$login'");
    $result=mysqli_fetch_array($res);
    if(($result["username"]==$_COOKIE["username"])&&($result["login"]==$_COOKIE["login"]))
         if($result["login"]!="patient")
         {   $_SESSION["err"]="logout";
            header("location:index.php");
         }
          
 }
 else{
    $_SESSION["err"]="logout";
    header("location:index.php");
 }
?>
<!DOCTYPE html>
<htm>
   <head>
         <title>Patient Login</title>
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
        <script type="text/javascript">
            $(document).ready(function(){
               $("#logout").click(function(){
                <?php $_SESSION["err"]="logout"; ?>
                  document.location="index.php";
               });

            });
            $(document).ready(function(){
            $('[data-toggle="popover"]').popover();   
            });
            </script>
      <style>
                t{
                float:right;
                }
    
         header {
              border: 0px ;
              margin-left: 0px;
              margin-top: 0px;
              margin-right: 0px;
              background-color: rgb(120, 8, 177);
              padding:10px;
         }
         table,th,tr {
             border:2px solid black;
             padding: 20px;
             table-collapse:collapse;
             font-size:large;
             white-space:nowrap;
             
         }
        
         </style>
   </head>
   <body class="alert-warning">
   <nav class="navbar navbar-inverse">
    <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php?err=0">Glucometer</a>
    </div>
    <ul class="nav navbar-nav">
    
    </ul>
    <t>
    <a href="#" title="Your Details" data-toggle="popover" data-trigger="focus" data-placement="bottom"  data-html="true" 
    data-content="You are logged in as Patient <br>Your Username
                                        <?php echo $_COOKIE['username'] ?> <br>Your Doctor: 
                                        <?php 
                                        $dbservername = 'localhost';//or localhost
                                        $dbname = 'project'; // your db_name
                                        $dbusername = 'root'; // root by default for localhost 
                                        $dbpassword = '';  // by defualt empty for localhost
                                        $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
                                        if ($conn->connect_error) {
                                        die('Connection failed: ' . $conn->connect_error);}
                                        $pname=$_COOKIE['username'];
                                        $sq='select mobile,email,createdby from users where username=\''.$pname.'\'';
                                        $result2 = $conn->query($sq);
                                        $row2 = $result2->fetch_assoc();
                                        echo $row2['createdby'];
                                        $conn->close();
                                        ?>">
    <h3 class="btn btn-default navbar-btn">Logged in  </h3></a>
    <button class="btn btn-danger" id="logout">Logout</button>
      </t>
  </div>
</nav>
<div class="container">

   <div class="row">
        <div class="col-sm-4">
            <br><br>

            <?php

            $dbservername = 'localhost';//or localhost
            $dbname = 'project'; // your db_name
            $dbusername = 'root'; // root by default for localhost 
            $dbpassword = '';  // by defualt empty for localhost


            $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
                $pname=$_COOKIE["username"];
                $sql1 = "select readtime,readvalue from readings where patientname='".$pname."'";
                $sq="select mobile,email from users where username='".$pname."'";
                //Table starst
                $result2 = $conn->query($sq);
                echo "<table><tr>";
                echo "<td  colspan='2' style='text-align:center;font-weight:bold;color:red;'>Your deatils</td></tr>";
                $row2 = $result2->fetch_assoc();
                echo "<tr><td>Your Name:</td><td>".$pname."</td></tr>";
                echo "<tr><td>Email Id: </td><td>".$row2['email']."</td></tr>";
                echo "<tr><td>Mobile Number: </td><td>".$row2['mobile']."</td></tr>";
                echo "</table>";
                //table to display deatils
                $result1 = $conn->query($sql1);
                echo "<h2 >Your Glucose Reading </h2>";
                echo "<table class=' alert-success table table-bordered table-hover table-condensed'><tr><th>Read Time</th><th>Read Value mg/dl</th></tr>";
                    
                while($row1 = $result1->fetch_assoc())
                {
                        echo "<tr><td>".$row1['readtime']."</td><td>".$row1['readvalue']."</td></tr>";
                }
               
                echo "</table>";

                
                

            $conn->close();


            ?>
            
        </div>
        <div class="col-sm-4"></div>
        <div class="col-sm-4"></div>
        <br>
        <br>
        <br>
        <br>
   <br>
   <br>
   </div>
 </div>
 <div class="container-fluid" >
   <div class="row text-center" style="padding:20px;color:black;left: 0;bottom: 0; right:0;">
        
     &copy; 2020 Department of Electronics and Communication <br> All Rights reserved
               
   </div>
</div>
</body>
</html>
