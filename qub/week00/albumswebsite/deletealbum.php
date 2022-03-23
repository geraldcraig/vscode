<?php

$albumid = $_GET['album_id'];
 
$endpoint = "http://localhost/qub/week00/albumsapi/api.php?deletealbum=$albumid";

$result = file_get_contents($endpoint);

$data = json_decode($result, true);

?>