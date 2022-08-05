<?php

    header("Content-Type: application/json");

    // display top 10 albums
    if (($_SERVER['REQUEST_METHOD']==='GET') && (isset($_GET['topten'])) && (!isset($_GET['album'])) && (!isset($_GET['search'])) && (!isset($_GET['accountplays'])) && (!isset($_GET['user'])) && (!isset($_GET['ownedalbum']))) {
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
    if (($_SERVER['REQUEST_METHOD']==='GET') && (!isset($_GET['topten'])) && (!isset($_GET['album'])) && (!isset($_GET['search'])) && (!isset($_GET['accountplays'])) && (!isset($_GET['user'])) && (!isset($_GET['ownedalbum']))) {

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
     if (($_SERVER['REQUEST_METHOD']==='GET') && (!isset($_GET['topten'])) && (isset($_GET['album'])) && (!isset($_GET['search'])) && (!isset($_GET['accountplays'])) && (!isset($_GET['user'])) && (!isset($_GET['ownedalbum']))) {

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
    if (($_SERVER['REQUEST_METHOD']==='GET') && (!isset($_GET['topten'])) && (!isset($_GET['album'])) && (isset($_GET['search'])) && (!isset($_GET['accountplays'])) && (!isset($_GET['user'])) && (!isset($_GET['ownedalbum']))) {

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
    if (($_SERVER['REQUEST_METHOD']==='GET') && (!isset($_GET['topten'])) && (!isset($_GET['album'])) && (!isset($_GET['search'])) && (isset($_GET['accountplays'])) && (!isset($_GET['user'])) && (!isset($_GET['ownedalbum']))) {
        include ("dbconn.php");

        $userid = $conn->real_escape_string($_GET['accountplays']);
    
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
    if (($_SERVER['REQUEST_METHOD']==='GET') && (!isset($_GET['topten'])) && (!isset($_GET['album'])) && (!isset($_GET['search'])) && (!isset($_GET['accountplays'])) && (isset($_GET['user'])) && (!isset($_GET['ownedalbum']))) {

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

    // display user owned albums
    if (($_SERVER['REQUEST_METHOD']==='GET') && (!isset($_GET['topten'])) && (!isset($_GET['album'])) && (!isset($_GET['search'])) && (!isset($_GET['accountplays'])) && (!isset($_GET['user'])) && (isset($_GET['ownedalbum']))) {
        include ("dbconn.php");

        $userid = $conn->real_escape_string($_GET['ownedalbum']);
    
        $read = "SELECT user_id, album_id, album.number, title, name, year, image FROM owned_album
        INNER JOIN album
        ON owned_album.album_id = album.id
        INNER JOIN artist
        ON album.artist_id = artist.id
        INNER JOIN year
        ON album.year_id = year.id
        INNER JOIN image
        ON album.image_id = image.id
        WHERE user_id IN (SELECT id FROM user WHERE username = '$userid')
        ORDER BY name ASC";
        
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
    if (($_SERVER['REQUEST_METHOD']==='POST') && (isset($_GET['newuser'])) && (!isset($_GET['adminlogin'])) && (!isset($_GET['userlogin'])) && (!isset($_GET['albumplays'])) && (!isset($_GET['ownedalbum']))) {

        include('dbconn.php');

        $firstname = $conn->real_escape_string($_POST['addfirstname']);
        $lastname = $conn->real_escape_string($_POST['addlastname']);
        $username = $conn->real_escape_string($_POST['addusername']);
        $userpassword = $conn->real_escape_string($_POST['addpassword']);

        $checkusername = "SELECT * FROM user WHERE username = '$username' ";

        $result = $conn->query($checkusername);

        if (!$result) {
            echo $conn->error;
        }

        $num = $result->num_rows;

        if ($num == 0) {

            $stmt = $conn->prepare("INSERT INTO user (firstname, lastname, username, userpassword) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $firstname, $lastname, $username, MD5($userpassword));
            $stmt->execute();
            $stmt->close(); 

        } else {
            header("Location: index.php");
            //echo "username already exists";
        }

    }

    // post admin login
    if (($_SERVER['REQUEST_METHOD']==='POST') && (!isset($_GET['newuser'])) && (isset($_GET['adminlogin'])) && (!isset($_GET['userlogin'])) && (!isset($_GET['albumplays'])) && (!isset($_GET['ownedalbum']))) {

        include('dbconn.php');

        $uname = $conn->real_escape_string($_POST['addusername']);
        $upass = $conn->real_escape_string($_POST['addpassword']);

        $checkuser = "SELECT * FROM user WHERE username ='$uname' AND userpassword = MD5('$upass') ";

        $result = $conn->query($checkuser);
    
        if (!$result) {
	        echo $conn->error;
        } 

        $num = $result->num_rows;

        if ($num > 0) {

            header("Location: adminaccount.php");
        } 

    }

    // post user login
    if (($_SERVER['REQUEST_METHOD']==='POST') && (!isset($_GET['newuser'])) && (!isset($_GET['adminlogin'])) && (isset($_GET['userlogin'])) && (!isset($_GET['albumplays'])) && (!isset($_GET['ownedalbum']))) {

        include('dbconn.php');

        $uname = $conn->real_escape_string($_POST['addusername']);
        $upass = $conn->real_escape_string($_POST['addpassword']);

        $checkuser = "SELECT * FROM user WHERE username = '$uname' AND userpassword = MD5('$upass') ";

        $result = $conn->query($checkuser);
    
        if (!$result) {
	        echo $conn->error;
        } 

        $num = $result->num_rows;

        if ($num > 0) {

            header("Location: index.php");
            
        } 


    }

    // post add album play
    if (($_SERVER['REQUEST_METHOD']==='POST') && (!isset($_GET['newuser'])) && (!isset($_GET['adminlogin'])) && (!isset($_GET['userlogin'])) && (isset($_GET['albumplays'])) && (!isset($_GET['ownedalbum']))) {

        include('dbconn.php');

        $currentUser = $conn->real_escape_string($_POST['adduser_name']);
        $albumid = $conn->real_escape_string($_POST['addalbum_id']);
        $count = '1';

        $checkuser = "SELECT * FROM album_plays
        WHERE album_plays.user_id IN (SELECT user.id FROM user WHERE username = '$currentUser')
        AND album_plays.album_id = '$albumid' ";

        $result = $conn->query($checkuser);

        if (!$result) {
            echo $conn->error;
        }

        $num = $result->num_rows;

        if ($num > 0) {

        $updatequery = "UPDATE album_plays SET plays = plays + 1 
        WHERE album_plays.user_id IN (SELECT user.id FROM user WHERE username = '$currentUser')
        AND album_plays.album_id = '$albumid' ";

        $result = $conn->query($updatequery);
    
        if(!$result) {
         
            echo $conn->error;
     
        } 

        } else {


        $insertquery = "INSERT INTO album_plays (user_id, album_id, plays) 
        VALUES ((SELECT user.id FROM user WHERE username = '$currentUser'), '$albumid', '$count')";
           
        $result = $conn->query($insertquery);
    
        if(!$result) {
        
            echo $conn->error;

        } 
        
        }
    }

     // post add owned album
     if (($_SERVER['REQUEST_METHOD']==='POST') && (!isset($_GET['newuser'])) && (!isset($_GET['adminlogin'])) && (!isset($_GET['userlogin'])) && (!isset($_GET['albumplays'])) && (isset($_GET['ownedalbum']))) {

        include('dbconn.php');

        $currentUser = $conn->real_escape_string($_POST['adduserid']);
        $albumid = $conn->real_escape_string($_POST['addalbumid']);
    

        $checkuser = "SELECT * FROM owned_album
        WHERE owned_album.user_id IN (SELECT user.id FROM user WHERE username = '$currentUser')
        AND owned_album.album_id = '$albumid' ";

        $result = $conn->query($checkuser);

        if (!$result) {
            echo $conn->error;
        }

        $num = $result->num_rows;

        if ($num < 1) {

        $insertquery = "INSERT INTO owned_album (user_id, album_id) 
        VALUES ((SELECT user.id FROM user WHERE username = '$currentUser'), '$albumid')";
               
        $result = $conn->query($insertquery);
        
        if(!$result) {
            
            echo $conn->error;
    
        } 

        } 
    }

    // update user
    if (($_SERVER['REQUEST_METHOD']==='PUT') && (isset($_GET['updateuser']))) {

        include('dbconn.php');

        parse_str(file_get_contents('php://input'), $_PUT);

        $firstname = $conn->real_escape_string($_PUT['addfirstname']);
        $lastname = $conn->real_escape_string($_PUT['addlastname']);
        $username = $conn->real_escape_string($_PUT['addusername']);
        $userpassword = $conn->real_escape_string($_PUT['addpassword']);
        $userid = $conn->real_escape_string($_PUT['adduserid']);

        $updatequery = "UPDATE user SET firstname = '$firstname', lastname = '$lastname', username = '$username', userpassword = MD5('$userpassword')
        WHERE id = '$userid' ";

        $result = $conn->query($updatequery);

        if (!$result) {
            echo $conn->error;
        }

    }

    // delete user
    if (($_SERVER['REQUEST_METHOD']==='DELETE') && (isset($_GET['deleteuser'])) && (!isset($_GET['deletealbumplays'])) && (!isset($_GET['deleteownedalbum']))) {

        include('dbconn.php');

        parse_str(file_get_contents('php://input'), $_DELETE);

        $userid = $_DELETE['deleteid'];
    
        $deleterequest="DELETE FROM user WHERE id = $userid";
           
        $result = $conn->query($deleterequest);
        
        if(!$result) {
            
            echo $conn->error;
        
        } 
    }

     /* delete user
     if (($_SERVER['REQUEST_METHOD']==='DELETE') && (isset($_GET['deleteuser']))) {

        include('dbconn.php');

        parse_str(file_get_contents('php://input'), $_DELETE);

        $userid = $_DELETE['deleteid'];

        $stmt = $mysqli->prepare("DELETE FROM user WHERE id = ?");
        $stmt->bind_param("i", $userid);
        $stmt->execute();
        $stmt->close();     
    }*/

    // delete album plays
    if (($_SERVER['REQUEST_METHOD']==='DELETE') && (!isset($_GET['deleteuser'])) && (isset($_GET['deletealbumplays'])) && (!isset($_GET['deleteownedalbum']))) {

        include('dbconn.php');

        parse_str(file_get_contents('php://input'), $_DELETE);

        $user = $_DELETE['deleteuser'];
        $albumid = $_DELETE['deletealbumid'];
    
        $deleterequest="DELETE FROM album_plays WHERE user_id IN
        (SELECT id FROM user WHERE username = '$user') AND album_id = $albumid;";
           
        $result = $conn->query($deleterequest);
        
        if(!$result) {
            
            echo $conn->error;
        
        } 
    }

    // delete owned album
    if (($_SERVER['REQUEST_METHOD']==='DELETE') && (!isset($_GET['deleteuser'])) && (!isset($_GET['deletealbumplays'])) && (isset($_GET['deleteownedalbum']))) {

        include('dbconn.php');

        parse_str(file_get_contents('php://input'), $_DELETE);

        $user = $_DELETE['deleteuser'];
        $albumid = $_DELETE['deletealbumid'];
    
        $deleterequest="DELETE FROM owned_album WHERE user_id IN
        (SELECT id FROM user WHERE username = '$user') AND album_id = $albumid;";
           
        $result = $conn->query($deleterequest);
        
        if(!$result) {
            
            echo $conn->error;
        
        } 
    }

?> 
