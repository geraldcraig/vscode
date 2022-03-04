<?php
    session_start();

    if (!isset($_SESSION['editpermission123'])) {    
        header("Location: index.php");
    } else { 
        unset($_SESSION['editpermission123']);
        header("Location: index.php");
    }
?>