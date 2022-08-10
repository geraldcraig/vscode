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

// remove a member from an artist
if(!isset($_POST['removemember'])) {
  header("Location: admin.php");
} else {
  $removemember = $_POST['removemember'];
}

if(!isset($_POST['memid'])) {
  header("Location: admin.php");
} else {
  $delmemid = $_POST['memid'];
}

if(isset($removemember)) {

  $getmembername = "SELECT * FROM BMEMBER 
  INNER JOIN BARTIST ON pk_artist_id = fk_artist_id WHERE pk_member_id = $delmemid";
  $processgetmemebername = $conn->query($getmembername);

  $deletemember = "DELETE FROM BMEMBER WHERE pk_member_id = $delmemid";
  $processdelete = $conn->query($deletemember);

  $row = $processgetmemebername->fetch_assoc();
  $membername = $row['member_name'];
  $bandname = $row['name'];
  $success =  "$membername has been removed from $bandname successfully!";
  require("admin.php");
    exit();

}

?>
