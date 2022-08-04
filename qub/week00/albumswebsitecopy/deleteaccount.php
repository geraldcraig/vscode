<?php

$userid = $_GET['user'];

$endpoint = "http://localhost/qub/week00/albumsapicopy/api.php?deleteuser";

//$endpoint = "http://gcraig15.webhosting6.eeecs.qub.ac.uk/albumsapi/api.php?deleteuser";

$postdata = http_build_query(array('deleteid' => $userid));

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

    header("Location: editaccounts.php");
    
  } else {

    echo "Unable to delete user";
  }
?>

