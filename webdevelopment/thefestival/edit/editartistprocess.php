
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

// update artist info for artist bio page
if(!isset($_POST['updateartist'])) {
    header("Location: admin.php");
} else {
    $artistinfoupdate = $_POST['updateartist'];
}
 

if(isset($artistinfoupdate)) {

    $artistname = $_POST['artistname'];
    $intro = $_POST['artistintro'];
    $genre = $_POST['artistgenre'];
    $bio = $_POST['artistbio'];
    $url = $_POST['artisturl'];
    $video = $_POST['artistvideo'];
    $artistid = $_POST['artistid'];
    

    $artistname =mysqli_real_escape_string($conn, $artistname);
    $intro =mysqli_real_escape_string($conn, $intro);
    $bio = mysqli_real_escape_string($conn, $bio);
    $genre = mysqli_real_escape_string($conn, $genre);
    $url = mysqli_real_escape_string($conn, $url);
    $video = mysqli_real_escape_string($conn, $video);
    

    $fname = $_FILES['bandimage']['name'];
    $temp = $_FILES['bandimage']['tmp_name'];
    $fsize = $_FILES['bandimage']['size'];
    $ftype = $_FILES['bandimage']['type'];

    if(empty($fname)) {

        $existingimage = "SELECT image FROM BARTIST WHERE pk_artist_id = $artistid";
        $getexistingimage = $conn->query($existingimage);

        $row = $getexistingimage->fetch_assoc();
        $image = $row['image'];

        $updateartistinfo = "UPDATE BARTIST SET name='$artistname', intro='$intro', bio='$bio', image='$image',
        url='$url', video='$video', fk_genre_id='$genre' WHERE pk_artist_id = $artistid";
        $processartistupdate = $conn->query($updateartistinfo);

        $success =  "Artist info was updated successfully!";
        require("admin.php");
        exit();

    } else {
  
    // add timestamp to image name before extension to avoid duplicate image names
    $array = explode('.', $fname);

    $size = count($array);
  
  if($size <= 1) {
    $error =  "Artist info was not updated.  Sorry, there was an error uploading your file.";
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
    $imageFileType = strtolower(pathinfo($fileupload,PATHINFO_EXTENSION));
    
    
        // Check if file already exists
        if (file_exists($fileupload)) {
            $fileexists =  "Artist info was not updated.  Sorry, file already exists.";
            require("admin.php");
            exit();
        }

        // Check file size
        if ($_FILES["bandimage"]["size"] > 1000000) {
            $toolarge =  "Artist info was not updated.  Sorry, your file is too large.";
            require("admin.php");
            exit();
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $filetype = "Artist info was not updated.  Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            require("admin.php");
            exit();
        }
    
        // if everything is ok, try to upload file
        if (move_uploaded_file($_FILES["bandimage"]["tmp_name"], $fileupload)) {

            $updateartistinfo = "UPDATE BARTIST SET name='$artistname', intro='$intro', bio='$bio', image='$imagename',
            url='$url', video='$video', fk_genre_id='$genre' WHERE pk_artist_id = $artistid";
            $processartistupdate = $conn->query($updateartistinfo);

            $success =  "Artist info was updated successfully!";
            require("admin.php");
        

        } else {
            $error =  "Artist info was not updated.  Sorry, there was an error uploading your file.";
            require("admin.php");
            exit();
            
            
            
          }
    }  

}



?>