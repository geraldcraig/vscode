<?php
$host = "mwalsh28.lampt.eeecs.qub.ac.uk";
$pw= "087KTcZP8N8mfPbM";
$user="mwalsh28";
$db= "mwalsh28";

$conn = new mysqli($host,$user,$pw,$db);

if($conn->connect_error){
    echo "Connection failed: ".$conn->connect_error;
}



























