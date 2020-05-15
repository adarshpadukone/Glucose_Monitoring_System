<?php
session_start();
$dbservername = 'localhost';//or localhost
$dbname = 'project'; // your db_name
$dbusername = 'root'; // root by default for localhost 
$dbpassword = '';  // by defualt empty for localhost
//delete details
$pass=$_POST["pass"];
$user="";
if(isset($_SESSION["otp"]))
{
$user=$_SESSION["otp"];
}
$_SESSION["newpass"]="";
$_SESSION["otp"]="";

$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "UPDATE users SET password='".$pass."' WHERE username='".$user."'";

if ($conn->query($sql) === TRUE)
 {
    $_SESSION["passchange"]="s";
    
    header("location:index.php");
} else
 {
    echo "<script>alert('Failed to change Password');</script>";
}

$conn->close();
?>