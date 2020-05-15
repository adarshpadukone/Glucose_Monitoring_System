<?php
session_start();
$dbservername = 'localhost';//or localhost
$dbname = 'project'; // your db_name
$dbusername = 'root'; // root by default for localhost 
$dbpassword = '';  // by defualt empty for localhost
//delete details
$patid=$_POST["patientlist"];
$docpas=$_POST["docpwd"];
if($docpas==$_COOKIE["password"])
{
$sql="delete from users where username='$patid'";
$sql1="delete from readings where patientname='$patid'";

                //Delete from user table
                $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                }

                if ($conn->query($sql) === TRUE) 
                {                    
                       if ($conn->query($sql1) === TRUE) 
                        {
                            $_SESSION["Del"]="s";
                            header("location:doctor.php");  
                         } 
                         else 
                        {
                            $_SESSION["Del"]="f";
                            header("location:doctor.php");  
                        }
                 
                                   
                } 
                else 
                {
                    $_SESSION["Del"]="f";
                    header("location:doctor.php");  
                }
              
                $conn->close();


}

?>