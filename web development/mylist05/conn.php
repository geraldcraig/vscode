<?php

$webserver = "mwalsh28.lampt.eeecs.qub.ac.uk";
$user = "mwalsh28";
$pw = "087KTcZP8N8mfPbM";
$db = "mwalsh28";

$conn = new mysqli($webserver, $user, $pw, $db);

if($conn->connect_error) {
    echo "Connection failed ".$conn->connect_error;
}

?>