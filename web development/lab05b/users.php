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
            
                <form action="usercal.php" method="POST">

                    <div class="wrap">
                        Name:</br>
                        <input type="text" name="name" placeholder="please enter your name">
                    </div>

                    <div class="wrap">
                        University:</br>
                        <select name="university">
                            <option value="QUB">QUB</option>
                            <option value="UU">UU</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                    <div class="wrap">
                    Starting Year:</br>
                        <select name="startyear">
                            <option name="2011">2011</option>
                            <option name="2012">2012</option>
                            <option name="2013">2013</option>
                            <option name="2014">2014</option>
                            <option name="2015">2015</option>
                        </select>
                    </div>

                    <div class="wrap">
                    Finishing Year:</br>
                        <select name="finishyear">
                            <option name="2014">2014</option>
                            <option name="2015">2015</option>
                            <option name="2016">2016</option>
                            <option name="2017">2017</option>
                            <option name="2018">2018</option>
                            <option name="2019">2019</option>
                        </select>
                    </div>

                <input type="submit" name="submit" value="add user">

            </div>

            <div id="footer">footer</div>

        </div>
    </body>

</html>