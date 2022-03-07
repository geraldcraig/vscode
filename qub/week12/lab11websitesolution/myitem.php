<?php

	// get the ID of the row
	$itemid = $_GET['rowid'];
	
	// concatenate the ID onto the query parameter for the GET endpoint
	$endpoint = "http://localhost/webdev/week12/lab11apisolution/api.php?item=$itemid";

	$resource = file_get_contents($endpoint);

	$data = json_decode($resource, true);
 
?>


<!DOCTYPE html>

<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="styles/mylist.css">
	</head>
<body>
        
	<div id="container">
		
		<div id="top">	
			<a href='display.php'>
				<div class='addright'>Back to my list</div>
			</a>
			
			<div id="title">My ToDo List</div>	
		</div>
			
		<div id="main">	
			<article>
				<?php	
				
					foreach ($data as $row) {
							
						//get data from column 'info'
						$listdata = $row['info'];
							
						$datedue = $row['datedue'];
							
						//needs to be converted to be day-month-year
						$datedue = date('d-m-Y', strtotime($datedue));
							
						$typedata = $row["type"];
						$detailsdata = $row["details"];

						$imgname = $row["imgpath"];
							
							
						echo " <h2>$listdata</h2> 
								<div class='dateright'>date due: 
								<strong>$datedue</strong>";
								if ($imgname != 'Placeholder.png') {
									echo "<p><img src='uploads/$imgname'/></p>";
								}
										
								echo "</div>
								<p>Type: $typedata </p>
								<p>Details: $detailsdata </p>";
					}		
				?>
				
				<div style="clear:both;"></div>             
			</article> 
		</div>
		
	</div>

</body>
</html>
