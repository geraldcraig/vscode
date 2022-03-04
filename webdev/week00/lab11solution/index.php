
<!DOCTYPE html>
<html>

<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
	<title>Things To Do</title>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
	<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
	<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
	<link rel="stylesheet" href="styles/mylist.css" >
</head>

<body>
	<div id="container">
		<div id="top">
			<a href='display.php'>
				<div class='addright'>View My List</div>
			</a>
			<div id="title">My ToDo List</div>
		
		</div>
			<div id="main">

				<article>
					<fieldset id="instruct">
						<legend>Instructions</legend>
						Enter your details in the task and date fields, then press the Add Item button to store your task :)
					</fieldset>
					
					<form name="mylist" method="POST" action="insert.php" enctype="multipart/form-data">
					<fieldset>
						<legend>New Task</legend>
						
						<label for="task">Number:</label> 
						<input type="text" id="myItemInput" name="mytask" placeholder="Enter number"/>
						
						<div>
							<label for="due date">Year:</label> 
							<input type="text" id="datepick" name="mydate"/>
						</div>  
							
						<div style="clear:both;"></div> 
							
						<div>
							<label for="item details">Title:</label> 
							<textarea name="mydetails"></textarea>
						</div>

						<div>
							<input type="submit" id="addButton" value="Add Item">
						</div>

					</fieldset>			
					</form>

				</article> 
				
				<div style="clear:both;"></div>
				
			</div>

	</div>
</body>

</html>
