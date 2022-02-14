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
                <nav class="navbar navbar-expand-sm bg-light">
		        <ul class="navbar-nav">
		                <li class="nav-item"><a class="nav-link" href="index.php">Homepage</a></li>
                                <li class="nav-item"><a class="nav-link" href="top500.php">Top 500</a></li>
		                <li class="nav-item"><a class="nav-link" href="#">Favourite</a></li>
		                <li class="nav-item"><a class="nav-link" href="#">Owned</a></li>
                                <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Register</a></li>
		                <li class="nav-item"><a class="nav-link" href="#"></a></li>
		        </ul>
		</nav>

                <div class="begincontent fg-white bg-black p-6 mx-auto border bd-default win-shadow">
                        <h2>Stacked form</h2>
                        <form action="/action_page.php">
                           <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                </div>
                <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
                </div>
                <div class="form-group form-check">
                        <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="remember"> Remember me
                        </label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
        </div>
                       
        </body>
 
</html>