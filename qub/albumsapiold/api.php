<?php

    header("Content-Type: application/json");

    // get all albums
    if (($_SERVER['REQUEST_METHOD']==='GET') && (!isset($_GET['top10'])) && (!isset($_GET['album'])) && (!isset($_GET['userid'])) && (!isset($_GET['user'])) && (!isset($_GET['artist']))
     && (!isset($_GET['filter'])) && (!isset($_GET['album_id'])) && (!isset($_GET['search'])) && (!isset($_GET['accountplays']))) {

        include ("dbconn.php");
    
        $read = "SELECT album.id, album.number, album.title, artist.name, year.year, genre.genre, subgenre.subgenre, image.image FROM album
        INNER JOIN artist
        ON album.artist_id = artist.id
        INNER JOIN year
        ON album.year_id = year.id
        INNER JOIN image
        ON album.image_id = image.id
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

    // get top 10 albums
    if (($_SERVER['REQUEST_METHOD']==='GET') && (isset($_GET['top10'])) && (!isset($_GET['album'])) && (!isset($_GET['userid'])) && (!isset($_GET['user'])) && (!isset($_GET['artist']))
     && (!isset($_GET['filter'])) && (!isset($_GET['album_id'])) && (!isset($_GET['search'])) && (!isset($_GET['accountplays']))) {

        include ("dbconn.php");
    
        $read = "SELECT SUM(plays), title, name, image FROM album_plays
        INNER JOIN album
        on album_plays.album_id = album.id
        INNER JOIN artist
        ON album.artist_id = artist.id
        INNER JOIN image
        ON album.image_id = image.id
        GROUP BY album_plays.album_id
        ORDER BY SUM(plays) DESC
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

    // get artist
    if (($_SERVER['REQUEST_METHOD']==='GET') && (!isset($_GET['top10'])) && (!isset($_GET['album'])) && (!isset($_GET['userid'])) && (!isset($_GET['user'])) && (isset($_GET['artist']))
     && (!isset($_GET['filter'])) && (!isset($_GET['album_id'])) && (!isset($_GET['search'])) && (!isset($_GET['accountplays']))) {

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

    // filter
    if (($_SERVER['REQUEST_METHOD']==='GET') && (!isset($_GET['top10'])) && (!isset($_GET['album'])) && (!isset($_GET['userid'])) && (!isset($_GET['user'])) && (!isset($_GET['artist']))
     && (isset($_GET['filter'])) && (!isset($_GET['album_id'])) && (!isset($_GET['search'])) && (!isset($_GET['accountplays']))) {

        include ("dbconn.php");

        $filterdata = $conn->real_escape_string($_GET['filter']);
    
        $filterquery = "SELECT album.number, album.title, artist.name, year.year, image.image FROM album
        INNER JOIN artist
        ON album.artist_id = artist.id
        INNER JOIN year
        ON album.year_id = year.id
        INNER JOIN image
        ON album.image_id = image.id
        WHERE name='$filterdata' ";

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

    // get album
    if (($_SERVER['REQUEST_METHOD']==='GET') && (!isset($_GET['top10'])) && (isset($_GET['album'])) && (!isset($_GET['userid'])) && (!isset($_GET['user'])) && (!isset($_GET['artist']))
     && (!isset($_GET['filter'])) && (!isset($_GET['album_id'])) && (!isset($_GET['search'])) && (!isset($_GET['accountplays']))) {

        include ("dbconn.php");

        $itemid = $conn->real_escape_string($_GET['album']);
    
        $read = "SELECT album.number, album.title, artist.name, year.year, image.image, genre.genre, subgenre.subgenre FROM album
        INNER JOIN artist
        ON album.artist_id = artist.id
        INNER JOIN year
        ON album.year_id = year.id
        INNER JOIN image
        ON album.image_id = image.id
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

    // get album_id
    if (($_SERVER['REQUEST_METHOD']==='GET') && (!isset($_GET['top10'])) && (!isset($_GET['album'])) && (!isset($_GET['userid'])) && (!isset($_GET['user'])) && (!isset($_GET['artist']))
     && (!isset($_GET['filter'])) && (isset($_GET['album_id'])) && (!isset($_GET['search'])) && (!isset($_GET['accountplays']))) {

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

    //get user
    if (($_SERVER['REQUEST_METHOD']==='GET') && (!isset($_GET['top10'])) && (!isset($_GET['album'])) && (!isset($_GET['userid'])) && (isset($_GET['user'])) && (!isset($_GET['artist']))
    && (!isset($_GET['filter'])) && (!isset($_GET['album_id'])) && (!isset($_GET['search'])) && (!isset($_GET['accountplays']))) {

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

    // get user_id
    if (($_SERVER['REQUEST_METHOD']==='GET') && (!isset($_GET['top10'])) && (!isset($_GET['album'])) && (isset($_GET['userid'])) && (!isset($_GET['user'])) && (!isset($_GET['artist']))
     && (!isset($_GET['filter'])) && (!isset($_GET['album_id'])) && (!isset($_GET['search'])) && (!isset($_GET['accountplays']))) {

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

    // get search
    if (($_SERVER['REQUEST_METHOD']==='GET') && (!isset($_GET['top10'])) && (!isset($_GET['album'])) && (!isset($_GET['userid'])) && (!isset($_GET['user'])) && (!isset($_GET['artist']))
     && (!isset($_GET['filter'])) && (!isset($_GET['album_id'])) && (isset($_GET['search'])) && (!isset($_GET['accountplays'])) && (!isset($_GET['accountplays']))) {

        include ("dbconn.php");
        $searchitem = $conn->real_escape_string($_GET['search']);

        $read = "SELECT album.number, album.title, artist.name, year.year, image.image FROM album
        INNER JOIN artist
        ON album.artist_id = artist.id
        INNER JOIN year
        ON album.year_id = year.id
        INNER JOIN image
        ON album.image_id = image.id
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

    // display user album plays
    if (($_SERVER['REQUEST_METHOD']==='GET') && (!isset($_GET['top10'])) && (!isset($_GET['album'])) && (!isset($_GET['userid'])) && (!isset($_GET['user'])) && (!isset($_GET['artist']))
     && (!isset($_GET['filter'])) && (!isset($_GET['album_id'])) && (!isset($_GET['search'])) && (isset($_GET['accountplays']))) {

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

    // post add user
    if (($_SERVER['REQUEST_METHOD']==='POST') && (isset($_GET['newuser'])) && (!isset($_GET['newalbum'])) && (!isset($_GET['albumplays'])) && (!isset($_GET['adminlogin'])) && (!isset($_GET['userlogin']))) {

        include('dbconn.php');

        $firstname = $_POST['addfirstname'];
        $lastname = $_POST['addlastname'];
        $username = $_POST['addusername'];
        $userpassword = $_POST['addpassword'];

        $checkuser = "SELECT username FROM user WHERE username = $username";

        $result = $conn->query($checkuser);
    
            if (!$result) {
                echo $conn->error;
            }
    
            $num = $result->num_rows;
    
            if ($num == 0) {


        $stmt = $conn->prepare("INSERT INTO user (firstname, lastname, username, userpassword) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $firstname, $lastname, $username, $userpassword);
        $stmt->execute();

            echo "New records created successfully";

        $stmt->close();
        }
        
    }
/*
     // post add user
     if (($_SERVER['REQUEST_METHOD']==='POST') && (isset($_GET['newuser'])) && (!isset($_GET['newalbum'])) && (!isset($_GET['albumplays'])) && (!isset($_GET['adminlogin'])) && (!isset($_GET['userlogin']))) {

        include('dbconn.php');

        $firstname = $_POST['addfirstname'];
        $lastname = $_POST['addlastname'];
        $username = $_POST['addusername'];
        $userpassword = $_POST['addpassword'];

        $checkuser = "SELECT username FROM user WHERE username = $username";

        $result = $conn->query($checkuser);
    
            if (!$result) {
                echo $conn->error;
            }
    
            $num = $result->num_rows;
    
            if ($num == 0) {


        $stmt = $conn->prepare("INSERT INTO user (firstname, lastname, username, userpassword) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $firstname, $lastname, $username, $userpassword);
        $stmt->execute();

            echo "New records created successfully";

        $stmt->close();
        }
        
    }
*/
    

    // post add album
    if (($_SERVER['REQUEST_METHOD']==='POST') && (!isset($_GET['newuser'])) && (isset($_GET['newalbum'])) && (!isset($_GET['albumplays'])) && (!isset($_GET['adminlogin'])) && (!isset($_GET['userlogin']))) {

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

    // post add album play
    if (($_SERVER['REQUEST_METHOD']==='POST') && (!isset($_GET['newuser'])) && (!isset($_GET['newalbum'])) && (isset($_GET['albumplays'])) && (!isset($_GET['adminlogin'])) && (!isset($_GET['userlogin']))) {


            include('dbconn.php');
    
            $currentUser = $_POST['adduser_name'];
            $albumid = $_POST['addalbum_id'];
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

    // post admin login
    if (($_SERVER['REQUEST_METHOD']==='POST') && (!isset($_GET['newuser'])) && (!isset($_GET['newalbum'])) && (!isset($_GET['albumplays'])) && (isset($_GET['adminlogin'])) && (!isset($_GET['userlogin']))) {

        include('dbconn.php');

        $uname = $_POST["username"];
        $upass = $_POST["password"];

        $checkuser = "SELECT * FROM user WHERE username ='$uname' AND userpassword = '$upass' ";

        $result = $conn->query($checkuser);
    
        if (!$result) {
	        echo $conn->error;
        }

    }

    // post user login
    if (($_SERVER['REQUEST_METHOD']==='POST') && (!isset($_GET['newuser'])) && (!isset($_GET['newalbum'])) && (!isset($_GET['albumplays'])) && (!isset($_GET['adminlogin'])) && (isset($_GET['userlogin']))) {

        include('dbconn.php');

        $uname = $_POST["username"];
        $upass = $_POST["password"];

        $checkuser = "SELECT * FROM user WHERE username ='$uname' AND userpassword = '$upass' ";

        $result = $conn->query($checkuser);
    
        if (!$result) {
	        echo $conn->error;
        }

    }

    // delete album
    if (($_SERVER['REQUEST_METHOD']==='DELETE') && (isset($_GET['deletealbum']))&& (!isset($_GET['deleteuser']))) {

        include('dbconn.php');

        $albumid = $conn->real_escape_string($_GET['11']);
    
        $insertquery="DELETE FROM album WHERE id = $albumid";
           
        $result = $conn->query($insertquery);
        
        if(!$result) {
            
            echo $conn->error;
        
        } 
    }

    if (($_SERVER['REQUEST_METHOD']==='DELETE')&& (!isset($_GET['deletealbum'])) && (isset($_GET['deleteuser']))) {

        include('dbconn.php');

        parse_str(file_get_contents('php://input'), $_DELETE);

        $userid = $_DELETE['deleteid'];
    
        $insertquery="DELETE FROM user WHERE id = $userid";
           
        $result = $conn->query($insertquery);
        
        if(!$result) {
            
            echo $conn->error;
        
        } 
    }
