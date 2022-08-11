<?php

$currentUser = $_GET['user_name'];
$albumid = $_GET['album_id'];

$endpoint = "http://localhost/qub/albumsapicopy/api.php?deleteownedalbum";

//$endpoint = "http://gcraig15.webhosting6.eeecs.qub.ac.uk/albumsapi/api.php?deleteownedalbum";

$postdata = http_build_query(
    array(
        'deleteuser' => $currentUser,
        'deletealbumid' => $albumid
      )
  );

$opts = array(

  'http' => array(
    'method' => 'DELETE',
    'header' => 'Content-Type: application/x-www-form-urlencoded',
    'content' => $postdata
  )

);

$context = stream_context_create($opts);
$resource = file_get_contents($endpoint, false, $context);

echo $resource;

  if ($resource != FALSE) {

    header("Location: accountownedalbums.php");
    
  } else {

    echo "Unable to delete owned album";
  }
?>

