<?php

    $endpoint = "http://localhost/webdev/week00/albumsapi/api.php?user";

    $resource = file_get_contents($endpoint);

    $data = json_decode($resource, true);

    session_start();

    $uname = $_POST["username"];
    $upass = $_POST["password"];

    $checkuser = "SELECT * FROM user WHERE username ='$uname' AND userpassword = SHA1('$upass') ";

    $result = $conn->query($checkuser);
    
    if (!$result) {
	    echo $conn->error;
    }

    $num = $result->num_rows;

    if ($num > 0) {
        $_SESSION['editpermission123'] = $uname;
	    header("Location: index.php");
    } else {
	    header("Location: login.php");
    }
?>