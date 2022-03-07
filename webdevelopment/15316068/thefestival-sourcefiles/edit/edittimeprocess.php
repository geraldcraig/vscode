<?php

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

// edit the artists allocated timeslot (incase there are time clashes or schedule changes)

if(!isset($_POST['amendtime'])) {
  header("Location: admin.php");
} else {
  $amendtime = $_POST['amendtime'];
}

$amendtimeslot = $_POST['perfid'];
$artisttimeid = $_POST['artistid'];

if(isset($amendtime)) {

  // get original timeslot and make it available
  $getoriginaltime = "SELECT fk_performance_id FROM BARTIST WHERE pk_artist_id = $artisttimeid";
  $processgetoriginaltime = $conn->query($getoriginaltime);

  $row = $processgetoriginaltime->fetch_assoc();
  $origperf = $row['fk_performance_id'];

  $timeslotavail = "UPDATE BPERFORMANCE SET is_taken = 0 WHERE pk_performance_id = $origperf";
  $processtimeslotavail = $conn->query($timeslotavail);

  // update artist with new timeslot
  $updatetimeslot = "UPDATE BARTIST SET fk_performance_id = $amendtimeslot WHERE pk_artist_id = $artisttimeid";
  $updatetimeslotdb = $conn->query($updatetimeslot);

  //allocate timeslot so no other artist can have the same timeslot
  $fillslot = "UPDATE BPERFORMANCE SET is_taken = 1 WHERE pk_performance_id = $amendtimeslot";
  $processfillslot = $conn->query($fillslot);

  $getartisttime = "SELECT * FROM BARTIST 
  INNER JOIN BACCOUNT ON fk_account_id = pk_account_id
  INNER JOIN BPERFORMANCE ON fk_performance_id = pk_performance_id 
  INNER JOIN BTIME ON fk_time_id = pk_time_id
  INNER JOIN BDATE ON fk_date_id = pk_date_id
  INNER JOIN BVENUE ON fk_venue_id = pk_venue_id
  WHERE pk_artist_id = $artisttimeid";
  $processgetartisttime = $conn->query($getartisttime);

  while($row = $processgetartisttime->fetch_assoc()) {
      $email = $row['email'];
      $artist = $row['name'];
      $venue = $row['venue_name'];
      $date = $row['date'];
      $start = $row['start_time'];
      $startdisp = date('g:ia', strtotime("$start"));
      $end = $row['end_time'];
      $enddisp = date('g:ia', strtotime("$end"));

        $day = date('l', strtotime($date));
        $dayth = date('j', strtotime($date));
        $days = date('S', strtotime($date));
        $month = date('F', strtotime($date));
        $year = date('Y', strtotime($date));
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
          
          $body = "
          <!DOCTYPE html>              
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
                              <p class='text-center text-break' style='padding: 10px; font-size: 6vw; font-width: bold;'>Your Time slot has been changed</p>
                          </div>

                          <div class='col-12'>
                          <p>Your time slot has been changed successfully!</p>
                          <p>Hopefully this suits you and your fans!</p>
                          <p>Your new time slot has been detailed below</p>
                          </div>


                          <div class='col-12'>
                          <table class='table table-striped'>
                              <thead>
                              </thead>
                              <tbody>
                                  <tr>
                                  <td width='40%'>Venue</td>
                                  <td width='60%'>$venue</td>
                                  </tr>
                                  <tr>
                                  <td width='40%'>Date</td>
                                  <td width='60%'>$day $dayth$days $month $year</td>
                                  </tr>
                                  <tr>
                                  <td width='40%'>Time</td>
                                  <td width='60%'>$startdisp - $enddisp</td>
                                  </tr>
                              </tbody>
                              </table>
                          </div>


                          <div>
                          <p>If there are any queries or concerns regarding your allocated time slot, please get in touch as soon as possible.  
                          We can't guarantee that this timeslot can be changed, but we will do everything we can to accommodate for any and every circumstance.</p>
                          </div>

                          <div class='col-12'>
                              <p>Get in touch below:</p>
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
          $mail->Subject = "$artist, your time slot has been changed.";
          $mail->Body    = $body;
          $mail->AltBody = strip_tags($body);

          $mail->send();
          
      } catch (Exception $e) {
          echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }

  $success = "Artists allocated time slot has been updated successfully! 
  An email has been sent to the relevant artist detailing the change.";
  require("admin.php");
  exit();

}
?>