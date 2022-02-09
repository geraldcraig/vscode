<?php
        $host = "localhost";
        $user = "root";
        $pw = "root";
        $db = "albums";
 
        $conn = new mysqli($host, $user, $pw, $db);
 
        if ($conn->connect_error) {
 
              $check = "Not connected ".$conn->connect_error;
 
        }
 ?>