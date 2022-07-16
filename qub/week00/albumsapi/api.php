<?php

    header("Content-Type: application/json");

    // display top 10 albums
    if (($_SERVER['REQUEST_METHOD']==='GET') && (isset($_GET['topten'])) && (!isset($_GET['album'])) && (!isset($_GET['search'])) && (!isset($_GET['accountplays'])) && (!isset($_GET['user']))) {
        include ("dbconn.php");
    
        $read = "SELECT SUM(plays), album.id, album.title, artist.name, image.image FROM album_plays
        INNER JOIN album
        on album_plays.album_id = album.id
        INNER JOIN artist
        ON album.artist_id = artist.id
        INNER JOIN image
        ON album.image_id = image.id
        GROUP BY album_plays.album_id
        ORDER BY SUM(plays) DESC, artist.name
        LIMIT 10";
        
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

    // display all albums
    if (($_SERVER['REQUEST_METHOD']==='GET') && (!isset($_GET['topten'])) && (!isset($_GET['album'])) && (!isset($_GET['search'])) && (!isset($_GET['accountplays'])) && (!isset($_GET['user']))) {

        include ("dbconn.php");
    
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

     // get album
     if (($_SERVER['REQUEST_METHOD']==='GET') && (!isset($_GET['topten'])) && (isset($_GET['album'])) && (!isset($_GET['search'])) && (!isset($_GET['accountplays'])) && (!isset($_GET['user']))) {

        include ("dbconn.php");

        $itemid = $conn->real_escape_string($_GET['album']);
    
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
        WHERE album.number = $itemid";
        
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

    // search
    if (($_SERVER['REQUEST_METHOD']==='GET') && (!isset($_GET['topten'])) && (!isset($_GET['album'])) && (isset($_GET['search'])) && (!isset($_GET['accountplays'])) && (!isset($_GET['user']))) {

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

    // display user album plays
    if (($_SERVER['REQUEST_METHOD']==='GET') && (!isset($_GET['topten'])) && (!isset($_GET['album'])) && (!isset($_GET['search'])) && (isset($_GET['accountplays'])) && (!isset($_GET['user']))) {
        include ("dbconn.php");

        $userid = $_GET['accountplays'];
    
        $read = "SELECT plays, user_id, album_id, album.number, title, name, year, image FROM album_plays
        INNER JOIN album
        ON album_plays.album_id = album.id
        INNER JOIN artist
        ON album.artist_id = artist.id
        INNER JOIN year
        ON album.year_id = year.id
        INNER JOIN image
        ON album.image_id = image.id
        WHERE user_id IN (SELECT id FROM user WHERE username = '$userid')
        ORDER BY plays DESC";
        
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

    // get user
    if (($_SERVER['REQUEST_METHOD']==='GET') && (!isset($_GET['topten'])) && (!isset($_GET['album'])) && (!isset($_GET['search'])) && (!isset($_GET['accountplays'])) && (isset($_GET['user']))) {

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

    // post add user
    if (($_SERVER['REQUEST_METHOD']==='POST') && (isset($_GET['newuser'])) && (!isset($_GET['deleteuser']))) {

        include('dbconn.php');

        $firstname = $_POST['addfirstname'];
        $lastname = $_POST['addlastname'];
        $username = $_POST['addusername'];
        $userpassword = $_POST['addpassword'];


        $stmt = $conn->prepare("INSERT INTO user (firstname, lastname, username, userpassword) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $firstname, $lastname, $username, $userpassword);
        $stmt->execute();

        $stmt->close();
        
    }

    // delete user
    if (($_SERVER['REQUEST_METHOD']==='POST') && (!isset($_GET['newuser'])) && (isset($_GET['deleteuser']))) {

        include('dbconn.php');

        $userid = $_GET['userid'];

        $stmt = $conn->prepare("DELETE FROM user WHERE id = ?");
        $stmt->bind_param("i", $userid);
        $stmt->execute();
            
        $stmt->close();
    }

?> 