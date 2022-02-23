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
    <h1>My Pet</h1>

    <form method="POST" action="process.php">
        <p>What is the name of your pet?</p>
        <input type="text" class="form" name="mypetname">

        <p>Type of animal?</p>
        <select class="form" name="pettype">
            <option value="Dog">dog</option>
            <option value="Cat">kitty</option>
            <option value="Rabbit">bunny</option>
        </select>

        <br>
        <input type="submit" value="send info" class="form full">
    </form>
</div>

</body>

</html>