<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
include 'connection.php';

// $con = mysqli_connect('localhost','root','');

// mysqli_select_db($con, 'employees');



date_default_timezone_set('Asia/Kolkata');
$d=date('Y-m-d');
$q="select * from employees where DATE_FORMAT(dob,'%m-%d')=DATE_FORMAT('$d','%m-%d')";
$r=mysqli_query($con,$q);

$row=mysqli_fetch_assoc($r);

$email = $row['email']; 
$name = $row['fullname'];

echo "<br><br>";
echo '<b>Email:</b>' . $email . "<br>";
echo '<b>Name:</b>' . $name . "<br>";
/* end */


$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.example.com';                     
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'example@example.com';                     
    $mail->Password   = 'type here password';                              
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
    $mail->Port       = 465;                                    
    //Recipients
    $mail->setFrom('type here sender email', 'type here sender Name');
     $mail->isHTML(true);                                  
    $mail->Subject = 'Happy BirthDay';
    
    $mail->addAddress($email, $name);     
       

    //Content
   
  $mail->Body="<div style='background-image: url(https://image.freepik.com/free-photo/abstract-grunge-decorative-relief-navy-blue-stucco-wall-texture-wide-angle-rough-colored-background_1258-28311.jpg);
    padding: 40px 0px;
    color:#fff;
    border: 5px solid #ffc46b;
    background-repeat: no-repeat;
    background-size: cover;'>
        <center>
            <h1>Happy Birthday</h1>
            <h3>$name</h3>
            <img src='https://image.freepik.com/free-vector/flat-golden-circle-balloons-birthday-background_52683-34659.jpg' style='width:200px;height:150px;'>
            <p>We wish this Birthday all your dream do come true</p>

        </center>
    </div>";
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

$mail->send();

echo 'Message has been sened';
} catch (Exception $e) {
echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}