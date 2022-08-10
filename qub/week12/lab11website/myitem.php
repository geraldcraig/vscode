<?php

	include("dbconn.php"); 
	$itemid = $conn->real_escape_string($_GET["rowid"]);
	$read = "SELECT * FROM mytodolist WHERE id='$itemid' ";
	$result = $conn->query($read);
 
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
		
					if (!$result) {
				
						echo $conn->error;
					
					} else {
					
						while ($row=$result->fetch_assoc()) {
							
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
							
						
					}		
				?>
				
				<div style="clear:both;"></div>             
			</article> 
		</div>
		
	</div>

</body>
</html>
