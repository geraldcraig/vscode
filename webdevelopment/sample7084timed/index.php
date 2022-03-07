<?php

// connection file to database
include("conn.php");

// SQL query to return ALL from table 'renthouses'
$read = "SELECT * FROM renthouses";
$result = $conn->query($read);

?>

<!DOCTYPE html>

<html>
    <head>

        <meta charset="UTF-8" type="viewpoint" content="width=device-width, initial-scale=1.0">

        <title>
            QUB Houses
        </title>

        <link rel="stylesheet" href="css/normalize.css" type="text/css">
        <link rel="stylesheet" href="css/skeleton.css" type="text/css">
        <link rel="stylesheet" href="css/ui.css" type="text/css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        
        <script>

        $(document).ready(function() {
            
            $("#calculate").click(function(e) {
                
                e.preventDefault();
                var annum = $("#monthrent").val();
                annum = annum * 12;

                $("#perannum").html("<p><strong>£" + annum + "</strong> per year.</p>")
            });

        });

        </script>

    </head>

    <body>

        <div class="container">

            <header class="pagehead">
                <div class="row">
                    <h3 class="u-pull-right">Houses for Rent</h3>
                </div>
            </header>

            <main class="maincontent">
                <div class="row">
                    <h4>home</h4>
                </div>

                <div class="row">
                    <table class="u-full-width">
                        <tbody>
                            <?php
                                while($row = $result->fetch_assoc()) {
                                    $id = $row["id"];
                                    $address = $row["address"];
                                    $price = $row["price"];

                                    echo "<tr>
                                            <td>$address - <strong>£$price</strong> per month
                                            <a class='button u-pull-right' href='rent$id.php'>DETAILS</a>
                                            </td>
                                        </tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>

                <form>
                    <div class="row">
                        <h5>Calculate how much you pay per annum</h5>
                    </div>
                    <div class="row">
                        <div class="two columns">
                        Enter amount per month:
                        </div>
                        <div class="five columns">
                            <input class="u-full-width" type="number" placeholder="i.e 300" id="monthrent">
                        </div>
                        <div class="five columns">
                                <input class="button-primary" type="submit" value="submit" id="calculate">
                        </div>
                    </div>
                </form>

                <div class="row" id="perannum">
                </div>
            </main>
        </div>
    </body>
</html>