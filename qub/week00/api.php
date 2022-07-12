<?php

    header("Content-Type: application/json");

// search
    if (($_SERVER['REQUEST_METHOD']==='GET') && (!isset($_GET['count'])) && (!isset($_GET['album'])) && (isset($_GET['search'])) && (!isset($_GET['user']))) {

        include ("dbconn.php");

        $searchitem = $conn->real_escape_string($_GET['search']);
    
        $read = "SELECT album.id, album.number, album.title, artist.name, year.year, genre.genre, subgenre.subgenre, image.image FROM album
        INNER JOIN artist
        ON album.artist_id = artist.id
        INNER JOIN year
        ON album.year_id = year.id
        INNER JOIN album_image
        ON album.id = album_image.album_id
        INNER JOIN image
        ON album_image.image_id = image.id
        INNER JOIN album_genre
        ON album.id = album_genre.album_id
        INNER JOIN genre
        ON album_genre.genre_id = genre.id
        INNER JOIN album_subgenre
        ON album.id = album_subgenre.album_id
        INNER JOIN subgenre
        ON album_subgenre.subgenre_id = subgenre.id
        WHERE (year LIKE '%$searchitem%') OR (name LIKE '%$searchitem%')
        OR (title LIKE '%$searchitem%')
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
    ?>