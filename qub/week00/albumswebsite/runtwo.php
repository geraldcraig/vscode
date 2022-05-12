<?php

    include("dbconn.php");

    $filename = "data/image.csv";

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
        // 1 - image table: id (PK), image 
        $image_insert = "INSERT  INTO image (number, image) VALUES ('$row[0]', '$row[1]') ";

        $result = $conn -> query($image_insert);
       
            
        if (!$result) {         
           echo $conn -> error;       
       } else {

       $num_records++;

         
      }
    }

    echo "<h3>Total of {$num_records} records inserted into database table</h3>";
?>