<?php
        $host = "localhost";
        $user = "root";
        $pw = "root";
        $db = "albumtest";
 
        $conn = new mysqli($host, $user, $pw, $db);
 
        if ($conn->connect_error) {
 
              $check = "Not connected ".$conn->connect_error;
 
        }
 ?>