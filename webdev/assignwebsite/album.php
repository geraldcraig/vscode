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
				<li class="nav-item"><a class="nav-link" href="index.php">Homepage</a></li>
        <li class="nav-item"><a class="nav-link" href="top500.php">Top 500</a></li>
				<li class="nav-item"><a class="nav-link" href="favourite.php">Favourite</a></li>
				<li class="nav-item"><a class="nav-link" href="owned.php">Owned</a></li>
        <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
				<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
        <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
			</ul>
		</nav>

	<div id='container'> 

  <h2>Hover Rows</h2>
  			<p>The .table-hover class enables a hover state (grey background on mouse over) on table rows:</p>            
 		 <table class="table table-hover">
			<thead>
				<tr>
					<th>Number</th>
					<th>Album</th>
          <th>Year</th>
					<th>More Info</th>
				</tr>
			</thead>
		
		<div id="content">
    <?php
                    foreach ($data as $row) { 
                    
						        echo "<tr>
								              <td>{$row['number']}</td>
                                <td>$album_data</td>
                                <td>$year_data</td>
								              <td><a href='album.php?album_id=$albumid' class='button button-outline'>More Info</a></td>
							              </tr>";
                    }
                ?>
		</div>
		
		<div id='containerb'>
			<div id='ftext'> Top Albums | By BBB online</div>
		</div>
		
	</div>
  </div>

</body>
</html>