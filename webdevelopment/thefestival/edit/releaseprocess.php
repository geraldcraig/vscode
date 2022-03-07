<?php

// referenced from https://stackoverflow.com/questions/6249707/check-if-php-session-has-already-started
// if a session has already started with the presence of require later in the code, ignore this session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include("../conn.php");

$privileges = $_SESSION['privileges'];
$display = $_SESSION['username'];
$sessiondetails = $_SESSION['session'];

if(!isset($_SESSION['session'])) {
    header("Location: ../login.php");
    exit();
  }


if(!isset($_POST['updateartistrelease'])) {
    header("Location: admin.php");
} else {
    $releaseupdate = $_POST['updateartistrelease'];
}

if(isset($releaseupdate)) {

    $artist = $_POST['artistid'];
    $albumtitle = $_POST['albumtitle'];
    $releasemonth = $_POST['releasemonth'];
    $releaseyear = $_POST['releaseyear'];

    $albumtitle = mysqli_real_escape_string($conn, $albumtitle);
    $releasemonth = mysqli_real_escape_string($conn, $releasemonth);
    $releaseyear = mysqli_real_escape_string($conn, $releaseyear);

    $fname = $_FILES['bandimage']['name'];
    $temp = $_FILES['bandimage']['tmp_name'];
    $fsize = $_FILES['bandimage']['size'];
    $ftype = $_FILES['bandimage']['type'];



    if(empty($fname)) {

        $isempty =  "Artist release was not updated.  You must upload an image when adding a release.";
        require("admin.php");
        exit();

    } else {
  
    // add timestamp to image name before extension to avoid duplicate image names
    $array = explode('.', $fname);
    $size = count($array);
  
  if($size <= 1) {
    $error =  "Release info was not updated.  Sorry, there was an error uploading your file.";
    require("admin.php");
    exit();
  } else {
    $fileName=$array[0];
    $fileExt=$array[1];
    $imagename=$fileName."_".time().".".$fileExt;
  }

    //referenced from: https://www.w3schools.com/php/php_file_upload.asp
    $directory = "../img/";
    $fileupload= $directory . $imagename;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($fileupload,PATHINFO_EXTENSION));

    
        // Check if file already exists
        if (file_exists($fileupload)) {
            $fileexists =  "Artist release was not updated.  Sorry, file already exists.";
                require("admin.php");
                exit();
        }
        // Check file size
        if ($_FILES["bandimage"]["size"] > 1000000) {
            $toolarge =  "Artist release was not updated.  Sorry, your file is too large.";
            require("admin.php");
            exit();
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $filetype = "Artist release was not updated.  Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                require("admin.php");
                exit();
        }
   
        if (move_uploaded_file($_FILES["bandimage"]["tmp_name"], $fileupload)) {
            

            $releaseupdate = "INSERT INTO BRELEASE(title, release_month, release_year, img, fk_artist_id) 
            VALUES ('$albumtitle', '$releasemonth', '$releaseyear', '$imagename', '$artist')";
            $dbinsert = $conn->query($releaseupdate);

            $success =  "Artist release was added successfully!";
            require("admin.php");
            exit();

        } else {
            $error =  "Artist release was not updated.  Sorry, there was an error uploading your file.";
            require("admin.php");
            exit();
        }
    }
}

?>