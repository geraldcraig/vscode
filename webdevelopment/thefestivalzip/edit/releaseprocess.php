<?php

session_start();

include("../conn.php");

$privileges = $_SESSION['privileges'];
$display = $_SESSION['username'];
$sessiondetails = $_SESSION['session'];

if(!isset($_SESSION['session'])) {
    header("Location: ../login.php");
    exit();
  }

//   if($privileges != 1500 || 1501) {
//     header("Location: admin.php");
//     exit();
//   }

$releaseupdate = $_POST['updateartistrelease'];
$cancelupdate = $_POST['cancelupdate'];

if(isset($cancelupdate)) {
    header("Location: admin.php");
}

if(isset($releaseupdate)) {

    $artist = $_POST['artistid'];
    $albumtitle = $_POST['albumtitle'];
    $releasemonth = $_POST['releasemonth'];
    $releaseyear = $_POST['releaseyear'];

    $fname = $_FILES['bandimage']['name'];
    $temp = $_FILES['bandimage']['tmp_name'];
    $fsize = $_FILES['bandimage']['size'];
    $ftype = $_FILES['bandimage']['type'];
  
    // add timestamp to image name before extension to avoid duplicate image names
    $array = explode('.', $fname);
    $fileName=$array[0];
    $fileExt=$array[1];
    $imagename=$fileName."_".time().".".$fileExt;

    //referenced from: https://www.w3schools.com/php/php_file_upload.asp
    $directory = "../img/";
    $fileupload= $directory . $imagename;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($fileupload,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["bandimage"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($fileupload)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["bandimage"]["size"] > 1000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // header( "Location: apply.php" );
    // if everything is ok, try to upload file
    } else {

        if (move_uploaded_file($_FILES["bandimage"]["tmp_name"], $fileupload)) {
            echo "The file ". $imagename . " has been uploaded.";

            $releaseupdate = "INSERT INTO BRELEASE(title, release_month, release_year, img, fk_artist_id) 
            VALUES ('$albumtitle', '$releasemonth', '$releaseyear', '$imagename', '$artist')";
            $dbinsert = $conn->query($releaseupdate);

            header( "Location: admin.php" );
            exit ;

        } else {
            echo "Sorry, there was an error uploading your file.";
            // header( "Location: apply.php" );
        }
    }
}
?>