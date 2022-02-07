<?php

    include("dbconn.php");

    $filename = "data/album_list.csv";

    if (file_exists($filename)) {

        // open the file (read only)
        $contents = fopen($filename, "r");

        // iterate to read each line from the CSV file
        $count = 0;
        while( ($row = fgetcsv($contents)) !== FALSE ) {

            //print_r($row);

            // Only want the statename, 2018 population, 2019 population from the line
            $number = $row[0];
            $year = $row[1];
            $album = $row[2];
            $artist = $row[3];


            // create the INSERT query
            $sql = "INSERT IGNORE INTO artist (artist) VALUES ('$artist')";

            // execute the query
            $result = $conn->query($sql);

            if(!$result){
                echo $conn->error;
            } else {
                $count++;
            }
        }

        echo "<h3>Total of {$count} rows successfully inserted into database table.</h3>";

    } else {

        echo "<h3>Error: $filename file doesn't exist!</h3>";

    }
?>
