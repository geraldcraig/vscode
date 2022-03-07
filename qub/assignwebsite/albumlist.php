<?php

    $endpoint = "http://localhost/webdev/assignapi/api.php";

    $resource = file_get_contents($endpoint);

    $data = json_decode($resource,true);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
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
        		<li class="nav-item"><a class="nav-link" href="#">Search</a></li>
        		<li class="nav-item"><a class="nav-link" href="albumlist.php">Top 500</a></li>
        		<li class="nav-item"><a class="nav-link" href="login.php">Log In</a></li>
        		<li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
			</ul>
		</nav>

    <div id="main">		
			<article>	
				<ul id='myListText'>
				
				<?php
					
					// iterate through result set 
					foreach ($data as $row) {
							
						// get data from column 'info'
						$listdata = $row['number'];
								
						//get data from column 'duedate'  
						$listdate = $row['title'];


						$iddata = $row['id'];
							
						echo "<a href='album.php?rowid=$iddata'> 
								<li> $listdata 
								<div class='dateright'>date due: 
								<strong>$duedate</strong> 
								</div>
								</li>
								</a>";
					}		
				?>
					
				</ul>
			</article> 
		</div>
			
</div>
</body>
</html>