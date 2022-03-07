<?php
include('connect.php');

$myfactdata = $conn->real_escape_string($_POST["myfact"]);

$insertquery="INSERT INTO 07newfacts (id, factcontent) VALUES (null, '$myfactdata')";
       
    $result = $conn->query($insertquery);
       
        if(!$result){

            $myfactdata = $conn->real_escape_string($_POST["myfact"]);
            
        }

        header("Location: http://mwalsh28.lampt.eeecs.qub.ac.uk/07amazingfacts/index.php");
                die();

?>
