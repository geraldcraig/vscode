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

  $updatepriv = $_POST['updateprivileges'];
  $removeacc = $_POST['deleteuser'];

  $privileges = $_POST['privileges'];
  $account = $_POST['rowid'];

  if(isset($updatepriv)) {

    $updateprivilege = "UPDATE BACCOUNT SET fk_privileges_id= $privileges WHERE pk_account_id = $account";
    $processprivupdate = $conn->query($updateprivilege);
    header("Location: admin.php");
    die();
  }



  if(isset($removeacc)) {

   $removeacc = "DELETE FROM BACCOUNT WHERE pk_account_id = $account";
   $processremove = $conn->query($removeacc);

    header("Location: admin.php");
    die();
  }

  ?>