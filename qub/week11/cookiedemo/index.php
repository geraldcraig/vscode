<!DOCTYPE html>
<html>

<head>
  <title>Cookies Demo</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css">
  <link rel="stylesheet" href="myui.css">
</head>

<body>
  <div class="container">

    <div class="row">
        <div class="column column-60 mytitle"></div>
    </div>

    <div class="row">
      <div class="column column-60 myform">   
       
        <h1>Favourites from the Fab 4</h1>
        
        <form method="POST" action="processfav.php">
        <fieldset>
          <label for="guessField">Choose your fab 1!</label>
          <select id="guessField" name="myfavourite">
            <option disabled selected value> -- Select a Beatle -- </option>
            <option value="John">John</option>
            <option value="Paul">Paul</option>
            <option value="George">George</option>
            <option value="Ringo">Ringo</option>
          </select>
          
          <div class="float-right">
            <input class="button-primary" type="submit" value="save">
          </div>
             
        </fieldset>
        </form>

      </div>
    </div>
    
    <div class="row">
      <div class="column  column-60  myform"> 
          <div class="float-right"> 
            <a class="button button-outline" href="savedfav.php">The Favourite</a>
          </div>
      </div>
    </div>

  </div>

</body>
</html>