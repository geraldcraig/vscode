<?php

    session_start();

    //include("dbconn.php");

    $endpoint = "http://localhost/qub/week00/albumsapi/api.php?user";

    $result = file_get_contents($endpoint);

    $data = json_decode($result, true);

    $uname = $_POST["username"];
    $upass = $_POST["password"];

    $checkuser = "SELECT * FROM user WHERE username ='$uname' AND userpassword = '$upass' ";

    $result = $conn->query($checkuser);
    
    if (!$result) {
	    echo $conn->error;
    }

    $num = $result->num_rows;

    if ($num > 0) {
        $_SESSION['user'] = $uname;
	    header("Location: index.php");
    } else {
	    header("Location: login.php");
    }
?>