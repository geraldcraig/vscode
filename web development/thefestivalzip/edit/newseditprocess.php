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

//   if($privileges != 1500) {
//     header("Location: admin.php");
//     exit();
//   }


$deletestory = $_POST['deletestory'];
$newsdelete = $_POST['newsid'];
$addnewsstory = $_POST['addnewsstory'];
$updatenewsstory = $_POST['updatenewsstory'];
$cancelnews = $_POST['cancelnews'];

if(isset($deletestory)) {

    $newsdeletedb = "DELETE FROM BNEWS WHERE news_id = $newsdelete";
    $newsdeleteq = $conn->query($newsdeletedb);

    $read = "SELECT * FROM BNEWS";
    $result = $conn->query($read);

    header("Location: admin.php");
    die();

} else if (isset($addnewsstory)) {

    // add a news story to news stand

    $newstype = $_POST['newstype'];
    $newstitle = $_POST['newstitle'];
    $newsbody = $_POST ['newsbody'];
    $seemorelink = $_POST['seemorelink'];


    $newsinsert = "INSERT INTO BNEWS(type, title, content, url) VALUES ('$newstype', '$newstitle', '$newsbody', '$seemorelink')";
    $addnewsdb = $conn->query($newsinsert);

    header("Location: admin.php");
    die();

} else if(isset($updatenewsstory)) {

    $newsid = $_POST['newsid'];
    $newstype = $_POST['newstypeedit'];
    $newstitle = $_POST['newstitleedit'];
    $newsbody = $_POST['newsbodyedit'];
    $seemorelink = $_POST['seemorelinkedit'];

    $newsupdate = "UPDATE BNEWS SET type='$newstype',title='$newstitle',content='$newsbody',
    url='$seemorelink' WHERE news_id = $newsid";
    $newsupdatedb = $conn->query($newsupdate);

    header("Location: admin.php");
    die();

} else if (isset($cancelnews)) {
    
    header("Location: admin.php");
}
?>
