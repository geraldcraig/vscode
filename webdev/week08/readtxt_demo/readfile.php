
<?php

    // getting/finding the data file
    $filename = "data/kaggleurls.txt";
    $contents = file_get_contents($filename);

    // convert to PHP array (split array into string)
    $URLs = explode("\n", $contents);

    // dump out contents of array
    //print_r($URLs);

    $count = count($URLs);
    echo "<p>Total count of lines in file is: $count</p>";

    //loop around the array and diplay each line
    $num = 1;
    foreach($URLs as $link){

        // skip empty lines
        if(!empty($link)){
            echo "<p>({$num}): {$link} </p>";
            $num++;
        }
    }

?>