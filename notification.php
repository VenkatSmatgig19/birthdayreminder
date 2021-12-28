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

$tomorrow = date("Y-m-d", strtotime('tomorrow'));
$q="select * from employees where DATE_FORMAT(dob,'%m-%d')=DATE_FORMAT('$tomorrow','%m-%d')";
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
    $mail->Subject = 'Birthday Reminder';
    
    $mail->addAddress('type here receiver email', 'type here receiver name'); 
    
    $mail->addAddress('type here receiver email', 'type here receiver email');               
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');
       

    //Content
   

  $mail->Body="<div style='background-image: url(https://image.freepik.com/free-photo/abstract-grunge-decorative-relief-navy-blue-stucco-wall-texture-wide-angle-rough-colored-background_1258-28311.jpg);
    padding: 40px 0px;
    color:#fff;
    border: 5px solid #ffc46b;
    background-repeat: no-repeat;
    background-size: cover;'>
        <center>
            <h2>This is Reminder Tomorrow  </h2>
            <h3>$name</h3>
            <h2>Birthday</h2>
        </center>
    </div>";
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

$mail->send();

echo 'Message has been sened';
} catch (Exception $e) {
echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}