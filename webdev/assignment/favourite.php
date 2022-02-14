<?php 
    include("php/functions.php"); 
    include("connections/dbconn.php"); 

	$filterdata = htmlentities($_GET['filter']);
 
    $readquery = "SELECT album.number, album.title, artist.name, album.year, album.id
    FROM album
    INNER JOIN artist
    ON album.artist_id = artist.id
    ORDER BY album.number"; 
 
    $result = $conn->query($readquery); 
 
    if (!$result) { 
        echo $conn->error; 
    } 
?>
 
<!DOCTYPE html>
<html lang="en">
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
                <li class="nav-item"><a class="nav-link" href="top500.php">Top 500</a></li>
				<li class="nav-item"><a class="nav-link" href="favourite.php">Favourite</a></li>
				<li class="nav-item"><a class="nav-link" href="owned.php">Owned</a></li>
                <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>	
			</ul>
		</nav>

        <div class="container">


<h2>Hover Rows</h2>
    <p>The .table-hover class enables a hover state (grey background on mouse over) on table rows:</p>            
<table class="table table-hover">
  <thead>
      <tr>
          <th>Number</th>
          <th>Album</th>
          <th>Artist</th>
          <th>Year</th>
          <th>More Info</th>
      </tr>
  </thead>
  <tbody>
      <?php
              
          // iterate through result set to display values
          while ($row = $result->fetch_assoc()) {
              
              $number = $row["number"];
              $album = $row["title"];
              $artist = $row["name"];
              $yr = $row["year"];
              $albumid = $row["id"];
              
              echo "<tr>	
                      <td>$number</td>
                      <td>$album</td>
                      <td>$artist</td>
                      <td>$yr</td>
                      <td><a href='album.php?id=$albumid' class='button button-outline'>More Info</a></td>
                  </tr>";
              
          }   
      ?>
</div>
</body>
</html>