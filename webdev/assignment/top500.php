<?php 
    include("php/functions.php"); 
    include("connections/dbconn.php"); 
 
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
<html>
<head>
    <title>Top Albums Lab Challenge</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="ui/styles.css">
</head>
<body>
    
    <div id='container'>
        <a href='index.php'>
            <div id="header">
     
            </div>
        </a>
    
        <nav>
            <ul id='mynav'>
                    <li><a href="index.php">Homepage</a></li>
                    <li><a href="top500.php">Top 500</a></li>
				    <li><a href="#">Favourite</a></li>
				    <li><a href="#">Owned</a></li>
                    <li><a href="#">Login</a></li>
                    <li><a href="#">Register</a></li>
				    <li><a href="#"></a></li>
			</ul>
        </nav>
        
        <div class="row">
			<div class="column  column-90">
				<h2>Top 500 Albums</h2>
			</div> 
			<div class="column">
				
			</div>
		</div>

		<table>
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
								<td><a href='edit.php?editid=$albumid' class='button button-outline'>More Info</a></td>
							</tr>";
						
					}   
				?>
			<tbody>
		</table>
	</div>
</body>
</html>