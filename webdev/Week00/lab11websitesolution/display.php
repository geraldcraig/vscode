<?php

	$endpoint = "http://localhost/webdev/week00/lab11apisolution/api.php";

	$resource = file_get_contents($endpoint);

	$data = json_decode($resource, true);
 
?>

<!DOCTYPE html>
<html>

<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
	<title>Things To Do</title>
	<link rel="stylesheet" href="styles/mylist.css" >
</head>

<body>
	<div id="container">

		<div id="top">	
			<a href='index.php'><div class='addright'> ADD TO DO</div></a>
			<div id="title">My ToDo List</div>	
		</div>
						
		<div id="main">		
			<article>	
				<ul id='myListText'>
				
				<?php
					
					// iterate through result set 
					foreach ($data as $row) {
							
						// get data from column 'info'
						$listdata = $row['info'];
								
						//get data from column 'duedate'  
						$listdate = $row['datedue'];

						//needs to be formatted to be day-month-year				
						$duedate = date('d-m-Y', strtotime($listdate));

						$iddata = $row['id'];
							
						echo "<a href='myitem.php?rowid=$iddata'> 
								<li> $listdata 
								<div class='dateright'>date due: 
								<strong>$duedate</strong> 
								</div>
								</li>
								</a>";
					}		
				?>
					
				</ul>
			</article> 
		</div>
		
	</div>
</body>

</html>
