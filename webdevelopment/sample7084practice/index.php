<?php

include("conn.php");

$read = "SELECT * FROM qubhouses";
$result = $conn->query($read);

?>

<!DOCTYPE html>

<html>
    <head>

        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>
            Houses
        </title>

        <link rel="stylesheet" href="css/skeleton.css">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/ui.css">


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <script>

        $(document).ready(function() {

            $('#onclick').click(function(e) {

                e.preventDefault();
                var month = $("#monthrent").val();
                month = month * 12;
                $('#annualrent').html("<p><strong>£" + month + "</strong> per year.</p>");

            });
        });
            

        </script>

    </head>

    <body>
        <div class="container">
            <div class="row" id="head">
                <h3 class="u-pull-right" id="pagetitle">House For Rent</h3>
            </div>

            <div class="container-main">
                <div class="row" id="tabletitle">
                    <h4>home</h4>
                </div>

                <table class="u-full-width">
                    <tbody>
                            <?php

                                while($row = $result->fetch_assoc()) {

                                    $num = $row["id"];
                                    $address = $row["address"];
                                    $price = $row["pricePerMonth"];

                                    echo "<tr>
                                            <td>$address - <strong>£$price</strong> per month
                                            <a class='button u-pull-right' href='rent$num.php'>DETAILS</a>
                                            </td>
                                        </tr>";
                                }
                            ?>
                    </tbody>
                </table>

                <form>
                    <div class="row">
                        <h5>Calculate how much you pay per annum</h5>
                    </div>

                    <div class="row">
                        <div class="two columns">
                            <p>Enter amount per month:</p>
                        </div>
                        <div class="five columns">
                            <input class="u-full-width" type="number" placeholder="i.e. 300" id="monthrent">
                        </div>
                        <div class="five columns">
                            <input class="button-primary" type="submit" value="Submit" id="onclick">
                        </div>
                    </div>
                </form>

                <div class="row" id="annualrent"> 
                </div>
            </div>

            
        </div>
    </body>

</html>