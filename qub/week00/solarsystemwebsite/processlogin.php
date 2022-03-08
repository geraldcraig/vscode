<?php

    session_start();

    $uname = $_POST["admin"];

    $endpoint = "http://localhost/qub/week00/solarsystemapi/api.php?user=$uname";

    $resource = file_get_contents($endpoint);

    $data = json_decode($resource, true);


    $checkuser = "SELECT * FROM mysolarusers WHERE username ='$uname' ";

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