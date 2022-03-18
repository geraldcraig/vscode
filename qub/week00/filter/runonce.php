<?php

    include("dbconn.php");

    $filename = "data/unirankingsdata.csv";

    $file = fopen($filename,"r");


    $count = 0;
    while (($line = fgetcsv($file)) !== FALSE) {
   
        $rank = $line[0];
        $name = $line[1];
        $country = $line[2];

        $insert = "INSERT INTO  myrankings (unirank, uniname, unicountry) VALUES ('$rank','$name','$country')";

        $result = $conn->query($insert);

        if(!$result) {
                        
            echo $conn -> error;
                    
        } else {

            $count++;
        }
    }

    echo "<h3>Total of {$count} rows successfully inserted into database table.</h3>"

?>

