<?php
session_start();
$dbservername = 'localhost';//or localhost
$dbname = 'project'; // your db_name
$dbusername = 'root'; // root by default for localhost 
$dbpassword = '';  // by defualt empty for localhost
$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

    $email=$_POST["email"];
    $mob=$_POST["mob"];
    $cser=mysqli_connect("localhost","root","","project") or die("connection failed:".mysqli_error());
    $res = mysqli_query($cser,"select * from users where mobile='$mob'and email='$email'");
    $result=mysqli_fetch_array($res);
    $m=$result["email"];
    $un=$result["username"];
    $otp = rand(1000,9999); //create random number
    /*
    Required only if we use our own mail id server
    require_once("mail_function.php");
   $mail_status = sendOTP($m,$otp);
   */
  //PHP mail
  $to = $m;
  $subject = "OTP to reset password";
  $txt = "Dear ".$un."\n\nThis is a system generated mail.\nDo not reply.\nOTP: ".$otp."\n\nThank You\nAdmin\n(http://gluco.dx.am)";
  $headers = "From: admin@gluco.dx.am" . "\r\n";
  $mail_status=mail($to,$subject,$txt,$headers);
  
   if($mail_status == 1)
   {

                        try
                  {
                  if (!($stmt = $conn->prepare("insert into otpstore(username,otp) VALUES (?,?)")))
                  {
                     echo "error preparing statement: ".$conn->error;
                  }
                  else if(!$stmt->bind_param("ss",$un, $otp))
                  {
                     echo "error binding params: ".$stmt->error;
                  }
                  else if(!$stmt->execute())
                  {
                       echo "error executing";
                  }
                  else{
                     //success exec
                     $_SESSION["otp"]=$un;
                     header("location:ottp.php");
                  }

                  $conn->close();
                  $stmt->close();
                  }
                  catch(Exception $e)
                  {
                    echo "error catched"; 
                  }

      $_SESSION["otp"]=$un;
      header("location:ottp.php");

   }  
 else
 {
    $_SESSION["em"]="f"; // echo "<script> alert('Invalid Mail ID');</script>";// this line not working
    header("location:rst.php");
 }
?>

