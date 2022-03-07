<?php

// referenced from https://stackoverflow.com/questions/6249707/check-if-php-session-has-already-started
// if a session has already started with the presence of require later in the code, ignore this session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

include("../conn.php");

// session details
$privileges = $_SESSION['privileges'];
$display = $_SESSION['username'];
$sessiondetails = $_SESSION['session'];

// if a user tries to access this page without a session redirect to the login page
if(!isset($_SESSION['session'])) {
    header("Location: ../login.php");
    exit();
  }

  // if $_POST is empty redirect to the admin page otherwise create variable
  if(!isset($_POST['addnewsstory'])) {
    header("Location: admin.php");
  } else {
    $addnewsstory = $_POST['addnewsstory'];
  }

  if (isset($addnewsstory)) {

    // add a news story to news stand
    $newstype = $_POST['newstype'];

    $newstitle = $_POST['newstitle'];
    $newsbody = $_POST ['newsbody'];
    $seemorelink = $_POST['seemorelink'];

    // sanitize string inputs
    $newstype = mysqli_real_escape_string($conn, $newstype);
    $newstitle = mysqli_real_escape_string($conn, $newstitle);
    $newsbody = mysqli_real_escape_string($conn, $newsbody);
    $seemorelink = mysqli_real_escape_string($conn, $seemorelink);

    // insert news story details into database
    $newsinsert = "INSERT INTO BNEWS(type, title, content, url) VALUES ('$newstype', '$newstitle', '$newsbody', '$seemorelink')";
    $addnewsdb = $conn->query($newsinsert);

    // alert displayed on admin page
    $success =  "News story has been added successfully!";
    require("admin.php");
    die();

}  

?>
