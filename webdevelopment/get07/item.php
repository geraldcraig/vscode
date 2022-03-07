<?php

$mytitle = $_GET['title'];
$price = $_GET['price'];


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GET Demo</title>

</head>

<body>

    <div class="myshop">
        <h1>my shop</h1>

        <?php

        echo "<h2>$mytitle</h2>";
        echo "<h3>$price</h3>";

        ?>

        <a href="index.php">back</a>
    </div>
    
</body>
</html>