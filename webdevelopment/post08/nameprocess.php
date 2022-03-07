<?php

$name = $_POST['name'];

$query = "SELECT * FROM mytable WHERE name = '$name'";

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php

echo "<p>$name many thanks for the data</p>";

?>

    
</body>
</html>