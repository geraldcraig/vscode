<?php
	include('dbconn.php');
?>

<!DOCTYPE html>
<html>

<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
	<title>Things To Do</title>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="styles/mylist.css" >
</head>

<body>
	<div id="container">

		<div id="top">
			<div id="title">My ToDo List</div>
		</div>
		
		<div id="main">
			<article>
				
				<?php
					$myinfo = $conn->real_escape_string($_POST['mytask']);
					$mytaskdate = $conn->real_escape_string($_POST['mydate']);
					$mytype = $conn->real_escape_string($_POST['mytype']);
					$mydetails = $conn->real_escape_string($_POST['mydetails']);
					
					echo "<p>$myinfo</p>
						<p>$mytaskdate</p>
						<p>$mytype</p>
						<p>$mydetails</p>";

					$pic = $_FILES["imageup"]["name"];
					$pictemp = $_FILES["imageup"]["tmp_name"]; 


					if (!$pic) {

						$pic = "Placeholder.png";

					} else {
							   
						$move = move_uploaded_file($pictemp, "uploads/$pic");
					
						if(!$move) {
							echo "Error uploading the file: ".$_FILES["imageup"]["error"];
						}

					}

					 // date needs to be formatted to year-month-day for database table column				
					 $mydatedue = date('Y-m-d', strtotime($mytaskdate));

					 // create INSERT query string
					 $insertsql = "INSERT INTO mytodolist(info, datedue, type, details, imgpath) 
					 VALUES('$myinfo', '$mydatedue','$mytype','$mydetails', '$pic')";	
		 
					 // perform the query
					 $result = $conn->query($insertsql);
 
										  
					 if (!$result) {
						 
						 echo $conn->error;
						 
					 } else {
 
						 echo "<p>Thanks for adding the task.</p>
						 <a href='display.php'>
						 <div class='addright'>View My List</div>
						 </a>";	
					 }

				?>

			</article> 
		</div>
	</div>
</body>

</html>
