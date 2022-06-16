<?php

//$albumid = $_GET['album_id'];
 
//$endpoint = "http://localhost/qub/week00/albumsapiold/api.php?deletealbum=$albumid";

//$endpoint = "http://gcraig15.webhosting6.eeecs.qub.ac.uk/api.php?deletealbum=$albumid";

//$result = file_get_contents($endpoint);

//$data = json_decode($result, true);

include('dbconn.php');

  $albumid = $conn->real_escape_string($_GET['album_id']);
    
  $insertquery="DELETE FROM album WHERE id = $albumid";
           
  $result = $conn->query($insertquery);
        
  if(!$result) {
            
    echo $conn->error;
        
  } else {

    header("Location: editalbums.php");

    // echo "Delete request performed";
            
  }

?>