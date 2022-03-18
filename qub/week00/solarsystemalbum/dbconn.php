<?php
        $host = "localhost";
        $user = "testuser";
        $pw = "password";
        $db = "records";
 
        $conn = new mysqli($host, $user, $pw, $db);
 
        if ($conn->connect_error) {
 
              $check = "Not connected ".$conn->connect_error;
 
        }
 ?>








