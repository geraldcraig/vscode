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

// if($privileges == 1500) {
//   header("Location: admin.php");
//   exit();
// }

// accept or decline an artist application
$decline = $_POST['declineapp'];
$accept = $_POST['acceptapp'];
$id = $_POST['rowid'];

// delete application from application table
if(isset($decline)){
  
  $delete = "DELETE FROM BAPPLICATION WHERE pk_application_id = $id";
  $processdelete = $conn->query($delete);

  $read = "SELECT * FROM BAPPLICATION";
  $result = $conn->query($read);
          
  header("Location: admin.php");
  die();
// accept an artist, add them to artist table, create them a login account,
// create a random password for the account, assign the account to the artist
// & delete application from the applications table
} 

if(isset($accept)) {

  $read = "SELECT * FROM BAPPLICATION WHERE pk_application_id = $id";
  $result = $conn->query($read);

  while($row = $result->fetch_assoc()) {
      $artist = $row['apply_name'];
      $email = $row['apply_email'];
      $website = $row['apply_url'];
      $id = $row['pk_application_id'];
      $image = $row['apply_image'];
      $video = $row['apply_video'];
      $genre = $row['fk_genre_id'];
      $bio = $row['apply_bio'];


      $artist = mysqli_real_escape_string($conn, $artist);
      $artistacc = str_replace(' ','',strtolower($artist));

      $email = mysqli_real_escape_string($conn, strtolower($email));
      $website = mysqli_real_escape_string($conn, $website);
      $image = mysqli_real_escape_string($conn, $image);
      $video = mysqli_real_escape_string($conn, $video);
      $genre = mysqli_real_escape_string($conn, $genre);
      $bio = mysqli_real_escape_string($conn, $bio);
      
      // generate a random password 12 characters long consisting of the detailed characters below
      $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!.-_+=';
      // echo substr(str_shuffle($permitted_chars), 0, 10);
      $randompassword = substr(str_shuffle($permitted_chars), 0, 12);

        // $to = "$email";
        // $message = "this is a test email to see does it work";
        // $subject = 'B Festival Application';
        // $headers = "MIME-Version: 1.0" . "\r\n";
        // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        // $headers .= 'From: mwalsh28@qub.ac.uk' . "\r\n";
        
              
        //       mail($to, $subject, $message, $headers);
        $hash = password_hash($randompassword, PASSWORD_DEFAULT);

        $hashtest = password_hash('password', PASSWORD_DEFAULT);
        $updateartistaccount = "INSERT INTO BACCOUNT(username, email, password, fk_privileges_id) 
        VALUES ('$artistacc', '$email', '$hashtest', 1501)";
        
        $processartistaccount = $conn->query($updateartistaccount); 

        $readaccountid = "SELECT pk_account_id FROM BACCOUNT WHERE username = '$artistacc' AND email = '$email'";
        $processaccountid = $conn->query($readaccountid);

        while($row = $processaccountid->fetch_assoc()) {
        $accountid = $row['pk_account_id'];
        }

        $updateartist = "INSERT INTO BARTIST(name, bio, image, url, video, fk_genre_id, fk_account_id) 
          VALUES ('$artist', '$bio', '$image', '$website', '$video', '$genre', $accountid)";
        $processupdate = $conn->query($updateartist); 

    }

  $delete = "DELETE FROM BAPPLICATION WHERE pk_application_id = $id";
  $processdelete = $conn->query($delete);

  $read = "SELECT * FROM BAPPLICATION";
  $result = $conn->query($read);

  header("Location: admin.php");
  die();

} 

// allocate a time slot to an artist
$allocate = $_POST['allocatetime'];
$performance = $_POST['perfid'];
$artist = $_POST['artistid'];

if(isset($allocate)) {

  $artisttslot = "UPDATE BARTIST SET fk_performance_id=$performance  WHERE pk_artist_id = $artist";
  $processtslot = $conn->query($artisttslot);
  header("Location: admin.php");
  die();

} 

// remove an artist from the festival and any details relating to them 
// from the database (account, members etc).
$deleteartist = $_POST['deleteartist'];
$artistid = $_POST['rowid'];

if(isset($deleteartist)) {

  $readid = "SELECT fk_account_id FROM BARTIST WHERE pk_artist_id = $artistid";
  $proreadid = $conn->query($readid);

  while($row = $proreadid->fetch_assoc()) {
    $accid = $row['fk_account_id'];
  }

  $deleteaccount = "DELETE FROM BACCOUNT WHERE pk_account_id = $accid";
  $deleteaccountdb = $conn->query($deleteaccount);

  $artistdelete = "DELETE FROM BARTIST WHERE pk_artist_id = $artistid";
  $deleteartistdb = $conn->query($artistdelete);

  header("Location: admin.php");
  die();

} 

// update welcome jumbo on the homepage
$updatehomepage = $_POST['homepageupdate'];
$hptitle = $_POST['pagetitle'];
$hpdescrip = $_POST['pagedescrip'];

$hpdescrip = mysqli_real_escape_string($conn, $hpdescrip);

if(isset($updatehomepage)) {

  $hptitleread = "UPDATE BFESTIVAL SET fest_pagetitle='$hptitle'";
  $hptitlecommit = $conn->query($hptitleread);
  $hpdescripread = "UPDATE BFESTIVAL SET fest_description='$hpdescrip'";
  $hpdescripcommit = $conn->query($hpdescripread);

  header("Location: admin.php");
  die();
 
} 

// update artist info for artist bio page
$artistinfoupdate = $_POST['updateartist'];
$cancelupdate = $_POST['cancelupdate'];

if(isset($cancelupdate)) {
    header("Location: admin.php");
}
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
  $email = mysqli_real_escape_string($conn, $email);
 
if(isset($artistinfoupdate)) {

  $updateartistinfo = "UPDATE BARTIST SET name='$artistname', intro='$intro', bio='$bio',
  url='$url', video='$video', fk_genre_id='$genre' WHERE pk_artist_id = $artistid";
  $processartistupdate = $conn->query($updateartistinfo);

  header("Location: admin.php");
  die();

}  

// delete a release that an artist has added
$deleterelease = $_POST['removerelease'];
$releaseid = $_POST['releaseid'];

if(isset($deleterelease)) {

  $deletereldb = "DELETE FROM BRELEASE WHERE pk_release_id = $releaseid";
  $deletereldbread = $conn->query($deletereldb);

  header("Location: admin.php");
  die();
}

// edit the artists allocated timeslot (incase there are time clashes or schedule changes)
$amendtime = $_POST['amendtime'];
$amendtimeslot = $_POST['perfid'];
$artisttimeid = $_POST['artistid'];

if(isset($amendtime)) {

  $updatetimeslot = "UPDATE BARTIST SET fk_performance_id = $amendtimeslot WHERE pk_artist_id = $artisttimeid";
  $updatetimeslotdb = $conn->query($updatetimeslot);
  header("Location: admin.php");
  die();

}

?>