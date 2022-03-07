<?php

session_start();

include("conn.php");

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'edit/vendor/autoload.php';

if(!isset($_POST['forogtsubmit'])) {
    header("Location: login.php");
  } else {
    $forgotpassword = $_POST['forogtsubmit'];
  }

if(isset($forgotpassword)) {

    $email = filter_input(INPUT_POST, 'emaillogin');
    $email = mysqli_real_escape_string($conn, strtolower($email));

    if(empty($email)) {
        $isinvalidemail = "is-invalid";
        $emailph = "Please enter your email";
        require("forgotpassword.php");
        exit();
    }

    $readcredentials = "SELECT * FROM BACCOUNT WHERE email = '$email'";
    $checkemail = $conn->query($readcredentials);

    $row = $checkemail->fetch_assoc();
    $accid = $row['pk_account_id'];

    $countemail = mysqli_num_rows($checkemail);

    if(!$checkemail) {
        echo $conn->error;
    }

    else  {
        
        if ($countemail == 0) {
        $noemail = "This email does not exist.";
        $isinvalidpw = "is-invalid";
        require("forgotpassword.php");
        exit();
        
    } else { 

        // generate a random password 12 characters long consisting of the detailed characters below
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!.-_+=';
        // echo substr(str_shuffle($permitted_chars), 0, 10);
        $randompassword = substr(str_shuffle($permitted_chars), 0, 12);

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
          $mail->addAddress($email);                                     // Add a recipient
          $mail->addCC('mwalsh28@qub.ac.uk');

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
                              <p class='text-center text-break' style='padding: 10px; font-size: 6vw; font-width: bold;'>Your password has been reset.</p>
                          </div>
                      
                      
                          <div class='col-12'>
                          <p>Your password has been <strong>reset</strong> successfully.</p>
                          <p>Below is your new password:</p>
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
                              <p>If you have any questions or queries you would like answered, please do not hesitate to contact us:</p>
                          </div>
                      
                      
                          <div class='col-12'>
                              <a href='mailto:mwalsh28@qub.ac.uk?Subject=General%20Query' style='text-decoration: none;'>
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
      $mail->Subject = "Your password has been reset.";
      $mail->Body    = $body;
      $mail->AltBody = strip_tags($body);

      $mail->send();
      
  } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }

    $hash = password_hash($randompassword, PASSWORD_DEFAULT);

    $updatepassword = "UPDATE BACCOUNT SET password='$hash' WHERE pk_account_id = $accid";
    $processupdatepassword = $conn->query($updatepassword);

    

    echo '<!DOCTYPE html>
            
            <html>
            
            <head>
            
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
            
                <title>Login | B Festival</title>
                <!-- favicon -->
                <link rel="shortcut icon" type="image/png" href="img/herologo.png">
            
                <!-- individual font and stylesheets -->
                <link rel="stylesheet" href="css/custom.css" type="text/css">
                <link rel="stylesheet" href="css/fontello.css" type="text/css">
                
                <!-- framework links and scripts -->';

                include("modules/framework.html");
                
            
                echo '<!-- jQuery scrips and animations -->
                <script src="scripts/script.js"></script>
                <script src="scripts/accordian.js"></script>
                <script src="scripts/login.js"></script>
            
                <!-- navbar animation specific to each page -->
                <script>
                // navbar highlighted animation (this needs implemented on each page)
                $(function() {
                    $("#contactus a").attr("class", "nav-link");
                    $("#contactus a").hover(function() {
                    $("#contactus a").attr("class", "nav-link active");
                    });
            
                    $("#contactus a").attr("class", "nav-link");
                    $("#contactus a").mouseout(function() {
                    $("#contactus a").attr("class", "nav-link");
                    });
                });
                </script>
                
            </head>
            
            <body>
            
                <!-- include navbar -->';
            
                include("modules/navbar.php");
                
            
                echo'<div class="admin container">
                <h1 class="biotitle text-center">Forgot Password</h1>
                
                    <div class="form-row">
                    <div class="form-group col text-center">
                        <h1 class="text-success"> Password reset successfully</h1>
                    </div>
                    </div>
                    <div class="form-row">
                    <div class="form-group col text-center">
                    <h1 class="text-success display-1"><i class="icon-ok-circled"></i></h1>
                    </div>
                    </div>
                    
            
                </div>
            
                <!-- footer -->';
            
                include("modules/footer.html");
            
            echo'</body>
            </html>';

    }

    }
}
?>
