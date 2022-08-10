<?php

// referenced from https://stackoverflow.com/questions/6249707/check-if-php-session-has-already-started
// if a session has already started with the presence of require later in the code, ignore this session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include("../conn.php");

// user session details
$privileges = $_SESSION['privileges'];
$display = $_SESSION['username'];
$sessiondetails = $_SESSION['session'];

// if user tries to access webpage without an active session, redirect to the login page
if(!isset($_SESSION['session'])) {
  header("Location: ../login.php");
  exit();
}

// update artist info for artist bio page
if(!isset($_POST['updatevenue'])) {
    header("Location: admin.php");
} else {
    $venueinfoupdate = $_POST['updatevenue'];
}

// $cancelvenue = $_POST['cancelvenue'];

if(isset($cancelvenue)) {
    echo "cancel";
    header("Location: admin.php");
    die();
}

if(isset($venueinfoupdate)) {

    $addressid = $_POST['addressid'];
    $venueid = $_POST['venueid'];
    $venuename = $_POST['venuename'];
    $intro = $_POST['venueintro'];
    $bio = $_POST['venuebio'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $postcode = $_POST['postcode'];
    $map = $_POST['venuemap'];
    $capacity = $_POST['venuecapacity'];

  

  $venuename =mysqli_real_escape_string($conn, $venuename);
  $intro =mysqli_real_escape_string($conn, $intro);
  $bio = mysqli_real_escape_string($conn, $bio);
  $street = mysqli_real_escape_string($conn, $street);
  $city = mysqli_real_escape_string($conn, $city);
  $postcode = mysqli_real_escape_string($conn, $postcode);
  $map = mysqli_real_escape_string($conn, $map);
  

  $fname = $_FILES['venueimage']['name'];
  $temp = $_FILES['venueimage']['tmp_name'];
  $fsize = $_FILES['venueimage']['size'];
  $ftype = $_FILES['venueimage']['type'];

  if(empty($fname)) {

    $existingimage = "SELECT venue_image FROM BVENUE WHERE pk_venue_id = $venueid";
    $getexistingimage = $conn->query($existingimage);

    $row = $getexistingimage->fetch_assoc();
    $image = $row['venue_image'];

    $updatevenueinfo = "UPDATE BVENUE SET venue_image='$image',venue_name='$venuename',venue_title='$intro',
    venue_description='$bio', capacity='$capacity' WHERE pk_venue_id = $venueid";
    $processvenueupdate = $conn->query($updatevenueinfo);

    $updateaddress = "UPDATE BADDRESS SET street='$street',city='$city',postcode='$postcode',embed_google_map='$map' 
    WHERE pk_address_id = $addressid";
    $processaddressupdate = $conn->query($updateaddress);

    $success =  "Venue info was updated successfully!";
    require("admin.php");
    exit();

} else {

  // add timestamp to image name before extension to avoid duplicate image names
  $array = explode('.', $fname);

  $size = count($array);
  
  if($size <= 1) {
    $error =  "Venue info was not updated.  Sorry, there was an error uploading your file.";
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
        $fileexists =  "Venue info was not updated.  Sorry, file already exists.";
        require("admin.php");
        exit();
    }
    // Check file size
    if ($_FILES["venueimage"]["size"] > 1000000) {
        $toolarge =  "Venue info was not updated.  Sorry, your file is too large.";
        require("admin.php");
        exit();
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        $filetype = "Venue info was not updated.  Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        require("admin.php");
        exit();
    }
    
        if (move_uploaded_file($_FILES["venueimage"]["tmp_name"], $fileupload)) {
            echo "The file ". $imagename . " has been uploaded.";
            echo"we're here";

            $updatevenueinfo = "UPDATE BVENUE SET venue_image='$imagename',venue_name='$venuename',venue_title='$intro',
            venue_description='$bio', capacity='$capacity' WHERE pk_venue_id = $venueid";
            $processvenueupdate = $conn->query($updatevenueinfo);

            $updateaddress = "UPDATE BADDRESS SET street='$street',city='$city',postcode='$postcode',embed_google_map='$map' 
            WHERE pk_address_id = $addressid";
            $processaddressupdate = $conn->query($updateaddress);

            $success =  "Venue info was updated successfully!";
            require("admin.php");
            exit();

        } else {
            $error =  "Venue info was not updated.  Sorry, there was an error uploading your file.";
            require("admin.php");
            exit();
          }
    }
}

?>