<?php

    header("Content-Type: application/json");
 
   // function to create a 2D array used for the response
    function get_read_response() {
 
        $api_response = array();
   
        $client1 = array('name'=>'John','car'=>'YUI 3456','startdate'=>'19-11-2020','days'=>'3');
        $client2 = array('name'=>'Paul','car'=>'BYG 9476','startdate'=>'20-11-2020','days'=>'2');
        $client3 = array('name'=>'Ringo','car'=>'DRU 1975','startdate'=>'12-11-2020','days'=>'7');
        $client4 = array('name'=>'George','car'=>'GUI 6486','startdate'=>'01-11-2020','days'=>'8');
   
        array_push($api_response, $client1);
        array_push($api_response, $client2);
        array_push($api_response, $client3);
        array_push($api_response, $client4);
   
        // encode the response as JSON
        $response = json_encode($api_response);
 
        // echo out the response
        echo $response;

        // api for GET

   
    }

    // api for GET at /read
    if (isset($_GET["read"])) {

        // return the response to the client
        get_read_response();
    }
 
?>