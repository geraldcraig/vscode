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

  // delete a release that an artist has added
    if(!isset($_POST['releaseid'])) {
        header("Location: admin.php");
    } else {
        $releaseid = $_POST['releaseid'];
    }

if(!isset($_POST['removerelease'])) {
    header("Location: admin.php");
} else {
    $deleterelease = $_POST['removerelease'];
}

if(isset($deleterelease)) {

  $deletereldb = "DELETE FROM BRELEASE WHERE pk_release_id = $releaseid";
  $deletereldbread = $conn->query($deletereldb);

  $success =  "Artist release has been removed successfully!";
  require("admin.php");
  exit();

}




?>