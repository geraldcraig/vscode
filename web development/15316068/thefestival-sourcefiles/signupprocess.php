<?php

session_start();

include("conn.php");

if(!isset($_POST['signupsubmit'])) {
    header("Location: signup.php");
  } else {
    $signup = $_POST['signupsubmit'];
  }

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
      require 'edit/vendor/autoload.php';


if(isset($signup)) {

    $username = filter_input(INPUT_POST, 'usernamesignup');
    $usernameacc = str_replace(' ','',strtolower($username));
    $email = strtolower(filter_input(INPUT_POST, 'emailsignup'));
    $password = filter_input(INPUT_POST, 'passwordsignup');
    $passwordverify = filter_input(INPUT_POST, 'passwordverifysignup');

    $passwordlength = strlen($password);
    $passwordlengthverify = strlen($passwordverify);

    if(empty($username) && empty($email) && empty($password) && empty($passwordverify)) {

        $isinvalidall = "is-invalid";
        $usernameph = "Please enter a username";
        $emailph = "Please enter your email";
        $pwph = "Please enter your password";
        $pwvph = "Please verify your password";
        require("signup.php");
        exit();
    }

    
    if(empty($email) && empty($password) && empty($passwordverify)) {

        $isinvalid1 = "is-invalid";
        $emailph = "Please enter your email";
        $pwph = "Please enter your password";
        $pwvph = "Please verify your password";
        require("signup.php");
        exit();
    }

    if(empty($password) && empty($passwordverify)) {

        $isinvalid2 = "is-invalid";
        $pwph = "Please enter your password";
        $pwvph = "Please verify your password";
        require("signup.php");
        exit();
    }


    if(empty($username) && empty($email) && empty($password)) {

        $isinvalid3 = "is-invalid";
        $usernameph = "Please enter a username";
        $emailph = "Please enter your email";
        $pwph = "Please enter your password";
        require("signup.php");
        exit();
    }

    if(empty($username) && empty($email)) {

        $isinvalid4 = "is-invalid";
        $usernameph = "Please enter a username";
        $emailph = "Please enter your email";
        require("signup.php");
        exit();
    }

    

    if(empty($username)) {
        
        $isinvalid5 = "is-invalid";
        $usernameph = "Please enter a username";
        $emailph = "Please enter your email";
        require("signup.php");
        exit();
    }

    if(empty($email)) {
        $isinvalid6 = "is-invalid";
        $usernameph = "Please enter a username";
        $emailph = "Please enter your email";
        require("signup.php");
        exit();
    }

    if(empty($password)) {
        $isinvalid7 = "is-invalid";
        $pwph = "Please enter your password";
        require("signup.php");
        exit();
    }

    if(empty($passwordverify)) {
        
        $isinvalid8 = "is-invalid";
        $pwvph = "Please verify your password";
        require("signup.php");
        exit();
    }

    if($password !== $passwordverify) {
        $password_confirm_error = "Your passwords do not match.  Please re enter your password";

        require("signup.php");
        exit();
    }

    if($passwordlength < 8 || $passwordlengthverify < 8) {
        $password_length_error = "Your password must be at least 8 characters";

        require("signup.php");
        exit();
    }

    
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email format";
          require("signup.php");
        exit();
        }
      


    $readcredentials = "SELECT * FROM BACCOUNT WHERE email = '$email'";
    $checkemail = $conn->query($readcredentials);

    $countemail = mysqli_num_rows($checkemail);

    // $readusername = "SELECT * FROM BACCOUNT WHERE username = '$usernameacc'";
    // $checkusername = $conn->query($readusername);

    // $countusername = mysqli_num_rows($readusername);

    if(!$checkemail) {
        echo $conn->error;
    }

    else  {
        if ($countemail != 0) {
        $emailtaken = "This email is already in use";
        require("signup.php");
        exit();

        } 
        
        else {
        
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $createaccount = "INSERT INTO BACCOUNT(username, email, password, fk_privileges_id) VALUES ('$usernameacc', '$email', '$hashed_password', 1502)";
        // AES_ENCRYPT(password,'$password')
        $createaccountprocess = $conn->query($createaccount);



        // email process

      // Instantiation and passing `true` enables exceptions
      $mail = new PHPMailer(true);

      try {
          //Server settings
          // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
          $mail->isSMTP();                                            // Send using SMTP
          $mail->Host       = 'smtp.qub.ac.uk';                    // Set the SMTP server to send through
          $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
          $mail->Username   = '15316068';                     // SMTP username
          $mail->Password   = 'Effie21\.';                               // SMTP password
          $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
          $mail->Port       = 587;                                    // TCP port to connect to

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
                                        <p class='text-center text-break' style='padding: 10px; font-size: 3em; font-width: bold;'>Welcome to the party! $username</p>
                                    </div>
                                
                                
                                    <div class='col-12'>
                                        <p>Hello and welcome to <strong>B Festival</strong>.  First of all, we would just like to say thank you 
                                        for joining our festival.  I hope you're as excited as we are about this years Line Up!</p>
                                        <p>Your account has been created with the email and password you used to sign up. You can login below:</p>
                                    </div>
                                
                                
                                    <div class='col-12'>
                                        <p><a href='http://mwalsh28.lampt.eeecs.qub.ac.uk/thefestival/login.php' 
                                        style='text-decoration: none; text-color'><button type='button' class='btn btn-outline-success'>
                                        Login</button></a></p>
                                    </div>
                                
                                
                                    <div class='col-12'>
                                        <p>From here, you can select you favourite artists and plan who you want to see!</p>
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
          $mail->Subject = "Hello & Welcome from B Festival";
          $mail->Body    = $body;
          $mail->AltBody = strip_tags($body);

          $mail->send();
      } catch (Exception $e) {
          echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }

        header("Location: /thefestival/edit/admin.php");
                    exit();
            
        }

    }

}

?>