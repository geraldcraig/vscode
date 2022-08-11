<?php

$userid = $_GET['userid'];

$endpoint = "http://localhost/qub/albumsapi/api.php?deleteuser";

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

  if ($resource !== FALSE) {

    header("Location: logout.php");
    
  } else {

    echo "Unable to delete user";
  }
?>

