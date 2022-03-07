<?php

session_start();

include("../conn.php");

if(!isset($_POST['changepassword'])) {
    header("Location: admin.php");
} else {
    $changepassword = $_POST['changepassword'];
}

$privileges = $_SESSION['privileges'];
$display = $_SESSION['username'];
$sessiondetails = $_SESSION['session'];

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';


if(isset($changepassword)) {

    $password = filter_input(INPUT_POST, 'newchangepassword');
    $passwordverify = filter_input(INPUT_POST, 'changepasswordverify');

    $passwordlength = strlen($password);
    $passwordlengthverify = strlen($passwordverify);

    if(empty($password)) {
        $isempty = "Your password has NOT been changed.  Your password must be at least 8 characters and cannot be empty.";
        require("admin.php");
        exit();
    }

    if(empty($passwordverify)) {
        
        $isempty = "Your password has NOT been changed.  Your password must be at least 8 characters.";
        require("admin.php");
        exit();
    }

    if($password !== $passwordverify) {
        $password_confirm_error = "Your password has NOT been changed. Your passwords do not match.";
        require("admin.php");
        exit();
    }

    if($passwordlength < 8 || $passwordlengthverify < 8) {
        $password_length_error = "Your password has NOT been changed.  Your password must both be at least 8 characters.";
        require("admin.php");
        exit();
    }
        
    if(($passwordlength >= 8 && $passwordlengthverify <= 60) && $password == $passwordverify) {

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $updatepassword = "UPDATE BACCOUNT SET password = '$hashed_password' WHERE pk_account_id = $sessiondetails";
        $updatepasswordquery = $conn->query($updatepassword);

        $getemail = "SELECT email FROM BACCOUNT where pk_account_id = $sessiondetails";
        $getemailquery = $conn->query($getemail);

        while($row = $getemailquery->fetch_assoc()) {
            $email = $row['email'];
        }

    // email process

    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

      try {
          //Server settings
          // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                         // Enable verbose debug output
          $mail->isSMTP();                                                  // Send using SMTP
          $mail->Host       = 'smtp.qub.ac.uk';                             // Set the SMTP server to send through
          $mail->SMTPAuth   = true;                                         // Enable SMTP authentication
          $mail->Username   = '15316068';                                   // SMTP username
          $mail->Password   = 'Effie21\.';                                  // SMTP password
          $mail->SMTPSecure = 'tls';                                        // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
          $mail->Port       = 587;                                          // TCP port to connect to

          //Recipients
          $mail->setFrom('mwalsh28@qub.ac.uk', 'B Festival');
          $mail->addAddress($email);                                        // Add a recipient
          
          $body = "<!DOCTYPE html>              
                    <head>
                        <meta charset='UTF-8'>
                        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                        <meta http-equiv='X-UA-Compatible' content='ie=edge'>

                        <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' 
                        integrity='sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh' crossorigin='anonymous'>

                        <link href='https://fonts.googleapis.com/css?family=Permanent+Marker&display=swap' rel='stylesheet'>
                        
                    </head>
                    <body>
                        <div class='container' style='display: flex; justify-content: center; margin-left: auto; margin-right: auto;'>
                            <div class='outer-panel text-center rounded' style='padding: 2% 2%;
                            background-color: lightgrey; min-width: 95%;'>
                                <div class='inner-panel rounded' style=' box-shadow: 1px 2px 10px black; 
                                background-color: white; padding: 2%; min-width: 85%;'>

                                <div class='row text-center'>
                                    <div class='col-12'>
                                        <img src='http://mwalsh28.lampt.eeecs.qub.ac.uk/thefestival/img/navbarlogo.png' alt='B Festival Logo' 
                                        width='200'  />
                                    </div>
                                </div>
                                
                                    <div class='col-12'>
                                        <p class='text-center text-break' style='padding: 10px; font-size: 3em; font-width: bold;'>$display, your password has been changed</p>
                                    </div>
                                
                                
                                    <div class='col-12'>
                                        <p>Your password has been changed <strong>successfully</strong>.  You can now login to your account 
                                        using your email address and password:</p>
                                        
                                    </div>
                                
                                
                                    <div class='col-12'>
                                        <p><a href='http://mwalsh28.lampt.eeecs.qub.ac.uk/thefestival/login.php' 
                                        style='text-decoration: none; text-color'><button type='button' class='btn btn-outline-success'>
                                        Login</button></a></p>
                                    </div>
                                
                                
                                    <div class='col-12'>
                                        <p>If you have forgotten your password, you can reset it from the link below:</p>
                                    </div>

                                    <div class='col-12'>
                                        <p><a href='http://mwalsh28.lampt.eeecs.qub.ac.uk/thefestival/forgotpassword.php' 
                                        style='text-decoration: none; text-color'><button type='button' class='btn btn-outline-secondary'>
                                        Reset Password</button></a></p>
                                    </div>

                                    <div class='col-12'>
                                        <p>If you have any further queries, please do not hesitate to contact us:</p>
                                    </div>
                                
                                
                                    <div class='col-12'>
                                        <a href='mailto:mwalsh28@qub.ac.uk?Subject=User%20Query' style='text-decoration: none;'>
                                        <button type='button' class='btn btn-outline-secondary'>Reach Out</button></a>
                                    </div>
                            
                                    <div class='footer-copyright text-center py-3'>© 2020 Copyright: Matt Walsh</div>
                                </div>
                            </div>
                        </div>
                        
                    </body>
                </html>";
          

          // Content
          $mail->isHTML(true);                                  // Set email format to HTML
          $mail->Subject = "Your password has been changed successfully!";
          $mail->Body    = $body;
          $mail->AltBody = strip_tags($body);

          $mail->send();
      } catch (Exception $e) {
          echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }

      $success = "Your password has been changed successfully!";
            require("admin.php");
            
        }

    }

?>