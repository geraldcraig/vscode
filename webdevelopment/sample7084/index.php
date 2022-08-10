<?php

include("conn.php");

?>

<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8" name="viewport" content="width=ddevice-width, initial-scale=1.0">
        <title>
            QUB Houses
        </title>

        <link rel="stylesheet" href="css/skeleton.css">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/ui.css">

        <script src="//cdn.muicss.com/mui-0.10.0/js/mui.min.js"></script>
        <script src="//code.jquery.com/jquery-3.0.0.min.js"></script>

        <script>
            
            $(document).ready(function(){
                           
                           $('#sendvalue').click(function(e){
    
                                   e.preventDefault();
                                   num = $('#monthprice').val();
                                   num = num * 12;
                                   $('#fb').html('<strong>&pound'+num+'</strong> per year.');
    
                           });
                                  
            });
        </script>

    </head>

    <body class="container">
        <header class="head">
            Houses For Rent
        </header>

        <main>
        <table class="u-full-width">
            <thead>
                <tr>
                <th>home</th>
                </tr>
            </thead>
            <tbody>
                <?php

                    $read = "SELECT * FROM qubhouses";
                    $result = $conn->query($read);

                    while($row = $result->fetch_assoc()) {
                        $address = $row["address"];
                        $price = $row["pricePerMonth"];
                        $id = $row["id"];


                        echo "<tr>
                        <td>$address - <b>£$price</b> per month <a class='button' href='house$id.php'>DETAILS</a></td>
                        </tr>";
                    }
                
                ?>

            </tbody>
            </table>

           
                <!-- <div class="row">
                    calculate how much you pay per annum
                    <div class="row">
                        <div class="three columns">
                    <label for="Calculate">Enter amount per month:</label>
                        </div>
                        <div class="six columns">
                    <input class="u-full-width" type="number" placeholder="amount per month" id="calculate">
                    </div>
                    <div class="three columns calbu">
                    <input class="button-primary" type="submit" value="calculate">
                    </div>
                </div> -->
                
            
        </main>

        <form id="calculation" style="display: inline-block; vertical-align: top; width: 80%;">
       
                <p style="float: left; width: 20%">Enter amount per month: </p>
                </row>
                <input class="u-full-width" type="number"  placeholder="Enter monthly value" id="monthprice">
                <input class="button-primary" type="submit" value="calculate" id="sendvalue">
            </form>

            <div id="fb"></div>
    </body>

</html>