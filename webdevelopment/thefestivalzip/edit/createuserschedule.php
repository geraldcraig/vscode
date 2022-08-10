<?php

session_start();

$privileges = $_SESSION['privileges'];
$display = $_SESSION['username'];
$sessiondetails = $_SESSION['session'];

if(!isset($_SESSION['session'])) {
  header("Location: ../login.php");
  exit();
} 

include("../conn.php");

// $createschedule = $_POST['createschedule'];
// $schedulelength = $_POST['schedulelength'];
// $schedulelength = $_POST['fridaylength'];
// $schedulelength = $_POST['saturdaylength'];
// $schedulelength = $_POST['sundaylength'];


if(!empty($_POST['schedulearray'])) {

    
        
        echo $newvalues = implode(",", $_POST['schedulearray']);

    $array = explode(",", $newvalues);

    print_r($array);

    $count  = count($array);

    $i =0;

    $refreshuserschedule = "DELETE FROM BUSCHEDULE WHERE fk_account_id = $sessiondetails";
    $refreshuserscheduleread = $conn->query($refreshuserschedule);

    while($i < $count) {

        $createschedule = "INSERT INTO BUSCHEDULE(fk_account_id, fk_performance_id) VALUES ($sessiondetails, $array[$i])";
        $createscheduleresult = $conn->query($createschedule);

        $i++;

    }

    header("Location: admin.php");
    exit();

}


?>