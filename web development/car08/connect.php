<?php
//declare password
$pw="087KTcZP8N8mfPbM";

//declare MySQL username
$user = "mwalsh28";

//declare webserver
$webserver = "mwalsh28.lampt.eeecs.qub.ac.uk";

//declare DB  
$db = "mwalsh28";

//mysqli api library in PHP to connect to the DB
$conn = new mysqli($webserver, $user, $pw, $db);

if($conn->connect_error){
    echo "Connection failed: ".$conn->connect_error;
}

