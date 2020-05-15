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
         if($result["login"]!="doctor")
         {
            $_SESSION["err"]="logout";
            header("location:index.php");  
         }
          
 }
 else
 {
   $_SESSION["err"]="logout";
   header("location:index.php"); 
 }
 
 $mysqli->close();
?>
<!DOCTYPE html>
<htm>
   <head>
         <title>Doctor Login</title>
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
         header {
              border: 0px ;
              margin-left: 0px;
              margin-top: 0px;
              margin-right: 0px;
              
              padding:10px;
         }
         
t{
float:right;


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
   <div class="form-group">        
                                          
                                            <?php if(isset($_SESSION["msg"]))
                                                         if($_SESSION["msg"]=="success")
                                                         {
                                                               echo "<script> alert('Sucessfully Registered!');</script>";
                                                               $_SESSION["msg"]="";
                                                         }
                                                         else if($_SESSION["msg"]=="failed")
                                                         {
                                                               echo "<script> alert('Registration failed');</script>"; 
                                                               $_SESSION["msg"]="";
                                                         }
                                                         else if($_SESSION["msg"]=="failed1")
                                                         {
                                                               echo "<script> alert('Username Already exists');</script>"; 
                                                               $_SESSION["msg"]="";
                                                         }
                                                         ?>
                                                         <?php
                                                         if(isset($_SESSION["Del"]))
                                                         {
                                                               if($_SESSION["Del"]=="s")
                                                               {
                                                                  echo"<script> alert('Record Deleted');</script>";
                                                                  $_SESSION["Del"]="";
                                                               }
                                                               else
                                                               if($_SESSION["Del"]=="f")
                                                               {
                                                                  echo"<script> alert('Failed to delete record');</script>";
                                                                  $_SESSION["Del"]="";
                                                               }
                                                            }
                                                         ?>
                                           
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php?err=0">Glucometer</a>
    </div>
    <ul class="nav navbar-nav">
    </ul>
    <t>
    <a href="#" title="Your Details" data-toggle="popover" data-trigger="focus" data-placement="bottom"  data-html="true" data-content="You are logged in as <?php echo $_COOKIE['username'] ?><br>Your Role is Doctor ">
    <h3 class="btn btn-default navbar-btn">Logged in  </h3></a>
    <button class="btn btn-danger" id="logout">Logout</button>
    <button class="btn btn-success" data-toggle="modal" data-target="#myModal">Add Patient Account</button>
    <button class="btn btn-warning" data-toggle="modal" data-target="#myModal1">Remove Patient Account</button>
      </t>
  </div>
</nav>

               <div class="modal fade" id="myModal" role="dialog">
                  <div class="modal-dialog">
                  
                     <!-- Modal content-->
                     <div class="modal-content">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add Patient Account</h4>
                     </div>
                     <div class="modal-body">
                                             <form class="form-horizontal" action="patientreg.php" method="post">
                                             <div class="form-group">
                                             <label class="control-label col-sm-2" for="email">Email:</label>
                                             <div class="col-sm-10">
                                             <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
                                             </div> </div>
                                             <div class="form-group">
                                             <label class="control-label col-sm-2" for="mobile">Mobile Number:</label>
                                             <div class="col-sm-10">
                                             <input type="text" class="form-control" id="mobile" pattern="[987]{1}[0-9]{9}" placeholder="Enter Mobile Number" name="mobile" required>
                                             </div> </div>
                                             <div class="form-group">
                                             <label class="control-label col-sm-2" for="uname">Username:</label>
                                             <div class="col-sm-10">
                                             <input type="text" class="form-control" id="uname" placeholder="Enter Username" name="uname" required>
                                             </div>
                                             </div>
                                          <div class="form-group">
                                             <label class="control-label col-sm-2" for="pwd">Password:</label>
                                             <div class="col-sm-10">          
                                             <input type="password" class="form-control" required id="pwd" placeholder="Enter password" name="pwd">
                                             </div>
                                          </div>
                                          
                                          <div class="form-group">        
                                             <div class="col-sm-offset-2 col-sm-10">
                                             <input type="submit" class="btn btn-success" value="Submit">
                                             <input type="reset" class="btn btn-warning" value="Reset">
                                             </div>
                                          </div>

                                       </form>
                                       
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                     </div>
                     </div>
                     
                  </div>
               </div>
               <!--Modal1 remoce-->
                              <div class="modal fade" id="myModal1" role="dialog">
                  <div class="modal-dialog">
                  
                     <!-- Modal content-->
                     <div class="modal-content">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Delete Patient Record</h4>
                     </div>
                     <div class="modal-body">
                                             <form class="form-horizontal" autocomplete="off" action="remove.php"method="post" onsubmit="return confirm('Do you really want to delete?');">
                                          <div class="form-group">
                                             <label class="control-label col-sm-2" for="patientlist">Select Patient:</label>
                                             <div class="col-sm-10">
                                             
                                             <select required name="patientlist" class="form-control" id="patientlist">
                                                <option value="">Patient to be deleted</option>
                                                <!--php code to retrive data -->
                                                <?php

                                                      $dbservername = 'localhost';//or localhost
                                                      $dbname = 'project'; // your db_name
                                                      $dbusername = 'root'; // root by default for localhost 
                                                      $dbpassword = '';  // by defualt empty for localhost
                                                      $docname=$_COOKIE["username"];

                                                      $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
                                                      if ($conn->connect_error) {
                                                         die("Connection failed: " . $conn->connect_error);
                                                      }

                                                      $sql = "SELECT username from users where login='patient' and createdby='$docname'";
                                                      $result = $conn->query($sql);

                                                         while($row = $result->fetch_assoc())
                                                         {
                                                            
                                                            $pname="Name: ".$row["username"];
                                                            $pp=$row["username"];
                                                            
                                                            echo "<option value='$pp'>".$pname."</option>";
                                                            
                                                            
                                                         }
                                                         
                                                                     
                                                      $conn->close();


                                                      ?>
                                             </select>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label class="control-label col-sm-2" for="docpwd">Password:</label>
                                             <div class="col-sm-10">          
                                             <input type="password" class="form-control" id="docpwd" placeholder="Enter Your password(not patient password)" name="docpwd">
                                             </div>
                                          </div>
                                       
               
                                          <div class="form-group">        
                                             <div class="col-sm-offset-2 col-sm-10">
                                             <button type="submit" class="btn btn-danger" id="delbtn">Delete</button>
                                             </div>
                                          </div>
                                       </form>
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                     </div>
                     </div>
                     
                  </div>
               </div>



<div class="container">
   <div class="row">
      <div class="col-sm-4">




<?php

$dbservername = 'localhost';//or localhost
$dbname = 'project'; // your db_name
$dbusername = 'root'; // root by default for localhost 
$dbpassword = '';  // by defualt empty for localhost


$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$docn=$_COOKIE["username"];
$sql = "SELECT distinct patientname from readings where doc='".$docn."'";
$result = $conn->query($sql);

    while($row = $result->fetch_assoc())
    {
        
        $pname=$row["patientname"];
        $sql1 = "select readtime,readvalue from readings where patientname='".$pname."'";
        $result1 = $conn->query($sql1);
       
        echo "<table class='table table-bordered table-hover table-condensed alert-success'><tr><th>Read Time</th><th>Read Value</th></tr>";
        
        while($row1 = $result1->fetch_assoc())
        {
            echo "<tr><td>".$row1['readtime']."</td><td>".$row1['readvalue']."</td></tr>";
        }
        echo "<h3 class='alert-danger'>Patient Name: ".$pname."</h1>";
        echo "</table>";
      
    }
    
                
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
        
     &copy; 2020 Department of Electronics and Communication <br>All Rights reserved
               
   </div>
</div>
<br>



   </body>
   </html>
