<?php
	include("php/functions.php");
	include("connections/dbconn.php");

	$readquery = "SELECT album.id, album.year, 
	                     album.title, artist.name
	              FROM album
				  INNER JOIN artist
				  ON album.artist_id = artist.id";

	$result = $conn->query($readquery);

	if (!$result) {
		echo $conn->error;
	}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Top Albums Challenge</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="ui/styles.css">
</head>
<body> 

	<div id='container'> 

		<nav>
			<ul id='mynav'>
      			<li><a href="#">London</a></li>
      			<li><a href="#">Paris</a></li>
      			<li><a href="#">Tokyo</a></li>
				  	<form action="/action_page.php">
  						<input type="search" id="gsearch" name="gsearch">
  						<input type="submit" value="Submit">
				 	</form>
			</ul>
		</nav>
		
		<div id="content">
			<h1>My Top Albums</h1>
			<?php
				while ($row = $result->fetch_assoc()) {

					$titledata = $row['title'];
					$yeardata = $row['year'];
					$artistdata = $row['name'];
					$albumid = $row['id'];

					echo "<a href='album.php?album_id=$albumid'>
							<div class='box'>
								<h2>$artistdata</h2>
								<h3>$titledata</h3>
								<p>$yeardata</p>
							</div>
						</a>";
				}
			?>	
			
		</div>
		
		
		<div id='containerb'>
			<div id='ftext'> Top Albums | By BBB online</div>
		</div>
		
	</div>

</body>
</html>
