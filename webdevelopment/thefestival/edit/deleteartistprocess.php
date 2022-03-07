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


// remove an artist from the festival and any details relating to them 
// from the database (account, members etc).

if(!isset($_POST['deleteartist'])) {
    header("Location: admin.php");
  } else {
    $deleteartist = $_POST['deleteartist'];
  }

$artistid = $_POST['rowid'];
$email = $_POST['email'];

if(isset($deleteartist)) {

$readid = "SELECT * FROM BARTIST 
INNER JOIN BACCOUNT ON fk_account_id = pk_account_id WHERE pk_artist_id =  $artistid";
$proreadid = $conn->query($readid);

while($row = $proreadid->fetch_assoc()) {
  $accid = $row['fk_account_id'];
  $username = $row['username'];
  $performance = $row['fk_performance_id'];
}



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
                              <p class='text-center text-break' style='padding: 10px; font-size: 6vw; font-width: bold;'>You are no longer part of B Festival.</p>
                          </div>
                      
                      
                          <div class='col-12'>
                          <p>Unfortunately with heavy hearts, we have had to <strong>remove</strong> you from B Festival.</p>
                          <p>We hate having to do this, but unfortunately there was no other choice.</p>
                          <p>Your account has been deleted, along with any other detail relating to you and you no longer have artist priviliges.</p>
                          </div>
                      
                      
                          <div class='col-12'>
                              <p>If you have any questions or queries you would like answered, please do not hesitate to contact us:</p>
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
          $mail->Subject = "You are no longer part of B Festival.";
          $mail->Body    = $body;
          $mail->AltBody = strip_tags($body);

          $mail->send();
      } catch (Exception $e) {
          echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }

$timeslotavail = "UPDATE BPERFORMANCE SET is_taken = 0 WHERE pk_performance_id = $performance";
$processtimeslotavail = $conn->query($timeslotavail);

$deleteaccount = "DELETE FROM BACCOUNT WHERE pk_account_id = $accid";
$deleteaccountdb = $conn->query($deleteaccount);

$artistdelete = "DELETE FROM BARTIST WHERE pk_artist_id = $artistid";
$deleteartistdb = $conn->query($artistdelete);


$success =  "$username has been removed from B festival Successfully.  
An email has been sent to confirm them of this action.";
require("admin.php");
exit();

} 

?>