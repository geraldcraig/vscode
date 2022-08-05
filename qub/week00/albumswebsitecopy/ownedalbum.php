<?php

$currentUser = $_GET['user_name'];
$albumid = $_GET['album_id'];

$endpoint = "http://localhost/qub/week00/albumsapicopy/api.php?ownedalbum";

//$endpoint = "http://gcraig15.webhosting6.eeecs.qub.ac.uk/albumsapi/api.php?ownedalbum";

$postdata = http_build_query(

    array(
        'adduserid' => $currentUser,
        'addalbumid' => $albumid
    )

);

$opts = array(

    'http' => array(
        'method' => 'POST',
        'header' => 'Content-Type: application/x-www-form-urlencoded',
        'content' => $postdata
    )

    );

    $context = stream_context_create($opts);
    $resource = file_get_contents($endpoint, false, $context);

    echo $resource;

    if($resource != FALSE) {
        header("Location: index.php");
      } else {
        echo "Unable to add album play";
      }

?>