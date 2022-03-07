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
if(!isset($_POST['memid'])) {
  header("Location: admin.php");
} else {
  $delmemid = $_POST['memid'];
}

// add a member to an artist
$addmember = $_POST['addamember'];

$instid = $_POST['instrumentref'];
$membname = $_POST['membername'];
$artid = $_POST['artid'];


if(isset($addmember)) {

  // sanitize string input
  $membname = mysqli_real_escape_string($conn, $membname);

  // insert member details to database
  $addnewmem = "INSERT INTO BMEMBER(member_name, fk_instrument_id, fk_artist_id) VALUES ('$membname', $instid, $artid)";
  $processaddmem = $conn->query($addnewmem);

  // get added member name from database to display in alert message
  $getmembername = "SELECT * FROM BMEMBER 
  INNER JOIN BARTIST ON pk_artist_id = fk_artist_id WHERE member_name = '$membname'";
  $processgetmemebername = $conn->query($getmembername);

  $row = $processgetmemebername->fetch_assoc();
  $membername = $row['member_name'];
  $band = $row['name'];
  
  // alert displayed on admin page
  $success =  "$membername has been added to $band successfully!";
  require("admin.php");
  exit();

}

?>
