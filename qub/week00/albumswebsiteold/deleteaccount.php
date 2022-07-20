<?php

//session_start();

//$userid =$_GET['user'];
 
//$endpoint = "http://localhost/qub/week00/albumsapiold/api.php?deleteuser=$userid";

//$endpoint = "http://gcraig15.webhosting6.eeecs.qub.ac.uk/albumsapi/api.php?userid=$userid";
 
//$result = file_get_contents($endpoint);
 
//$data = json_decode($result, true);

include('dbconn.php');

  $userid = $conn->real_escape_string($_GET['user']);

  //$username = 'sailor';

  //$userid = "SELECT id from user where username = 'sailor' ";

  $user = "DELETE FROM album_plays WHERE user_id = 5";
  $insertquery="DELETE FROM user WHERE id =  $userid ";
           
  $result = $conn->query($insertquery);
        
  if(!$result) {
            
    echo $conn->error;
        
  } else {

    header("Location: editaccounts.php");

    // echo "Delete request performed";
            
  }
 
?>
