<?php

    header("Content-Type: application/json");

    if ($_SERVER['REQUEST_METHOD']==='GET') {

        include ("dbconn.php");
    
        $read = "SELECT album.id, album.year, 
                album.title, artist.name, album.number
                FROM album
                INNER JOIN artist
                ON album.artist_id = artist.id
                ORDER BY album.number";
        
        $result = $conn->query($read);
        
        if (!$result) {
            echo $conn -> error;
        }
    
        // build a response array
        $api_response = array();
        
        while ($row = $result->fetch_assoc()) {
            
            array_push($api_response, $row);
        }
            
        // encode the response as JSON
        $response = json_encode($api_response);
        
        // echo out the response
        echo $response;

    }

     // API GET - with ?item query parameter
     if (($_SERVER['REQUEST_METHOD']==='GET') && (isset($_GET['item']))) {

        include ("dbconn.php");

        $itemid = $conn->real_escape_string($_GET['item']);

        $read = "SELECT * FROM album WHERE id='$itemid' ";

        $result = $conn->query($read);

        if (!$result) {
            echo $conn -> error;
        }

        // build a response array
        $api_response = array();

        while ($row = $result->fetch_assoc()) {
            
            array_push($api_response, $row);
        }
            
        // encode the response as JSON
        $response = json_encode($api_response);

        // echo out the response
        echo $response;
    }


    if (($_SERVER['REQUEST_METHOD']==='POST') && isset($_GET['newitem'])) {

        echo "API POST request called";

        include('dbconn.php');

        $myfactdata = $conn->real_escape_string($_POST['addfact']);
    
        $insertquery="INSERT INTO album (id, title) VALUES (null, '$myfactdata')";
           
        $result = $conn->query($insertquery);
        
        if(!$result) {
            
            echo $conn->error;
        
        } else {

            echo "POST request performed";
            
        }
    }

?>