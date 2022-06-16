<?php

    header("Content-Type: application/json");

    if (($_SERVER['REQUEST_METHOD']==='GET') && (isset($_GET['search']))) {

        include ("dbconn.php");
        $searchitem = $conn->real_escape_string($_GET['search']);

        //$userid = $conn->real_escape_string($_GET['userid']);
    
        //$read = "SELECT * FROM user WHERE id = $userid";

        $read = "SELECT album.id, album.number, album.title, artist.name, year.year, image.image, genre.genre, subgenre.subgenre FROM album
        INNER JOIN artist 
        ON album.artist_id = artist.id
        INNER JOIN year 
        ON album.year_id = year.id
        INNER JOIN album_image
        ON album.id = album_image.album_id
        INNER JOIN image
        ON image.id = album_image.album_id
        INNER JOIN album_genre
        ON album.id = album_genre.album_id
        INNER JOIN genre
        ON album_genre.genre_id = genre.id
        INNER JOIN album_subgenre
        ON album.id = album_subgenre.album_id
        INNER JOIN subgenre
        ON album_subgenre.subgenre_id = subgenre.id
        WHERE (year LIKE '%$searchitem%') OR (name LIKE '%$searchitem%') 
        OR (title LIKE '%$searchitem%') OR (genre_type LIKE '%$searchitem%')
        OR (subgenre_type LIKE '%$searchitem%')";
        
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