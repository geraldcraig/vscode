<?php
include_once 'database.php';
mysqli_query($conn,"DELETE FROM myusers WHERE userId='" . $_GET["userId"] . "'");
header("Location:retrieve.php");
?> 