<!DOCTYPE html>
<html>
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

        <div class="jumbotron jumbotron-fluid">
                <div class="container">
                <h1>Record Collection Website</h1>
                <p>Website for Top 500 albums.<p>
        </div>

                <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
		        <ul class="navbar-nav">
		                <li class="nav-item"><a class="nav-link" href="index.php">Homepage</a></li>
		        </ul>
		</nav>

<div class="container">
  <h2>Register form</h2>
	<form name="mylist" method="POST" action="processregister.php" enctype="multipart/form-data">
    <div class="form-group">
			<label for="username">First Name:</label> 
			<input type="text" id="myItemInput" name="username"/>
    </div>

		<div class="form-group">
			<label for="password">Password:</label> 
			<input type="text" id="myItemInput" name="password"/>
		</div>
						
		<div class="form-group form-check">
      <label class="form-check-label">
		    <input class="form-check-input" type="checkbox" name="remember">Accept terms and conditions.</label>	
		</div>
			<button type="submit" class="btn btn-primary">Submit</button>			
  </form>
	</div>
                       
</body>
 
</html>