 
<!DOCTYPE html>
<html>
    <head>
       <meta charset="UTF-8">
       <title></title>

       <link href="https://cdn.muicss.com/mui-0.10.0/css/mui.min.css" rel="stylesheet" />
      <script src="https://cdn.muicss.com/mui-0.10.0/js/mui.min.js"></script>
      <script src='https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js'> </script>
      <link href="myui.css" rel="stylesheet" />
    </head>


    <body>
    <div class="mui-appbar">
  <h2 class="myh2">area calculated</h2>
</div>

    <div class="mui-container">
      <?php
        // put your code here
        $height = $_GET["heightdata"];
        $width = $_GET["widthdata"];
        $area=$height*$width;
        echo "<div class='myp'>Area of the rectangle is : <strong>$area</strong></div>";
      ?>
         </div>  
    </body>
</html>
 
 