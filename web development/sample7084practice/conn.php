<?php

    $webserver = "mwalsh28.lampt.eeecs.qub.ac.uk";
    $user = "mwalsh28";
    $pw = "087KTcZP8N8mfPbM";
    $wb = "mwalsh28";

    $conn = new mysqli($webserver, $user, $pw, $wb);

    if($conn->connect_error) {
        echo "Connection Failed".$conn->connect_error;
    }
?>