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
        // 1 - album_image table: id (PK), album_id, image_id
        $album_image_insert = "INSERT INTO album_image (album_id, image_id) VALUES ((SELECT id FROM album WHERE number = '$row[0]'),
                  (SELECT id FROM image WHERE number = '$row[0]')) ";

        $result = $conn -> query($album_image_insert);
       
            
        if (!$result) {         
           echo $conn -> error;       
       } else {

       $num_records++;
   
      } 
    }

    echo "<h3>Total of {$num_records} records inserted into database table</h3>";
?>