<!DOCTYPE html>
<html lang="en">
<head>
  <title>Album Website</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">Record Website</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</nav>
<br>

<div class="container">
  <h2>Add Album</h2>
	<form name="mylist" method="POST" action="processaddalbum.php" enctype="multipart/form-data">
    <div class="form-group">
			<label for="username">Number:</label> 
			<input type="text" id="myItemInput" name="number"/>
    </div>

		<div class="form-group">
			<label for="password">Artist:</label> 
			<input type="text" id="myItemInput" name="artist"/>
		</div>

    <div class="form-group">
			<label for="password">Title:</label> 
			<input type="text" id="myItemInput" name="title"/>
		</div>

    <div class="form-group">
			<label for="password">Year:</label> 
			<input type="text" id="myItemInput" name="year"/>
		</div>

    <div class="form-group">
			<label for="password">Genre:</label> 
			<input type="text" id="myItemInput" name="genre"/>
		</div>

    <div class="form-group">
			<label for="password">Sub-Genre:</label> 
			<input type="text" id="myItemInput" name="subgenre"/>
		</div>
						
			<button type="submit" class="btn btn-primary">Submit</button>			
  </form>
</div>

</body>
</html>
