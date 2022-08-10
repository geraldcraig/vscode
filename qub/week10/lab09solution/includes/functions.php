<?php

    function update_movie($update_id, $update_name, $update_win) {
        
        include("../dbconn.php");
        
        $update_id = $conn->real_escape_string($update_id);
        $update_name = $conn->real_escape_string($update_name);
        $update_win = $conn->real_escape_string($update_win);
        
        $updateSQL="UPDATE myoscars 
                    SET movie='$update_name', winner='$update_win' 
                    WHERE id='$update_id' ";
        
        $result = $conn->query($updateSQL);
        
        if (!$result) {
            echo $conn->error;  
        } else {
            echo "<p>Update successful <a href='../index.php'>Back to Movies</a></p> ";
        }
    }

?>
