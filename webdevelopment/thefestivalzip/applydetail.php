<?php

include("conn.php");

$apply = $_POST['artistapply'];

if(isset($apply)) {

  $name = $_POST['bandname'];
  $genre = $_POST['genreref'];
  $bio = $_POST['bandbio'];
  $url = $_POST['bandsite'];
  $video = $_POST['bandvideo'];
  $email = $_POST['emailapply'];

  $name = mysqli_real_escape_string($conn, $name);
  $bio = mysqli_real_escape_string($conn, $bio);
  $genre = mysqli_real_escape_string($conn, $genre);
  $url = mysqli_real_escape_string($conn, $url);
  $video = mysqli_real_escape_string($conn, $video);
  $email = mysqli_real_escape_string($conn, $email);


  // $name = filter_input(INPUT_POST, $name);
  // $bio = filter_input(INPUT_POST, $name);
  // $genre = filter_input(INPUT_POST, $name);
  // $url = filter_input(INPUT_POST, $name);
  // $video = filter_input(INPUT_POST, $name);
  // $email = filter_input(INPUT_POST, $name);

  $fname = $_FILES['bandimage']['name'];
  $temp = $_FILES['bandimage']['tmp_name'];
  $fsize = $_FILES['bandimage']['size'];
  $ftype = $_FILES['bandimage']['type'];

  if(empty($name) && empty($email) && empty($genre) && empty($fname) && empty($bio) && empty($url) && empty($video)) {
        
    $isinvalidall = "is-invalid";
    $bandph = "Please enter your band name";
    $emailph = "Please enter your email";
    $genreph = "Please pick a genre";
    $fileph = "Please enter an image for you bio";
    $bio = "Please enter your band bio";
    $url = "Please enter your website (please include the full we address)";
    $video = "please upload a video.  This MUST be in the youtube embeded format to render correctly";
    require("apply.php");
    exit();
  } 
  
    if (empty($email) && empty($genre) && empty($fname) && empty($bio) && empty($url) && empty($video)) {
      
      $isinvalid1 = "is-invalid";
      $emailph = "Please enter your email";
      $genreph = "Please pick a genre";
      $fileph = "Please enter an image for you bio";
      $bio = "Please enter your band bio";
      $url = "Please enter your website (please include the full we address)";
      $video = "please upload a video.  This MUST be in the youtube embeded format to render correctly";
    require("apply.php");
    exit();
  }

  if (empty($genre) && empty($fname) && empty($bio) && empty($url) && empty($video)) {
      $isinvalid2 = "is-invalid";
      $genreph = "Please pick a genre";
      $fileph = "Please enter an image for you bio";
      $bio = "Please enter your band bio";
      $url = "Please enter your website (please include the full we address)";
      $video = "please upload a video.  This MUST be in the youtube embeded format to render correctly";
    require("apply.php");
    exit();
  }

  if (empty($fname) && empty($bio) && empty($url) && empty($video)) {
      $isinvalid3 = "is-invalid";
      $fileph = "Please enter an image for you bio";
      $bio = "Please enter your band bio";
      $url = "Please enter your website (please include the full we address)";
      $video = "please upload a video.  This MUST be in the youtube embeded format to render correctly";
    require("apply.php");
    exit();
  }

  if (empty($bio) && empty($url) && empty($video)) {
      $isinvalid4 = "is-invalid";
      $url = "Please enter your website (please include the full we address)";
      $video = "please upload a video.  This MUST be in the youtube embeded format to render correctly";
    require("apply.php");
    exit();
  }

  if (empty($url) && empty($video)) {
      $isinvalid5 = "is-invalid";
      $url = "Please enter your website (please include the full we address)";
      $video = "please upload a video.  This MUST be in the youtube embeded format to render correctly";
    require("apply.php");
    exit();
  }

  if (empty($video)) {
      $isinvalid6 = "is-invalid";
      $video = "please upload a video.  This MUST be in the youtube embeded format to render correctly";
    require("apply.php");
    exit();
  }

    
  
  
  else {

    $readcredentials = "SELECT * FROM BACCOUNT WHERE email = '$email'";
    $checkemail = $conn->query($readcredentials);

  $countemail = mysqli_num_rows($checkemail);

    if(!$checkemail) {
        echo $conn->error;
    }

    else  {
        if ($countemail != 0) {
        $emailtaken = "This email is already in use";
        require("apply.php");
        exit();

        } else {
  
    // add timestamp to image name before extension to avoid duplicate image names
    $array = explode('.', $fname);
    $fileName=$array[0];
    $fileExt=$array[1];
    $imagename=$fileName."_".time().".".$fileExt;

    //referenced from: https://www.w3schools.com/php/php_file_upload.asp
    $directory = "img/";
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

            $applicationinsert = "INSERT INTO BAPPLICATION(apply_name, apply_email, apply_bio, apply_image, 
              apply_url, apply_video, fk_genre_id) VALUES ('$name', '$email', '$bio', '$imagename', '$url', '$video', '$genre')";
              $dbinsert = $conn->query($applicationinsert);

            header( "Location: /thefestival/edit/admin.php" );
            exit ;

        } else {
            echo "Sorry, there was an error uploading your file.";
            // header( "Location: apply.php" );
          }
        }
      }
    }     
  }
}

    ?>