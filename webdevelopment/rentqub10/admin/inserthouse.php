<?php

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
<p>
<a href='index.php' class='btn'>Dashboard</a>
</p>
<h1>Insert House</h1>

<form method='POST' action='processinsert.php' enctype='multipart/form-data' >
<p>
Address of property: 
<input type='text' value='' name='sentaddress' class='form-input'/>
</p>

<p>Type of property:

<select name='senttype' >
	<option value='Terrace'>Terrace</option>
	<option value='Bungalow'>Bungalow</option>
	<option value='Deatached'>Detached</option>
</select>

<p>
Area: 
<input type='text' value='' name='sentarea' class='form-input'/>
</p>

<p>
Description:
<textarea name='sentdescript' class='form-input' disabled ></textarea>
</p>


<p>
Number of beds: 
<select name='sentbeds' disabled>
	<option value='1'>One</option>
	<option value='2'>Two</option>
	<option value='3'>Three</option>
</select>
</p>

<p>
Price per month:
<input type='number' value='' name='sentprice' class='form-input' disabled/>

</p>

<p>upload image: <input type='file' name='uploadfile'></p>

<p>
<input type='submit' value='add house' class='btn btn-primary'>
</p>

</form>

<?php
?>
			
</div>
</body>
</html>
