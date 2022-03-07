<?php
//include password
$pw="087KTcZP8N8mfPbM";
//declare MySQL username
$user = "mwalsh28";
//declare webserver
$webserver = "mwalsh28.lampt.eeecs.qub.ac.uk";
$db = "mwalsh28";

//mysqli api library in PHP to connect to the DB
$conn = mysqli_connect($webserver, $user, $pw, $db);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error() );
}
