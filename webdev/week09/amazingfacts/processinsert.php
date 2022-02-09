<?php

    include('dbconn.php');

    $myfactdata = $conn -> real_escape_string($_POST["myfact"]);

    $insertquery="INSERT INTO myfacts (id, fact) VALUES (null, '$myfactdata')";
       
    $result = $conn -> query($insertquery);
    
    if(!$result) {
        
        echo $conn -> error;
    
    } else {
        
       header("Location: index.php");
       exit();
    }

?>

