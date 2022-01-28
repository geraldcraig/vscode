<?php

    include("dbconn.php");

    $filename = "data/kaggleurls.csv";

    // get the resource object (open the file)
    $contents = fopen($filename, "r");

    // loop to read each line from CSV file into $row array
    $count = 0;
    while ( ($row = fgetcsv($contents)) !== FALSE ) {

        // dump out content of the line
        //print_r($row);
        
        // INSERT the contents of the row INTO the database
        $url = $conn -> real_escape_string($row[0]); //escaping the URL in case its necessary
        $rating = $row[1];
        $numcols = $row[2];
        
        // create the INSERT INTO query
        $insertquery = "INSERT INTO myinsertdataset (kagglelink, rating, totalcols) VALUES ('$url', '$rating', '$numcols')";
            
        // execute the query
        $result = $conn -> query($insertquery);
                    
        // check the result
        if(!$result) {
                        
            echo $conn -> error;
                    
        } else {

            $count++;
        }
    }

    echo "<h3>Total of {$count} rows successfully inserted into database table.</h3>"
?>