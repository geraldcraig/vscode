<?php

    header("Content-Type: application/json");

    if (($_SERVER['REQUEST_METHOD']==='GET')) {

        include("dbconn.php");

      // Using prepared statement (approach 1)
     
     $stmt = $conn->prepare("SELECT * FROM myquiz ");
     $stmt->execute();

     if (!$stmt) {
        echo $stmt->error;
     }

     // get the result set
     $result->$stmt->get_result();
    
        // build a response array
       /* $api_response = array();
        
        while ($row = $result->fetch_assoc()) {
            
            array_push($api_response, $row);
        }
            
        // encode the response as JSON
        $response = json_encode($api_response);
        
        // echo out the response
        echo $response;

     // close the statement
     //stmt->close();
*/
    }

     
?>