<?php

include("connect.php");

if(!isset($_GET['title'])) {
    header("Location: index.php");
}

$id = $_GET['title'];

$read = "SELECT * FROM mylist07 WHERE id=$id";
$result = $conn->query($read);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    
   
</head>

<body>

<div id='head'>
	Rent 4 U
</div>

<?php

while($row = $result->fetch_assoc()) {
    $info = $row['info'];
    $details = $row['details'];


    echo "<h2>$info</h2>
    
            <p>$details</p>";
}


?>
			

</body>
</html>
