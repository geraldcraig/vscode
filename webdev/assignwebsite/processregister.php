<?php
    include("dbconn.php");

?>
 
<!DOCTYPE html>
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="ui/styles.css">
</head>
 
<body>
  <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1>Record Collection Website</h1>
    <p>Website for Top 500 albums.<p>
  </div>

  <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
			<ul class="navbar-nav">
				<li class="nav-item"><a class="nav-link" href="index.php">Homepage</a></li>
        <li class="nav-item"><a class="nav-link" href="albumslist.php">Top 500</a></li>
        <input class="form-control mr-sm-2" type="text" placeholder="Search">
        <button class="btn btn-success" type="submit">Search</button>
        <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
        <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
			</ul>
		</nav>
		
		<div id="main">
	
				
				<?php
					$myfirstname = $conn->real_escape_string($_POST['myfirstname']);
					$mylastname = $conn->real_escape_string($_POST['mylastname']);
					$mypassword = $conn->real_escape_string($_POST['mypassword']);


					 // create INSERT query string
					 $insertsql = "INSERT INTO user(first_name, last_name, password) 
					 VALUES('$myfirstname', '$mylastname','$mypassword')";	
		 
					 // perform the query
					 $result = $conn->query($insertsql);
 
										  
					 if (!$result) {
						 
						 echo $conn->error;
						 
					 } else {

                        echo "<p>Success: thank you {$myfirstname} {$mylastname} for registering</p>";
                     }

				?>

			</article> 
		</div>
	</div>
</body>

</html>