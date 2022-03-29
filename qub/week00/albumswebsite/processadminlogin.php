<?php

    session_start();

    include("dbconn.php");

    $uname = $_POST["username"];
    $upass = $_POST["password"];

    $checkuser = "SELECT * FROM user WHERE username ='$uname' AND userpassword = '$upass' ";

    $result = $conn->query($checkuser);
    
    if (!$result) {
	    echo $conn->error;
    }

    $num = $result->num_rows;

    if ($num > 0 && $uname == 'admin') {
        $_SESSION['admin'] = $uname;
	    header("Location: adminaccount.php");
    } else {
	    header("Location: adminlogin.php");
    }
?>