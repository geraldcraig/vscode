<?php

// referenced from https://stackoverflow.com/questions/6249707/check-if-php-session-has-already-started
// if a session has already started with the presence of require later in the code, ignore this session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$privileges = $_SESSION['privileges'];
$display = $_SESSION['username'];
$sessiondetails = $_SESSION['session'];

if(!isset($_SESSION['session'])) {
  header("Location: ../login.php");
  exit();
} 

include("../conn.php");


if(!empty($_POST['schedulearray'])) {

    // add seperator between each id passed
    $newvalues = implode(",", $_POST['schedulearray']);

    // put newvalues into an array using the separator
    $array = explode(",", $newvalues);

    // get the size of the array
    $count  = count($array);

    // iterator to iterate through array
    $i = 0;

    // clear the users old schedule each time 
    $refreshuserschedule = "DELETE FROM BUSCHEDULE WHERE fk_account_id = $sessiondetails";
    $refreshuserscheduleread = $conn->query($refreshuserschedule);

    // add each value in the array to the user schedule table and end when array size has been met
    while($i < $count) {

        $createschedule = "INSERT INTO BUSCHEDULE(fk_account_id, fk_performance_id) VALUES ($sessiondetails, $array[$i])";
        $createscheduleresult = $conn->query($createschedule);

        $i++;

    }

    $success =  "Your user schedule has been updated successfully.  You can view this in the 'View Your Schedule' option below.";
    require("admin.php");
    exit();

} else {
    header("Location: admin.php");
    exit();
}


?>