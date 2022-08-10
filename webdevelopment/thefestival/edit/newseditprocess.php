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

$newsid = $_POST['newsid'];

if(!isset($_POST['updatenewsstory'])) {
    header("location: admin.php");
} else {
    $updatenewsstory = $_POST['updatenewsstory'];
}

if(isset($updatenewsstory)) {

    $newsid = $_POST['newsid'];
    $newstype = $_POST['newstypeedit'];
    $newstitle = $_POST['newstitleedit'];
    $newsbody = $_POST['newsbodyedit'];
    $seemorelink = $_POST['seemorelinkedit'];

    $newstype = mysqli_real_escape_string($conn, $newstype);
    $newstitle = mysqli_real_escape_string($conn, $newstitle);
    $newsbody = mysqli_real_escape_string($conn, $newsbody);
    $seemorelink = mysqli_real_escape_string($conn, $seemorelink);

    $newsupdate = "UPDATE BNEWS SET type='$newstype',title='$newstitle',content='$newsbody',
    url='$seemorelink' WHERE news_id = $newsid";
    $newsupdatedb = $conn->query($newsupdate);

    $success = "News story updated successfully!";
    require("admin.php");
    exit();
} else {
}
?>
