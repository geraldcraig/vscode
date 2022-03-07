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
				<li class="nav-item"><a class="nav-link" href="userindex.php">Homepage</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Search</a></li>
        <li class="nav-item"><a class="nav-link" href="useralbumslist.php">Top 500</a></li>
        <li class="nav-item"><a class="nav-link" href="account.php">Account</a></li>
        <li class="nav-item"><a class="nav-link" href="logout.php">Log Out</a></li>
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
                    foreach ($data as $row) { 
                    
                        $number_data = $row['number'];
                        $album_data = $row['title'];
                        $artist_data = $row['name'];
                        $year_data = $row['year'];
                        $albumid = $row['id'];
                    
						        echo "<tr>
								              <td>$number_data</td>
                                <td>$album_data</td>
                                <td>$artist_data</td>
                                <td>$year_data</td>
								              <td><a href='https://i.discogs.com/glqJ1j_2BUON9ZSZLcEneh9dUhSqUItK9_3vfg6JbSg/rs:fit/g:sm/q:90/h:600/w:600/czM6Ly9kaXNjb2dz/LWltYWdlcy9SLTQ3/MDkxMi0xNjA3NzYx/MTgyLTU4MjQuanBl/Zw.jpeg' class='button button-outline'>More Info</a></td>
							              </tr>";
                    }
                ?>
			<tbody>
		</table>
        
    </div>
</body>
</html>