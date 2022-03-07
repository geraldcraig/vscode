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

//   if($privileges != 1500 || 1501) {
//     header("Location: admin.php");
//     exit();
//   }

// remove a member from an artist
$removemember = $_POST['removemember'];
$delmemid = $_POST['memid'];


if(isset($removemember)) {

  $deletemember = "DELETE FROM BMEMBER WHERE pk_member_id = $delmemid";
  $processdelete = $conn->query($deletemember);
  header("Location: admin.php");
  die();

}

// add a member to an artist
$addmember = $_POST['addamember'];
$instid = $_POST['instrumentref'];
$membname = $_POST['membername'];
$artid = $_POST['artid'];

if(isset($addmember)) {

  $addnewmem = "INSERT INTO BMEMBER(name, fk_instrument_id, fk_artist_id) VALUES ('$membname', $instid, $artid)";
  $processaddmem = $conn->query($addnewmem);
  header("Location: admin.php");
  die();

}

?>
