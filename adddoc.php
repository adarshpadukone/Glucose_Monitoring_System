<?php
session_start();
$dbservername = 'localhost';//or localhost
$dbname = 'project'; // your db_name
$dbusername = 'root'; // root by default for localhost 
$dbpassword = '';  // by defualt empty for localhost
//delete details
$reguser=$_POST["username"];
$regmob=$_POST["mob"];
$regemail=$_POST["email"]; 
$regpwd=$_POST["pass"];
$reglogin="doctor";
$cb="";

$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

try
{
if (!($stmt = $conn->prepare("insert into users(username, password, login, email,mobile,createdby) VALUES (?,?,?,?,?,?)")))
{
    echo "error preparing statement: ".$conn->error;
}
else if(!$stmt->bind_param("ssssss", $reguser, $regpwd, $reglogin,$regemail,$regmob,$cb))
{
    echo "error binding params: ".$stmt->error;
}
else if(!$stmt->execute())
{
      $_SESSION["docmsg"]="failed1";
    header("location:admin.php");  
}
else{
    $_SESSION["docmsg"]="success";
header("location:admin.php"); 
}

$conn->close();
$stmt->close();
}
catch(Exception $e)
{
    $_SESSION["docmsg"]="failed";
    header("location:admin.php");   
}
?>