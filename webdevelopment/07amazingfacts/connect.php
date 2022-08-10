<?php

$password="087KTcZP8N8mfPbM";
$user = "mwalsh28";
$webserver="mwalsh28.lampt.eeecs.qub.ac.uk";
$db = "mwalsh28";   

$conn = new mysqli($webserver, $user, $password, $db);  

if($conn->connect_error){
    echo "Connection failed: ".$conn->connect_error;
}
