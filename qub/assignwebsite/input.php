<?php

    $endpoint = "http://localhost/webdev/assignapi/api.php";

    $resource = file_get_contents($endpoint);

    $data = json_decode($resource,true);
?>

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
  <link rel="stylesheet" href="ui/localui.css">
</head>

<body>

<div class="container">
    <h1>User input</h1>

    <form method="POST" action="process.php">
        <p>
            Name: <input type="text" name="username" required/>
        </p>
        
        <p>
            <input type="submit" value="send info"/>
        </p>
    </form>
</div>

</body>

</html>