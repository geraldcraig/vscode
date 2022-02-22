<?php

    header("Content-Type: application/json");

    if ($_SERVER['REQUEST_METHOD']==='GET') {

        include ("dbconn.php");
    
        $read = "SELECT mytopalbums.id, mytopalbums.year, 
                mytopalbums.title, mytopartists.name
                FROM mytopalbums
                INNER JOIN mytopartists
                ON mytopalbums.artist_id = mytopartists.id";
        
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


    if (($_SERVER['REQUEST_METHOD']==='POST') && (isset($_GET['newfact']))) {

        include('dbconn.php');

        $myfactdata = $conn->real_escape_string($_POST['addfact']);

        $insertquery="INSERT INTO mytopartists (name) VALUES ('$myfactdata')";
           
        $result = $conn->query($insertquery);
        
        if(!$result) {
            
            echo $conn->error;
        
        } else {

            echo "POST request performed";
            
        }
    }

?>