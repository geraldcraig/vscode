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

if(!isset($_POST['acceptapp'])) {
    header("Location: admin.php");
  } else {
    $accept = $_POST['acceptapp'];
  }

$id = $_POST['rowid'];

// accept an artist, add them to artist table, create them a login account,
// create a random password for the account, assign the account to the artist
// & delete application from the applications table
if(isset($accept)) {

  $read = "SELECT * FROM BAPPLICATION WHERE pk_application_id = $id";
  $result = $conn->query($read);

  while($row = $result->fetch_assoc()) {
      $artist = $row['apply_name'];
      $email = $row['apply_email'];
      $website = $row['apply_url'];
      $id = $row['pk_application_id'];
      $image = $row['apply_image'];
      $video = $row['apply_video'];
      $genre = $row['fk_genre_id'];
      $bio = $row['apply_bio'];


      $artist = mysqli_real_escape_string($conn, $artist);
      $artistacc = str_replace(' ','',strtolower($artist));

      $email = mysqli_real_escape_string($conn, strtolower($email));
      $website = mysqli_real_escape_string($conn, $website);
      $image = mysqli_real_escape_string($conn, $image);
      $video = mysqli_real_escape_string($conn, $video);
      $genre = mysqli_real_escape_string($conn, $genre);
      $bio = mysqli_real_escape_string($conn, $bio);
      
      // generate a random password 12 characters long consisting of the detailed characters below
      $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!.-_+=';
      // echo substr(str_shuffle($permitted_chars), 0, 10);
      $randompassword = substr(str_shuffle($permitted_chars), 0, 12);

      
      // email process

      // Instantiation and passing `true` enables exceptions
      $mail = new PHPMailer(true);

      try {
          //Server settings
          // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                   // Enable verbose debug output
          $mail->isSMTP();                                            // Send using SMTP
          $mail->Host       = 'smtp.qub.ac.uk';                       // Set the SMTP server to send through
          $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
          $mail->Username   = '15316068';                             // SMTP username
          $mail->Password   = 'Effie21\.';                            // SMTP password
          $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
          $mail->Port       = 587;                                    // TCP port to connect to

          //Recipients
          $mail->setFrom('mwalsh28@qub.ac.uk', 'B Festival');
          $mail->addAddress($email);     // Add a recipient
          
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
                                  <p class='text-center text-break' style='padding: 10px; font-size: 6vw; font-width: bold;'>CONGRATULATIONS!</p>
                              </div>
                          
                          
                              <div class='col-12'>
                              <p>Hello and welcome to <strong>B Festival</strong>.  First of all, we would just like to say thank you 
                              for applying to be part of B Festival.  I hope you're as excited as we are to have you be part of this years Line Up!</p>
                              <p>An account has been created for you and a random password has been generated which is included below.  
                              It is recommended to change this at your earliest convience.  You will need to use the email address that was initially
                              provided to access your account.</p>
                              </div>

                              <div class='col-12  mt-2 mb-2'>
                                  <div class='d-flex justify-content-center'  style='border-radius: 2px; background: whitesmoke; padding: 10px;'>$artist</div>
                              </div>
                          
                              <div class='col-12 text-center mt-2 mb-2'>
                                  <div  style='border-radius: 2px; border: 1px solid gray;  padding: 10px;'>$randompassword</div>
                              </div>
                          
                              <div class='col-12 mt-2 mb-2'>
                                  <p><a href='http://mwalsh28.lampt.eeecs.qub.ac.uk/thefestival/login.php' 
                                  style='text-decoration: none; text-color'><button type='button' class='btn btn-outline-success'>
                                  Login</button></a></p>
                              </div>
                          
                          
                              <div class='col-12'>
                                  <p>Please feel free to update or amend your band bio with any further information you think your fans would like to know
                                  about, including;</p>
                                  <p>Band Members</p>
                                  <p>Releases</p>
                                  <p>Video</p>
                                  <p style='font-style: italic;'>N.B. please be aware the site is monitored by admins regularly.  If content deemed to be offensive has been uploaded
                                  or details that could be considered misleading or false have been amended, B Festival reserve the right to amend these details or 
                                  remove the artist from the festival.</p>
                                  <p>If you have any questions or queries you would like answered, please do not hesitate to contact us:</p>
                              </div>
                          
                          
                              <div class='col-12'>
                                  <a href='mailto:mwalsh28@qub.ac.uk?Subject=Artist%20Query' style='text-decoration: none;'>
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
          $mail->Subject = "Congratulations! You're part of B Festival!";
          $mail->Body    = $body;
          $mail->AltBody = strip_tags($body);

          $mail->send();
          
      } catch (Exception $e) {
          echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }


        $hash = password_hash($randompassword, PASSWORD_DEFAULT);

        $hashtest = password_hash($randompassword, PASSWORD_DEFAULT);
        $updateartistaccount = "INSERT INTO BACCOUNT(username, email, password, fk_privileges_id) 
        VALUES ('$artistacc', '$email', '$hashtest', 1501)";
        
        $processartistaccount = $conn->query($updateartistaccount); 

        $readaccountid = "SELECT pk_account_id FROM BACCOUNT WHERE username = '$artistacc' AND email = '$email'";
        $processaccountid = $conn->query($readaccountid);

        while($row = $processaccountid->fetch_assoc()) {
        $accountid = $row['pk_account_id'];
        }

        $updateartist = "INSERT INTO BARTIST(name, bio, image, url, video, fk_genre_id, fk_account_id) 
          VALUES ('$artist', '$bio', '$image', '$website', '$video', '$genre', $accountid)";
        $processupdate = $conn->query($updateartist); 

    }

  $delete = "DELETE FROM BAPPLICATION WHERE pk_application_id = $id";
  $processdelete = $conn->query($delete);

  $read = "SELECT * FROM BAPPLICATION";
  $result = $conn->query($read);

    $success =  "Application has been accepted.  
    An email has been sent to confirm the applicant of this action with their login details.";
    require("admin.php");
    exit();

} 

?>