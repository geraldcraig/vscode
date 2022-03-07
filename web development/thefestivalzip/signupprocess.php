<?php

session_start();

include("conn.php");

$signup = $_POST['signupsubmit'];


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
        require("signup.php");
        exit();
    }

    if(empty($email)) {
        $isinvalid6 = "is-invalid";
        $usernameph = "Please enter a username";
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

    $readusername = "SELECT * FROM BACCOUNT WHERE username = '$usernameacc'";
    $checkusername = $conn->query($readusername);

    $countusername = mysqli_num_rows($readusername);

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

        header("Location: /thefestival/edit/admin.php");
                    exit();
            
        }

    }

}

?>