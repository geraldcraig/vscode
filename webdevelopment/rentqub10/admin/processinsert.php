<?php
include('../connect.php');

$address = $conn->real_escape_string($_POST['sentaddress']);
$type = $conn->real_escape_string($_POST['senttype']);
$beds = 3;

$upload = $_FILES['uploadfile']['name'];
$location = $_FILES['uploadfile']['tmp_name'];

echo "<p>$upload $location</p>";

$move = move_uploaded_file($location,"../images/$upload");

$sqlinsert = "INSERT INTO $table_name (address, type, town, description, image, beds, price) VALUES ('$address', '$type', 'Belfast', 'This is a test paragraph.','$upload','$beds','100')" ;

$result = $conn->query($sqlinsert);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>qub rent</title>
	<link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre.min.css">
	<link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-exp.min.css">
	<link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-icons.min.css">
    <link rel="stylesheet" href="../css/mystyle.css">
</head>

<body>

<div id='headadmin'>
	<h2>QUB Rent 4 U</h2> 
	<a href='index.php'><img src='https://assets.dryicons.com/uploads/icon/svg/9948/a2a5ed2f-fdaf-46e0-870b-ab046e23c1d5.svg'>
	</a>
</div>

<div class="container customwidth">

<h1>House added.</h1>

<?php

if(!$result)
	{
	echo $conn->error;
		}else{
	echo "<p>$address ass been added successfully.</p>";
}

?>
			
</div>

</body>
</html>
