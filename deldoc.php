<?php
session_start();
$dbservername = 'localhost';//or localhost
$dbname = 'project'; // your db_name
$dbusername = 'root'; // root by default for localhost 
$dbpassword = '';  // by defualt empty for localhost
//delete details
$doc=$_POST["doct"];
$apas=$_POST["apass"];
$password="Admin@123()";
if($apas==$password)
{
    $sql="delete from users where username='$doc'";
    $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    if ($conn->query($sql) === TRUE) 
    {                    
    $_SESSION["doc"]="s";
    header("location:admin.php");                  
    } 
    else 
    {
    $_SESSION["doc"]="f";
    header("location:admin.php");  
    }
    $conn->close();
 }
else
{  
    $_SESSION["d"]="s";
    header("location:admin.php");  

}

?>