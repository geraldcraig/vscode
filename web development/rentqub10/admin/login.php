<?php

session_start();

if(isset($_POST['loginname'])) {
	echo "form has been posted";
	include("../connect.php");
	$user = $_POST['loginname'];
	$pass = $_POST['loginpw'];

	$login = "SELECT * FROM 10qubrentusers WHERE username ='$user' AND password = '$pass'";
	$result = $conn->query($login);

	$numberofrows = $result->num_rows;

	while($row = $result->fetch_assoc()) {
		$type = $row['typeuser'];
	}

	

	echo $numberofrows;

	if($numberofrows > 0) {

		$_SESSION['adminuser'] = $user;
		$_SESSION['typeuser'] = $type;
		echo $_SESSION['typeuser'] = $type;
		header("Location: index.php");
	}

} else {
	echo "first visit";
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
    <link rel="stylesheet" href="../css/mystyle.css">
</head>

<body>

<div id='headadmin'>
	<h2>QUB Rent 4 U</h2> 
	<a href='index.php'><img src='https://assets.dryicons.com/uploads/icon/svg/9948/a2a5ed2f-fdaf-46e0-870b-ab046e23c1d5.svg'>
	</a>
</div>

<div class="container customwidth">

<h1>Login</h1>

<form method='POST' action='login.php' enctype='multipart/form-data' >
<p>
username:
<input type='text' value='' name='loginname' class='form-input'/>
</p>
<p>
password:
<input type='password' value='' name='loginpw' class='form-input'/>
</p>
<p>
<input type='submit' value='login' class='btn btn-primary'>
</p>

</form>

<?php
?>
			
</div>
</body>
</html>
