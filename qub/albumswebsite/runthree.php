<?php

    include("dbconn.php");

    $filename = "data/album_list.csv";

    // get the resource object (open the file)
    $contents = fopen($filename, "r");

    // counter for output
    $num_records = 0;

    // loop to read each line from CSV file into $row array
    while ( ($row = fgetcsv($contents)) !== FALSE ) {
        
        echo "<div>";
        print_r($row);
        echo "</div>";

        // Perform insert queries
        // 1 - album table: id (PK), numder, title, artist_id, year_id
        $album_insert = "INSERT INTO album (number, title, artist_id, year_id) VALUES ('$row[0]', '$row[2]',
                        (SELECT id FROM artist WHERE name = '$row[3]'), (SELECT id FROM year WHERE year = '$row[1]')) ";

        $result = $conn -> query($album_insert);
       
            
        if (!$result) {         
           echo $conn -> error;       
       } else {

       $num_records++;
   
      } 
    }

    echo "<h3>Total of {$num_records} records inserted into database table</h3>";
?>