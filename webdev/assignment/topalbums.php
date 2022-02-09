<?php
	include("dbconn.php"); // need to specify relative path to file

	$read = "SELECT * FROM album_list";
	
	$result = $conn->query($read);
	
	if (!$result) {
		echo $conn -> error;
	}
?>

<html>
<head>  
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
	<link rel="stylesheet" href="//cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
	<link rel="stylesheet" href="//cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">
	<title>Top 500 Albums</title>
</head>

<body>
    <div class="container">

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
						
						$number = $row['number'];
						$yr = $row["year"];
						$album = $row["album"];
                        $artist = $row["artist"];
                        $cover = $row["cover"];
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