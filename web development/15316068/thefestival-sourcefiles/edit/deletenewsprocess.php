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

  $newsdelete = $_POST['newsid'];

  if(!isset($_POST['deletestory'])) {
    header("Location: admin.php");
  } else {
    $deletestory = $_POST['deletestory'];
  }

if(isset($deletestory)) {

    $newsdeletedb = "DELETE FROM BNEWS WHERE news_id = $newsdelete";
    $newsdeleteq = $conn->query($newsdeletedb);

    $read = "SELECT * FROM BNEWS";
    $result = $conn->query($read);

    $success = "News story deleted successfully!";
    require("admin.php");
    exit();

} else {
}

?>