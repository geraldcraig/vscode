<?php

    include("dbconn.php");

    $filename = "data/2019usapop.csv";

    if (file_exists($filename)) {

        // open the file (read only)
        $contents = fopen($filename, "r");

        // iterate to read each line from the CSV file
        $count = 0;
        while( ($row = fgetcsv($contents)) !== FALSE ) {

            //print_r($row);

            // Only want the statename, 2018 population, 2019 population from the line
            $statename = $row[0];
            $year18 = $row[1];
            $year19 = $row[2];

            // Do some pre-processing to generate another database table column value for 2020 population
            $random = rand(-9999, 10000);
            $year20 = $year19 + $random; 

            // create the INSERT query
            $sql = "INSERT INTO mypopulation (statename, pop2018, pop2019, pop2020) VALUES ('$statename','$year18','$year19','$year20')";

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
