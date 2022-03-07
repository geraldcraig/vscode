<?php
	include("connect.php");

	$read = "SELECT * FROM $table_name";

	$result = $conn->query($read);

	if(!$result){
		echo $conn->error;	
	}

	
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
    <link rel="stylesheet" href="css/mystyle.css">
</head>

<body>

<div id='head'>
	<h2>QUB Rent 4 U</h2> 
	<a href='index.php'><img src='https://assets.dryicons.com/uploads/icon/svg/9948/a2a5ed2f-fdaf-46e0-870b-ab046e23c1d5.svg'>
	</a>
</div>

<div class="container customwidth">


<?php

while ($row = $result->fetch_assoc()){
	
		$address_data = $row['address'];
		$propertyid = $row['id'];
	
		echo " <div class='columns pad'>
				<div class='column'>$address_data</div>
				<div class='column col-auto'>
					<a href='rent.php?house=$propertyid' class='btn'>see price</a>
				</div>
			</div> ";
}

?>
			
</div>

</body>
</html>
