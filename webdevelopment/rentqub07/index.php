<?php
include("connect.php");

$read = "SELECT * FROM mylist07";
$result = $conn->query($read);

if(!$result) {
    echo $conn->error;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

	<link rel="stylesheet" href="css/mystyle.css" type="text/css">
   
</head>

<body>

<div id='head'>
	my list 07

</div>

    <?php

        echo "<ol>";

        while($row = $result->fetch_assoc()) {

            $id = $row['id'];
            $info = $row['info'];
            $datedue = $row['datedue'];
            $type = $row['type'];
            $details = $row['details'];

            echo "<li><a href='rent.php?title=$id'>$info</a></li>";
        }
        echo "</ol>";
    ?>


    


<?php




?>
			

</body>
</html>
