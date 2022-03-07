<?php

    //include("php/functions.php");

	$albumid = $_GET['album_id'];

    $endpoint = "http://localhost/webdev/week00/lab10api/api.php?album_id=$albumid";

    $resource = file_get_contents($endpoint);

    $data = json_decode($resource, true);
    
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

		<a href='index.php'>
			<div id="header">
		
			</div>
		</a>

		<nav>
			<ul id='mynav'>
				<?php

					//$navbar = displaynav();

				?>
			</ul>
		</nav>
		
		<div id="content">
            <?php 
				foreach ($data as $row) {

				$namedata = $row['title'];
				$titledata = $row['year'];
				$yeardata = $row['name'];

			    echo "<div><h1>$titledata</h1></div>
                      <div class='album'>
                        <h2>Artist: $namedata</h2>
					    <h3>Album: $titledata</h3>
					    <p>Release Date: $yeardata</p>
					  </div>
                      <div><img src='img/albumart/$album.jpg'></div>";

				}
			?>	
		</div>
		
		
		<div id='containerb'>
			<div id='ftext'> Top Albums | By BBB online</div>
		</div>
		
	</div>

</body>
</html>