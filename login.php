<?php

session_start();
$databaseHost = 'localhost';//or localhost
$databaseName = 'project'; // your db_name
$databaseUsername = 'root'; // root by default for localhost 
$databasePassword = '';  // by defualt empty for localhost

$username=$_POST["username"];
$password=$_POST["pass"];
$login=$_POST["login"];

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
 
if( isset($_POST["username"]) && isset($_POST["pass"])) 
{
    $cser=mysqli_connect("localhost","root","","project") or die("connection failed:".mysqli_error());
    $res = mysqli_query($cser,"select * from users where username='$username'and password='$password'and login='$login'");
    $result=mysqli_fetch_array($res);
    if($result)
    {
	    setcookie ("username",$result["username"],time() + (86400 * 30));
        setcookie ("password",$result["password"],time() + (86400 * 30));
        setcookie ("login",$result["login"],time() + (86400 * 30));
        if($result["login"]=="doctor")
            header("location:doctor.php");
        else if($result["login"]=="patient")
            header("location:patient.php");
    }
    else
    {
        $_SESSION["err"]="invalid";
       header("location:index.php");
    }
}

?>