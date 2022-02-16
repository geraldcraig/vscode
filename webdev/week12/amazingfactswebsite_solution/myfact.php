<!DOCTYPE html>
<html>
<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
	<title>Amazing Facts</title>
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
	<link rel="stylesheet" href="//cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
	<link rel="stylesheet" href="//cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">
</head>

<body>
	<div class="container">

		<div class="row">
			<div class="column"><h2>Add Some Facts</h2></div>
		</div>
		
		<div class="row">
			<div class="column">
 
				<form action='processinsert.php' method='POST'> 
					<p>
						<input type='text' name='myfact' required/>
					</p>
					
					<p>
						<input type='submit' value='insert fact'/>
					</p>
				</form>
			
			</div>
		</div>

	</div>
  
</body>
</html>
