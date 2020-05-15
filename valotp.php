<?php
session_start();
$dbservername = 'localhost';//or localhost
$dbname = 'project'; // your db_name
$dbusername = 'root'; // root by default for localhost 
$dbpassword = '';  // by defualt empty for localhost
if(isset($_SESSION["otp"]))
{
    $user=$_SESSION["otp"];
    $otpl=$_POST["otp"];
    $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
    $cser=mysqli_connect("localhost","root","","project") or die("connection failed:".mysqli_error());
    $res = mysqli_query($cser,"select * from otpstore where username='$user'");
    $result=mysqli_fetch_array($res);
    $otp=$result["otp"];
    if($otp==$otpl)
    {
        $sql="delete from otpstore where username='$user'";
        $conn->query($sql);
        $_SESSION["newpass"]="s";
        header("location:newpass.php");

    }
    else
    {
        //if otp is invalid
        $_SESSION["v"]="f"; //put f instead of 
        header("location:ottp.php");
    }

}

?>