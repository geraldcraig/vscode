<?php

    include("dbconn.php");

    $filename = "data/studentdata.csv";

    // get the resource object (open the file)
    $contents = fopen($filename, "r");

    // counter for output
    $num_students = 0;

    // loop to read each line from CSV file into $row array
    while ( ($row = fgetcsv($contents)) !== FALSE ) {
        
        echo "<div>";
        print_r($row);
        echo "</div>";

        // Perform insert queries
        // (1) INSERT INTO student_details: id (PK)
        // (2) INSERT IGNORE INTO student_classes: id (PK)
        // (3) INSERT INTO student_enrolements: id (PK), student_id (FK), class_id (FK)

    }

    echo "<h3>Total of {$num_students} students inserted into database table</h3>";
?>