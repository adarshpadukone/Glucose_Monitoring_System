<?php
session_start();
$dbservername = 'localhost';//or localhost
$dbname = 'project'; // your db_name
$dbusername = 'root'; // root by default for localhost 
$dbpassword = '';  // by defualt empty for localhost
//delete details
$reguser=$_POST["uname"];
$regmob=$_POST["mobile"];
$regemail=$_POST["email"]; 
$regpwd=$_POST["pwd"];
$reglogin="patient";
$docname=$_COOKIE["username"];

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
else if(!$stmt->bind_param("ssssss", $reguser, $regpwd, $reglogin,$regemail,$regmob,$docname))
{
    echo "error binding params: ".$stmt->error;
}
else if(!$stmt->execute())
{
      $_SESSION["msg"]="failed1";
    header("location:doctor.php");  
}
else{
    $_SESSION["msg"]="success";
header("location:doctor.php"); 
}

$conn->close();
$stmt->close();
}
catch(Exception $e)
{
    $_SESSION["msg"]="failed";
    header("location:doctor.php");   
}
?>