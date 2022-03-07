<?php
     include("connect.php");
	 
	$houseid = $_GET['house'];
	
	$read = "SELECT * FROM $table_name WHERE id='$houseid' ";

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
	<a href='index.php'><img id='rent' src='https://assets.dryicons.com/uploads/icon/svg/9948/a2a5ed2f-fdaf-46e0-870b-ab046e23c1d5.svg'>
	</a>
</div>
<div class="container customwidth">


<?php
while ($row = $result->fetch_assoc()){
	
	$address_data = $row['address'];
	$desc = $row['description'];
	$imgpath = $row['image'];
	$pricedata = $row['price'];
	echo " <div class='columns'>
				<div class='column col-6'>
				
					<h2>$address_data</h2>

					<p>$desc </p>
					<h3>&pound; $pricedata </h3>
				</div>
				<div class='column col-6'>
					<img src='images/$imgpath' class='img-responsive'/>
				</div>
				
			</div> ";
	
	
}


?>
	<a href='index.php' class='btn btn-primary btn-lg'>back</a>		
</div>
</body>
</html>
