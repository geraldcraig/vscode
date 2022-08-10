<?php

include("../conn.php");

include_once('../PHPMailer/src/PHPMailer.php');
include_once('../PHPMailer/src/SMTP.php');

$accept = $_POST['acceptapp'];
$id = $_POST['rowid'];



if (isset($accept)) {


   

    
  
      $msj="My complete message";
      $mail = new PHPMailer\PHPMailer\PHPMailer();
      $mail->IsSMTP(); // enable SMTP
      $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
      //authentication SMTP enabled
      $mail->SMTPAuth = true; 
      $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
      $mail->Host = "smtp.gmail.com";
      //indico el puerto que usa Gmail 465 or 587
      $mail->Port = 465; 
      $mail->Username = "mysticrecords@hotmail.com";
      $mail->Password = "Effie21\.";
      $mail->SetFrom("mysticrecords@hotmail.com","Name");
      $mail->AddReplyTo("mysticrecords@hotmail.com","Name Replay");
      $mail->Subject = "Test";
      $mail->MsgHTML($msj);
      $mail->AddAddress("mysticrecords@hotmail.com");
  
   if(!$mail->Send()) {
      echo "Mailer Error: " . $mail->ErrorInfo;
   } else {
      echo "Message has been sent";
   }
   }
  ?>
    


?>
			