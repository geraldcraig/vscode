<?php

    include('dbconn.php');

    $myfactdata = $conn -> real_escape_string($_POST["myfact"]);

    $mytextdata = $_POST["mytext"];
    echo "<p>$mytextdata</p>";

    $insertquery="INSERT INTO myfacts (id, fact) VALUES (null, '$myfactdata')";
       
    $result = $conn -> query($insertquery);
    
    if(!$result) {
        
        echo $conn -> error;
    
    } else {
        
        // redirection using PHP header()
        header("Location: index.php");
        exit();
    }

?>
