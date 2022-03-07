<?php

include("conn.php");

$read = "SELECT * FROM houses";
$result = $conn->query($read);

?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Document</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.min.css">
    <link rel="stylesheet" href="ui.css" type="text/css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script>

        $(document).ready(function() {

            console.log("jQuery engine loaded");

            $("#submit").click(function(e) {

                e.preventDefault();
                var rent = $("#rpm").val();
                var tennancy = $("#tennancy").val();

                rent = parseInt(rent) * parseInt(tennancy);

                if(tennancy.length <=0 || rent.length <=0) {
                    console.log("form not submitted");
                    $("#rpm").after($("<span>please enter a value bigger than 0</span>").delay(2000).fadeOut(300));
                    $("#tennancy").after($("<span>please enter a value bigger than 0</span>").delay(2000).fadeOut(300));
                } else {
                    $("#total").html("<p><strong>£" + rent + " </strong> total tennancy.</p>");
                }
                
            });
        });
    
    </script>

</head>
<body>

    <div class="container">
        <header class="row head">
            <h3 class="u-pull-right">Houses for Rent</h3>
        </header>

        <div class="content">
            <div class="row">
                <h4>home</h4>
            </div>
            <div class="row">
                <table class="u-full-width">
                    <tbody>
                        <?php

                        while($row = $result->fetch_assoc()) {

                            $address = $row["address"];
                            $price = $row["price"];

                            echo "<tr>
                                    <td>$address - <strong>£$price</strong> per month
                                    <a class='button u-pull-right' href='rent.php'>DETAILS</a>
                                    <td>
                                </tr>";
                            
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <form>
                <div class="row">
                    <h5>Calculate the total cost of your rent</h5>
                </div>
                <div class="row">
                    <div class="two columns">
                        Enter amount per month:
                    </div>
                    <div class="three columns">
                        <input class="u-full-width" type="number" placeholder="i.e. 300" id="rpm">
                    </div>
                    <div class="two columns">
                        Enter the length of your tennancy:
                    </div>
                    <div class="two columns">
                        <input class="u-full-width" type="number" placeholder="i.e. 12" id="tennancy">
                    </div>
                    <div class="three columns">
                        <input class="button-primary" type="submit" value="CALCULATE" id="submit">
                    </div>
                </div>
            </form>

            <div id="total">

            </div>
        </div>
    </div>
</body>
</html>