<?php

    session_start();

    $uname = $_POST["uname"];
    $upass = $_POST["pword"];

    $checkuser = "SELECT * FROM mysolarusers WHERE username ='$uname' AND userpass = MD5('$upass') ";

    $result = $conn->query($checkuser);
    
    if (!$result) {
	    echo $conn->error;
    }

    $endpoint = "http://localhost/webdev/week00/solarsystemapi/api.php?user=$checkuser";

    $resource = file_get_contents($endpoint);

    $data = json_decode($resource, true);

    $num = $result->num_rows;

    if ($num > 0) {
        $_SESSION['editpermission123'] = $uname;
	    header("Location: index.php");
    } else {
	    header("Location: login.php");
    }
?>