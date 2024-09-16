<?php
$connection = mysqli_connect("localhost","root","","billing");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function sendemail_verify($first_name,$verify_token,$email)
{

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = "smtp";
$mail->SMTPDebug  = 1;  
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port       = 587;
$mail->Host       = "smtp.gmail.com";
$mail->Username   = "sathishkumar@gmail.com";
$mail->Password   = "kysmsath@123456789";

$mail->IsHTML(true);
$mail->AddAddress($email);
$mail->SetFrom("sathishkumar66925@gmail.com",$first_name);
//$mail->AddReplyTo("reply-to-email@domain", "reply-to-name");
//$mail->AddCC("cc-recipient-email@domain", "cc-recipient-name");
$mail->Subject = "Email Verification from Glorious web tech";
$content = " <h2> You have registered with Glorious web tech </h2>
<h5> verify your email address to login with the below link </h5>
<br></br>
<a href='http://localhost/php/main/verifyemail.php?token=$verify_token'> Click Me </a>";
$mail->MsgHTML($content); 
if(!$mail->Send()) {
  echo "Error while sending Email.";
  var_dump($mail);
} else {
  echo "Email sent successfully";
}
 
}


if(isset($_POST['registerbtn']))
{
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['password_confirmation']);
    $usertype = $_POST['usertype'];
    $verify_token=md5(rand());

     $email_query = "SELECT * FROM register WHERE email='$email' ";
     $email_query_run = mysqli_query($connection, $email_query);
     if(mysqli_num_rows($email_query_run) > 0)
     {
         $_SESSION['status'] = "Email Already Taken. Please Try Another one.";
         $_SESSION['status_code'] = "error";
         header('Location: reg.php');  
     }
     else
     {
         if($password === $cpassword)
         {
             $query = "INSERT INTO register (firstname,lastname,verify_token,email,password,confirmpassword,usertype) VALUES ('$first_name','$last_name','$verify_token','$email','$password','$cpassword','$usertype')";
             $query_run = mysqli_query($connection, $query);
             
             if($query_run)
             {
                 sendemail_verify("$first_name","$verify_token","$email");
                 //echo "Saved";
                 $_SESSION['success'] = "Registration successfull..!! Please Verify Email address..!!";
                 $_SESSION['status_code'] = "success";
                 header('Location: login.php');
             }
             else 
             {
                 $_SESSION['status'] = "Admin Profile Not Added";
                 $_SESSION['status_code'] = "error";
                 header('Location: reg.php');  
             }
         }
         else 
         {
             $_SESSION['status2'] = "Password and Confirm Password Does Not Match";
             $_SESSION['status_code'] = "warning";
             header('Location: reg.php');  
         }
     }
 
 }
