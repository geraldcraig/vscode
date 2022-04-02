<?php

    header("Content-Type: application/json");

    if (($_SERVER['REQUEST_METHOD']==='GET') && (isset($_GET['album_id']))) {

        include ("dbconn.php");
        $albumid = $conn->real_escape_string($_GET['album_id']);

        //$userid = $conn->real_escape_string($_GET['userid']);
    
        //$read = "SELECT * FROM user WHERE id = $userid";

        $read = "SELECT review.rating, review.review, user.username FROM review
        INNER JOIN user
        ON review.user_id = user.id 
        WHERE album_id = $albumid";
        
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


    if (($_SERVER['REQUEST_METHOD']==='POST') && (isset($_GET['newuser'])) && (!isset($_GET['newalbum']))) {

        include('dbconn.php');

        $newfirstname = $conn->real_escape_string($_POST['addfirstname']);
        $newlastname = $conn->real_escape_string($_POST['addlastname']);
        $newusername = $conn->real_escape_string($_POST['addusername']);
        $newpassword = $conn->real_escape_string($_POST['addpassword']);
    
        $insertquery="INSERT INTO user (firstname, lastname, username, userpassword) VALUES ('$newfirstname', '$newlastname', '$newusername', '$newpassword')";
           
        $result = $conn->query($insertquery);
        
        if(!$result) {
            
            echo $conn->error;
        
        } else {

            echo "POST request performed";
            
        }
    }


?>