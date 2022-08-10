<?php

$host = "mwalsh28.lampt.eeecs.qub.ac.uk";
$user = "mwalsh28";
$pw = "087KTcZP8N8mfPbM";
$db = "mwalsh28";

$conn = new mysqli($host, $user, $pw, $db);

if($conn->connect_error) {
    $check = "unable to connect".$conn->connect_error;
}

else {
    $check = "successfully connected to database";
}

?>