<?php
 $mylist = array('John', 'Paul', 'George', 'Ringo');
?>
 
<!DOCTYPE html>
<html>
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>arrays 06</title>
    <link href="https://cdn.muicss.com/mui-0.10.0/css/mui.min.css" rel="stylesheet" />
    <link href="ui.css" rel="stylesheet" type="text/css" >
    <script src="https://cdn.muicss.com/mui-0.10.0/js/mui.min.js"></script>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js'> </script>
    <script>
        $(function() {
 
        });
    </script>
</head>
 
<body>
 
    <div class="mui-col-sm-10 mui-col-sm-offset-1">
 
        <h2>Arrays</h2>
        <p>The members of the bands the beatles are </p>
        
        <?php
        //print_r($mylist);
        $counter = 0;
        $listamount = count($mylist);
        echo "<ol class='mylistitem'>";
        while($counter < $listamount) {
            echo "<li>$mylist[$counter]</li>";
            $counter++;
        }
        echo "</ol>"
        ?>
    </div>
 
</body>
 
</html>
