<?php

include("conn.php");

?>

<!DOCTYPE html>
<html>

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>My to do list</title>
    <link rel="stylesheet" href="styles/mylist.css">
    <link href="styles/cutegrids.css" rel="stylesheet">
</head>

<body>
    <header>
        my list
    </header>
    <div class="row">
        

    <?php

        $read = "SELECT * FROM mylist05";
        $result = $conn->query($read);

        if(!$result) {
            echo $conn->error;
        }

        while($row = $result->fetch_assoc()) {
            $info_data = $row["info"];
            $type_data = $row["type"];
            echo "<div class='cute-6-laptop cute-6-tablet'> 
                    <div class='boxhead'>
                        $type_data
                    </div>
                    <div class ='box'>
                        $info_data 
                    </div>
                </div>";
        }

    ?>


    </div>
</body>

</html>