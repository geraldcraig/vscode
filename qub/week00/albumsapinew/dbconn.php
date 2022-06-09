<?php
        //$host = "localhost";
        //$user = "root";
        //$pw = "root";
        //$db = "recordwebsite";

        $host = "gcraig15.webhosting6.eeecs.qub.ac.uk";
        $user = "gcraig15";
        $pw = "MRhywzRGBkvs2Fg3";
        $db = "gcraig15";
 
        $conn = new mysqli($host, $user, $pw, $db);
 
        if ($conn->connect_error) {
 
              $check = "Not connected ".$conn->connect_error;
 
        }
 ?>