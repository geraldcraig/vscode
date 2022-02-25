<?php

    session_start();

    include("dbconn.php");

    $uname = $_POST["uname"];
    $upass = $_POST["pword"];

    $checkuser = "SELECT * FROM user WHERE first_name ='$uname' AND password = '$upass' ";

    $result = $conn->query($checkuser);
    
    if (!$result) {
	    echo $conn->error;
    }

    $num = $result->num_rows;

    if ($num > 0) {
        $_SESSION['editpermission123'] = $uname;
	    header("Location: userindex.php");
    } else {
	    header("Location: login.php");
    }
?>