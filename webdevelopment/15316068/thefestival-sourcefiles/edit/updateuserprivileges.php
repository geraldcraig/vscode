<?php

// referenced from https://stackoverflow.com/questions/6249707/check-if-php-session-has-already-started
// if a session has already started with the presence of require later in the code, ignore this session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

include("../conn.php");

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

$privileges = $_SESSION['privileges'];
$display = $_SESSION['username'];
$sessiondetails = $_SESSION['session'];

if(!isset($_SESSION['session'])) {
    header("Location: ../login.php");
    exit();
  }

  if(!isset($_POST['updateprivileges'])) {
    header("Location: admin.php");
  } else {
    $updatepriv = $_POST['updateprivileges'];
  }

  $privileges = $_POST['privileges'];
  $account = $_POST['rowid'];

  if(isset($updatepriv)) {

    $getemail = "SELECT * FROM BACCOUNT WHERE pk_account_id = $account";
    $processgetemail = $conn->query($getemail);

    $row = $processgetemail->fetch_assoc();
    $email = $row['email'];
    $username = $row['username'];
    $priv = $row['fk_privileges_id'];

    if ($priv == 1502) {


    // email process

      // Instantiation and passing `true` enables exceptions
      $mail = new PHPMailer(true);

      try {
          //Server settings
          // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                     // Enable verbose debug output
          $mail->isSMTP();                                              // Send using SMTP
          $mail->Host       = 'smtp.qub.ac.uk';                         // Set the SMTP server to send through
          $mail->SMTPAuth   = true;                                     // Enable SMTP authentication
          $mail->Username   = '15316068';                               // SMTP username
          $mail->Password   = 'Effie21\.';                              // SMTP password
          $mail->SMTPSecure = 'tls';                                    // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
          $mail->Port       = 587;                                      // TCP port to connect to

          //Recipients
          $mail->setFrom('mwalsh28@qub.ac.uk', 'B Festival');
          $mail->addAddress($email);     // Add a recipient
          
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
                              <p class='text-center text-break' style='padding: 10px; font-size: 6vw; font-width: bold;'>Your Admin privileges have changed.</p>
                          </div>
                      
                      
                          <div class='col-12'>
                          <p>With great power, comes great responsibility</p>
                          <p>You have been been granted full admin permissions.</p>
                          <p>You are no longer able to create your own schedule.</p>  
                          <p>If these privileges were granted in error, 
                          please contact us <strong>immediately</strong> so we can restore the correct privileges to your account:</p>
                          </div>

                          <div class='col-12 mb-2'>
                              <a href='mailto:mwalsh28@qub.ac.uk?Subject=Priviliges%20Query' style='text-decoration: none;'>
                              <button type='button' class='btn btn-outline-warning'>Contact Us</button></a>
                          </div>
                      
                          <div class='col-12 mb-2'>
                              <p>Otherwise you can login here:</p>
                          </div>
                      
                          <div class='col-12'>
                              <a href='http://mwalsh28.lampt.eeecs.qub.ac.uk/thefestival/login.php' style='text-decoration: none;'>
                              <button type='button' class='btn btn-outline-success'>Login</button></a>
                          </div>
                  
                          <div class='footer-copyright text-center py-3'>© 2020 Copyright: Matt Walsh</div>
                      </div>
                  </div>
              </div>
              
          </body>
      </html>";
          

          // Content
          $mail->isHTML(true);                                  // Set email format to HTML
          $mail->Subject = "Your Admin privileges have changed $username";
          $mail->Body    = $body;
          $mail->AltBody = strip_tags($body);

          $mail->send();
      } catch (Exception $e) {
          echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }

    } else {


        // email process

      // Instantiation and passing `true` enables exceptions
      $mail = new PHPMailer(true);

      try {
          //Server settings
          // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                     // Enable verbose debug output
          $mail->isSMTP();                                              // Send using SMTP
          $mail->Host       = 'smtp.qub.ac.uk';                         // Set the SMTP server to send through
          $mail->SMTPAuth   = true;                                     // Enable SMTP authentication
          $mail->Username   = '15316068';                               // SMTP username
          $mail->Password   = 'Effie21\.';                              // SMTP password
          $mail->SMTPSecure = 'tls';                                    // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
          $mail->Port       = 587;                                      // TCP port to connect to

          //Recipients
          $mail->setFrom('mwalsh28@qub.ac.uk', 'B Festival');
          $mail->addAddress($email);     // Add a recipient
          
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
                              <p class='text-center text-break' style='padding: 10px; font-size: 6vw; font-width: bold;'>Your Admin privileges have changed.</p>
                          </div>
                      
                      
                          <div class='col-12'>
                          <p>You no longer have full admin permissions</p>
                          <p>You are no longer able to manage B Festival.</p>  
                          <p>Your account has been granted public permissions.</p>  
                          <p>If these privileges were changed in error, 
                          please contact us <strong>immediately</strong> so we can restore your user privileges:</p>
                          </div>

                          <div class='col-12 mb-2'>
                              <a href='mailto:mwalsh28@qub.ac.uk?Subject=Priviliges%20Query' style='text-decoration: none;'>
                              <button type='button' class='btn btn-outline-warning'>Contact Us</button></a>
                          </div>
                      
                          <div class='col-12 mb-2'>
                              <p>Otherwise you can login here:</p>
                          </div>
                      
                          <div class='col-12 mb-2'>
                              <a href='http://mwalsh28.lampt.eeecs.qub.ac.uk/thefestival/login.php' style='text-decoration: none;'>
                              <button type='button' class='btn btn-outline-success'>Login</button></a>
                          </div>
                  
                          <div class='footer-copyright text-center py-3'>© 2020 Copyright: Matt Walsh</div>
                      </div>
                  </div>
              </div>
              
          </body>
      </html>";
          

          // Content
          $mail->isHTML(true);                                  // Set email format to HTML
          $mail->Subject = "Your Admin privileges have changed $username";
          $mail->Body    = $body;
          $mail->AltBody = strip_tags($body);

          $mail->send();
      } catch (Exception $e) {
          echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }


    }

    $updateprivilege = "UPDATE BACCOUNT SET fk_privileges_id= $privileges WHERE pk_account_id = $account";
    $processprivupdate = $conn->query($updateprivilege);

    $success =  "$username's privileges have been amended successfully.  
    An email has been sent to confirm them of this action.";
    require("admin.php");
    exit();
  }


  ?>