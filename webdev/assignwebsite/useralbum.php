<?php

    //$itemid = $_GET['item'];

    $endpoint = "http://localhost/webdev/assignapi/api.php?id";

    $resource = file_get_contents($endpoint);

    $data = json_decode($resource,true);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Record Website</title>
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
				<li class="nav-item"><a class="nav-link" href="userindex.php">Homepage</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Search</a></li>
        <li class="nav-item"><a class="nav-link" href="usertop500.php">Top 500</a></li>
        <li class="nav-item"><a class="nav-link" href="account.php">Account</a></li>
        <li class="nav-item"><a class="nav-link" href="logout.php">Log Out</a></li>
			</ul>
		</nav>

	<div id='container'> 

		<div id="content">
    <?php
                  
                    
						        echo "<div><h1>{$row['number']}</h1</div>
                                <h2>$album_data</h2>
                                <h3>$year_data</h3>
								              <h3><a href='album.php?album_id=$albumid' class='button button-outline'>More Info</a></h3>";
                    
                ?>
		</div>
		
		<div id='containerb'>
			<div id='ftext'> Top Albums | By BBB online</div>
		</div>
		
	</div>
  </div>

</body>
</html>