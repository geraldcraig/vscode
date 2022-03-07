<?php

$uname = $_POST['name'];
$uni = $_POST['university'];
$startyear = $_POST['startyear'];
$finishyear = $_POST['finishyear'];

$enrol = $finishyear - $startyear;

?>

<!DOCTYPE html>

<html>

    <head>

        <meta content="text/html; charset-=utf-8" http-equiv="Content-Type">
        
        <title>
        Users 
        </title>

        <link rel="stylesheet" href="style.css" type="text/css">
    </head>

    <body>

        <div id="container">

            <div id="top">Users</div>

            <div id="main">
            
               <div id="users">
               <?php

               if(empty($uname)) {
                    echo " Please <a href='users.php'>Go Back</a> and enter your name to continue";
               } else {
               
                    echo "<p>please see the details below to confirm if the are correct</p>";
                    echo "<div id='variable'>$uname started $uni in $startyear";
                    echo " and finished in $finishyear, spending $enrol years at the university.</div>";
                    echo "please go to the <a href='next.php?username=$uname'>next</a>";
                    echo " section to pass your name onto the next php file";
               
               }
               ?>

               </div>

            </div>

            <div id="footer">footer</div>

        </div>
    </body>

</html>