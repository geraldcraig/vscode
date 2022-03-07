<?php
	include("dbconn.php");
	
	// perform SELECT query
	$read = "SELECT * FROM mytodolist";
	$result = $conn->query($read);
 
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
				
					if (!$result) {
						
						echo $conn->error;
						
					} else {
						
						// iterate through result set 
						while ($row = $result->fetch_assoc()) {

							//print_r($row);
							
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
					}		
				?>
					
				</ul>
			</article> 
		</div>
		
	</div>
</body>

</html>
