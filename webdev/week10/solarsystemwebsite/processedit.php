<?php

    include("dbconn.php");
    
    $update_desc = $conn->real_escape_string($_POST["newDesc"]);
    $update_id = $conn->real_escape_string($_POST["id"]);
    
    $updateSQL="UPDATE mysolarsystem SET description = '$update_desc' 
    WHERE id ='$update_id' ";
    
    $result = $conn->query($updateSQL);
    
    if (!$result) {
      echo $conn->error;    
    } else {
      header("Location: index.php");
      exit();
    }
?>