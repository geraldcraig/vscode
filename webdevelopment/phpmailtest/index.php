<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                       // Enable verbose debug output
    $mail->isSMTP();                                                // Send using SMTP
    $mail->Host       = 'smtp.qub.ac.uk';                           // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                       // Enable SMTP authentication
    $mail->Username   = '15316068';                                 // SMTP username
    $mail->Password   = 'Effie21\.';                                // SMTP password
    $mail->SMTPSecure = 'tls';                                      // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                        // TCP port to connect to

    //Recipients
    $mail->setFrom('mwalsh28@qub.ac.uk', 'B Festival');
    $mail->addAddress('mysticrecords@hotmail.com');     // Add a recipient
    
    $body = "<table style='width: auto; '>
                <tr>
                <th align='center' style='padding: 10px;'>
                    <img src='http://mwalsh28.lampt.eeecs.qub.ac.uk/thefestival/img/navbarlogo.png' alt='B Festival Logo' 
                    width='200' border='0' style='display: block;' />
                </th>
                </tr>
                <tr>
                <th align='center' style='padding: 10px; font-size: 3em;'>CONGRATULATIONS!</th>
                </tr>
                <tr>
                <td align='center' style='padding: 10px;'>
                <p>Hello and welcome to <strong>B Festival</strong>.  First of all, we would just like to say thank you 
                for applying to be part of B Festival.  I hope you're as excited as we are to have you be part of this years Line Up!</p>
                <p>An account has been created for you and a random password has been generated which is included below.  
                It is recommended to change this at your earliest convience.  You will need to use the email address that was initially
                provided to access your account.</p>
                </td>
                </tr>
                <tr>
                <td align='center' style='border: 1px solid gray; background: whitesmoke; padding: 10px;'>Username</td>
                </tr>
                <tr>
                <td align='center' style='border: 1px solid gray;  padding: 10px;'>Password</td>
                </tr>
                <tr>
                <td align='center' style='border: 1px solid gray;  padding: 10px;'>
                <a href='http://mwalsh28.lampt.eeecs.qub.ac.uk/thefestival/login.php' style='text-decoration: none;'>Login</a></td>
                </tr>
                <tr>
                <td align='center' >
                <p>Please feel free to update or amend your band bio with any further information you think your fans would like to know
                about, including;
                </p>
                
                <p>Band Members</p>
                <p>Releases</p>
                <p>Video</p>
               
                <p style='font-style: italic;'>N.B. please be aware the site is monitored by admins regularly.  If content deemed to be offensive has been uploaded
                or details that could be considered misleading or false have been amended, B Festival reserve the right to amend these details or 
                remove the artist from the festival.
                </p>
                <p>If you have any questions or queries you would like answered, please do not hesitate to contact us:
                </p>
               </td>
                </tr>
                <tr>
                <td align='center' style='border: 1px solid gray;  padding: 10px;'>
                <a href='mailto:mwalsh28@qub.ac.uk?Subject=Artist%20Query' style='text-decoration: none;' target='_top'>Reach Out</a></td>
                </tr>
                </table>";
     

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Welcome to B Festival!';
    $mail->Body    = $body;
    $mail->AltBody = strip_tags($body);

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}