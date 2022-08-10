<?php

    include("../dbconn.php");
    
    $update_id = $conn->real_escape_string($_POST["idField"]);
    $update_name = $conn->real_escape_string($_POST["nameField"]);
    
    $updateSQL="UPDATE myoscars SET movie='$update_name' 
    WHERE id='$update_id' ";
    
    $result = $conn->query($updateSQL);
    
    if (!$result) {
      echo $conn->error;    
    } else {
      echo "<p>Update successful <a href='../index.php'>Back to Movies</a></p>";
    }

?>
