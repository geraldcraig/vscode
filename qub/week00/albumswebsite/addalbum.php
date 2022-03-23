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
			<label for="number">Number:</label> 
			<input type="text" id="number" name="number"/>
    </div>

    <div class="form-group">
			<label for="title">Title:</label> 
			<input type="text" id="title" name="title"/>
		</div>

    <div class="form-group">
			<label for="image">Image:</label> 
			<input type="text" id="image" name="image"/>
		</div>

    <div class="form-group">
			<label for="genre">Genre:</label> 
			<input type="text" id="genre" name="genre"/>
		</div>

    <div class="form-group">
			<label for="subgenre">Sub-Genre:</label> 
			<input type="text" id="sungenre" name="subgenre"/>
		</div>

	<div class="form-group">
			<label for="artist">Artist:</label> 
			<input type="text" id="artist" name="artist"/>
		</div>

		<div class="form-group">
			<label for="year">Year:</label> 
			<input type="text" id="year" name="year"/>
		</div>
						
			<button type="submit" class="btn btn-primary">Submit</button>			
  </form>
</div>



</body>
</html>
