<?php

session_start();

if(!isset($_SESSION['adminuser'])) {
	echo "user not allowed";

	// header("Location: login.php");
}

$typeofuser = $_SESSION['typeuser'];

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

<h1><?php echo $typeofuser;?>Dashboard</h1>

<p>
<h3>Insert</h3>
<?php
if($typeofuser == 'admin') {
echo "<a href='inserthouse.php' class='btn'>Insert New House</a>";
}
?>
</p>

<?php
?>
			
</div>

</body>
</html>
