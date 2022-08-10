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

// update welcome jumbo on the homepage
$updatehomepage = $_POST['homepageupdate'];
$hptitle = $_POST['pagetitle'];
$hpdescrip = $_POST['pagedescrip'];

$hptitle = mysqli_real_escape_string($conn, $hptitle);
$hpdescrip = mysqli_real_escape_string($conn, $hpdescrip);

if(isset($updatehomepage)) {

  $hptitleread = "UPDATE BFESTIVAL SET fest_pagetitle='$hptitle'";
  $hptitlecommit = $conn->query($hptitleread);
  $hpdescripread = "UPDATE BFESTIVAL SET fest_description='$hpdescrip'";
  $hpdescripcommit = $conn->query($hpdescripread);

  $success = "Homepage content updated successfully!";
  require("admin.php");
  exit();
 
} 

?>