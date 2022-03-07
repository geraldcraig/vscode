<?php

session_start();

include("conn.php");

if(!isset($_POST['loginsubmit'])) {
    header("Location: login.php");
  } else {
    $signup = $_POST['loginsubmit'];
  }


if(isset($signup)) {

    $email = filter_input(INPUT_POST, 'emaillogin');
    $password = filter_input(INPUT_POST, 'passwordlogin');


    if(empty($email) && empty($password)) {
        $isinvalidall = "is-invalid";
        $emailph = "Please enter your email";
        $pwph = "Please enter your password";
        require("login.php");
        exit();
    }

    if(empty($email)) {
        $isinvalidemail = "is-invalid";
        $emailph = "Please enter your email";
        require("login.php");
        exit();
    }

    if(empty($password)) {
        $isinvalidpw = "is-invalid";
        $pwph = "Please enter your password";
        require("login.php");
        exit();
    }

    $readcredentials = "SELECT * FROM BACCOUNT WHERE email = '$email'";
    $checkemail = $conn->query($readcredentials);

    $countemail = mysqli_num_rows($checkemail);

    if(!$checkemail) {
        echo $conn->error;
    }

    else  {
        
        if ($countemail == 0) {
        $noemail = "email is incorrect";
        $isinvalidpw = "is-invalid";
        require("login.php");
        exit();
        
    } else {

            $accountid = "SELECT * FROM BACCOUNT WHERE email = '$email'"; 
            $accountidprocess = $conn->query($accountid);

            $row = $accountidprocess->fetch_assoc();

            $checkpw = $row['password'];

            if(!password_verify($password, $checkpw))
                {
                    $wrongpw = 'Incorrect password';
                    include('login.php');
                    exit();
                }

            $accountlogin = "SELECT pk_account_id, fk_privileges_id, username, email password FROM BACCOUNT WHERE email = '$email' AND password='$checkpw'"; 
            $accountloginprocess = $conn->query($accountlogin);

            $row = $accountloginprocess->fetch_assoc();

            $id = $row['pk_account_id'];
            $privileges = $row['fk_privileges_id'];
            $display = $row['username'];
            $email = $row['email'];

            $_SESSION['session'] = $id;
            $_SESSION['privileges'] = $privileges;
            $_SESSION['username'] = $display;

            header("Location: /thefestival/edit/admin.php");
            exit();
        }
    }
}



?>