<?php

    header("Content-Type: application/json");

    if (($_SERVER['REQUEST_METHOD']==='GET') && (!isset($_GET['album'])) && (!isset($_GET['userid'])) && (!isset($_GET['user'])) && (!isset($_GET['artist'])) && (!isset($_GET['filter']))) {

        include ("dbconn.php");
    
        $read = "SELECT album.id, album.number, album.title, album.image, artist.name, year.year FROM album
        INNER JOIN artist 
        ON album.artist_id = artist.id
        INNER JOIN year 
        ON album.year_id = year.id";
        
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

    if (($_SERVER['REQUEST_METHOD']==='GET') && (!isset($_GET['album'])) && (!isset($_GET['userid'])) && (!isset($_GET['user'])) && (isset($_GET['artist'])) && (!isset($_GET['filter']))) {

        include ("dbconn.php");
    
        $read = "SELECT * FROM artist";
        
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

    if (($_SERVER['REQUEST_METHOD']==='GET') && (!isset($_GET['userid'])) && (!isset($_GET['album'])) && (!isset($_GET['user'])) && (!isset($_GET['artist'])) && (isset($_GET['filter']))) {

        include ("dbconn.php");

        $filterdata = $conn->real_escape_string($_GET['filter']);
    
        $filterquery = "SELECT album.id, album.number, album.title, album.image, artist.name, year.year FROM album
        INNER JOIN artist 
        ON album.artist_id = artist.id
        INNER JOIN year 
        ON album.year_id = year.id WHERE name='$filterdata' ";

        $result = $conn -> query($filterquery);
        
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

    if (($_SERVER['REQUEST_METHOD']==='GET') && (!isset($_GET['userid'])) && (isset($_GET['album'])) && (!isset($_GET['user'])) && (!isset($_GET['artist'])) && (!isset($_GET['filter']))) {

        include ("dbconn.php");

        $itemid = $conn->real_escape_string($_GET['album']);
    
        $read = "SELECT album.id, album.number, album.title, album.image, artist.name, year.year, user.username, review.rating, review.review FROM album
        INNER JOIN artist 
        ON album.artist_id = artist.id
        INNER JOIN year 
        ON album.year_id = year.id
        INNER JOIN review
        ON album.id = review.album_id
        INNER JOIN user
        ON review.user_id = user.id
        WHERE number = $itemid";
        
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

    if (($_SERVER['REQUEST_METHOD']==='GET') && (!isset($_GET['album'])) && (!isset($_GET['userid'])) && (isset($_GET['user'])) && (!isset($_GET['artist'])) && (!isset($_GET['filter']))) {

        include ("dbconn.php");
    
        $read = "SELECT * FROM user";
        
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

    if (($_SERVER['REQUEST_METHOD']==='GET') && (!isset($_GET['album'])) && (!isset($_GET['user'])) && (isset($_GET['userid'])) && (!isset($_GET['artist'])) && (!isset($_GET['filter']))) {

        include ("dbconn.php");

        $userid = $conn->real_escape_string($_GET['userid']);
    
        $read = "SELECT * FROM user WHERE id = $userid";
        
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


    if (($_SERVER['REQUEST_METHOD']==='POST') && (isset($_GET['newuser'])) && (!isset($_GET['newalbum'])) && (!isset($_GET['deleteuser']))) {

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

    if (($_SERVER['REQUEST_METHOD']==='POST') && (!isset($_GET['newuser'])) && (!isset($_GET['newalbum'])) && (isset($_GET['deleteuser']))) {

        include('dbconn.php');

        $userid = $conn->real_escape_string($_GET['deleteuser']);
    
        $insertquery="DELETE FROM user WHERE id = $userid";
           
        $result = $conn->query($insertquery);
        
        if(!$result) {
            
            echo $conn->error;
        
        } else {

            echo "Delete request performed";
            
        }
    }

    if (($_SERVER['REQUEST_METHOD']==='POST') && (!isset($_GET['newuser'])) && (isset($_GET['newalbum'])) && (!isset($_GET['deleteuser']))) {

        include('dbconn.php');

        $artist = $conn->real_escape_string($_POST['addartist_id']);

        $read = "SELECT id FROM artist WHERE name = $artist";
        
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



        $number = $conn->real_escape_string($_POST['addnumber']);
        $title = $conn->real_escape_string($_POST['addtitle']);
        $image = $conn->real_escape_string($_POST['addimage']);
        $artistid = $conn->real_escape_string($_POST['addartist_id']);
        $yearid = $conn->real_escape_string($_POST['addyear_id']);
    
        $insertquery="INSERT INTO album (number, title, image, artist_id, year_id) VALUES ('$number', '$title', '$image', '$artistid', '$yearid')";
           
        $result = $conn->query($insertquery);
        
        if(!$result) {
            
            echo $conn->error;
        
        } else {

            echo "POST request performed";
            
        }
    }

    if (($_SERVER['REQUEST_METHOD']==='DELETE') && (isset($_GET['deletealbum']))) {

        include('dbconn.php');

        $albumid = $conn->real_escape_string($_GET['11']);
    
        $insertquery="DELETE FROM album WHERE id = $albumid";
           
        $result = $conn->query($insertquery);
        
        if(!$result) {
            
            echo $conn->error;
        
        } else {

            echo "POST request performed";
            
        }
    }

?>