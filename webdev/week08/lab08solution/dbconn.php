<?php
    $host = "localhost";
    $user = "testuser";
    $pass = "password";
    $db = "mytestdb";

    $conn = new mysqli($host, $user, $pass, $db);

    if ($conn -> connect_error) {
        echo "there has been an error ".$conn->connect_error;
    }
?> 
