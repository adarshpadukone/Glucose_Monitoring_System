<?php
session_start();
if(isset($_SESSION["doc"]))
 if($_SESSION["doc"]=="s")
{
 echo "<script> alert('Sucessfully Deleted Doctor Record');</script>";
 $_SESSION["doc"]="";
 }
 else if($_SESSION["doc"]=="f")
 {
  echo "<script> alert('Failed to delete DoctorRecord');</script>"; 
    $_SESSION["doc"]="";
  }

  if(isset($_SESSION["docmsg"]))
  if($_SESSION["docmsg"]=="success")
 {
    echo "<script> alert('Sucessfully Registered!');</script>";
    $_SESSION["docmsg"]="";
  }
  else if($_SESSION["docmsg"]=="failed")
  {
        echo "<script> alert('Registration failed');</script>"; 
        $_SESSION["docmsg"]="";
  }
  else if($_SESSION["docmsg"]=="failed1")
  {
        echo "<script> alert('Username Already exists');</script>"; 
        $_SESSION["docmsg"]="";
  }

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
        <script>
            function validater()
            {
                var v=prompt("Enter Admin Password to continue","");
                var v1='<?php echo "Admin@123()"; ?>';
                if(v1==v)
                    return true;
                else
                    alert("Invalid admin Password");
                    return false;
            }
        </script>

        <link rel="stylesheet" href="css/bootstrap.min.css";>
        <style>
        /*body{
            background-color: darkorchid;
         }*/
        </style>
    </head>
    <body class="alert-warning">
        <nav class="navbar navbar-inverse">
        <div class="container-fluid">
        <div class="navbar-header">
        <a class="navbar-brand" href="#">Administrator</a>
        </div>
    
        </div>
         </nav>
        <div class="container">
       

        <div class="row">
            <div class="col-sm-4">
                
                <form action="adddoc.php" autocomplete="off" method="POST" onsubmit="return validater();">
                    <div class="form-group">
                        <h2 class=" text-center">Add Doctor</h2>
                    </div>
                    <div class="form-group">
                        <label for="email">Email :</label>
                        <input type="mail" placeholder="Enter Email id"  class="form-control" id="email" name="email"  required>
                    </div>
                    <div class="form-group">
                        <label for="email">Mobile Number :</label>
                        <input type="text" placeholder="Enter mobile number"  class="form-control" id="mob" name="mob" pattern="[987]{1}[0-9]{9}" required>
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
                    <input type="submit" class="btn btn-success" value="Create">&nbsp;&nbsp;&nbsp;&nbsp;
                        <input  type="reset" class="btn btn-danger" value="Reset">
                    </div>
                </form>
        </div>
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
        <form action="deldoc.php" autocomplete="off" method="POST">
                    <div class="form-group">
                        <h2 class=" text-center">Remove Doctor Record</h2>
                    </div>
                    <div class="form-group">
                        <label for="doct">Select Doctor :</label>
                        <select required name="doct" class="form-control" id="doct">
                        <option value="">Doctor to be deleted</option>
                        <!--php code to retrive data -->
                        <?php
                        $dbservername = 'localhost';//or localhost
                        $dbname = 'project'; // your db_name
                        $dbusername = 'root'; // root by default for localhost 
                        $dbpassword = '';  // by defualt empty for localhost
                        $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
                        if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                            }
                        $sql = "SELECT username from users where login='doctor'";
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
                    <div class="form-group">
                        <label for="apass">Admin Password :</label>
                        <input type="password" id="apass" class="form-control" name="apass" required placeholder="Enter admin password">
                    </div>
                    <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Delete">&nbsp;&nbsp;&nbsp;&nbsp;
                        <input  type="reset" class="btn btn-danger" value="Reset">
                    </div>
                    <div class="form-group text-center alert-danger">
            <?php if(isset($_SESSION["d"]))
                if($_SESSION["d"]=="s")
                {
                echo "Invalid Admin Password";
                $_SESSION["d"]="";
                }
                ?>
                </div>
            </form>

        </div>
    </div>
    
    <div class="row"><br><br><br><Br><br><Br>
        <div class="col-sm-12  text-center">
        &copy; 2020 Department of Electronics and Communication <br>All Rights reserved
        </div>          
    </div>
</div>
   <br>
</body>
</html>