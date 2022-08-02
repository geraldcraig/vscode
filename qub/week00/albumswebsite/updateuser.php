<?php

session_start();

if (!isset($_SESSION['user'])) {
  $showBtn =false;
} else {
  $showBtn = true;
  $currentUser = $_SESSION['user'];
}

$endpoint = "http://localhost/qub/week00/albumsapi/api.php?user";

//$endpoint = "http://gcraig15.webhosting6.eeecs.qub.ac.uk/albumsapi/api.php?user";

$result = file_get_contents($endpoint);

$data = json_decode($result, true);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Record Website</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="ui/styles.css">
</head>

<body>

<nav class="navbar navbar-expand-lg bg-secondary navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Record Website</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
</nav>


<div class="container mt-3 bg-secondary">
  <h2>Update form</h2>
	<form name="mylist" method="POST" action="processupdateuser.php" enctype="multipart/form-data">

<?php

    foreach($data as $row) {

      $fname = $row['firstname'];
      $lname = $row['lastname'];
      $uname = $row['username'];
      $pword = $row['userpassword'];
      $userid = $row['id'];

      if ($uname == $currentUser) {

    echo "
    <div class='form-group'>
			<label for='firstname'>First Name:</label> 
			<input value='$fname' type='text' id='firstname' name='firstname' required/>
    </div>

		<div class='form-group'>
			<label for='lastname'>Last Name:</label> 
			<input value='$lname' type='text' id='lastname' name='lastname' required/>
		</div>

    <div class='form-group'>
			<label for='username'>Username:</label> 
			<input value='$uname' type='text' id='username' name='username' required/>
		</div>

    <div class='form-group'>
			<label for='password'>Password:</label> 
			<input value='$pword' type='password' id='password' name='password' required/>
		</div>

    <div class='form-group'>
			<input value='$userid' type='hidden' id='password' name='userid' required/>
		</div>
    
    <button type='submit' class='btn btn-primary'>Submit</button>	
  </form> ";
    }
  } 
?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>