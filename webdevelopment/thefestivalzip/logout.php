<?php
    
    if(isset($_POST['logout'])) {
        unset($_SESSION['session']);
        session_destroy();

        header("Location: index.php");
    }

?>