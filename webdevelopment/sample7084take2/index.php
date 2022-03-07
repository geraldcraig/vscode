<?php
    // database connection file
    include("conn.php");

    // query database
    $read = "SELECT * FROM forrent";
    $result = $conn->query($read);

?>

<!DOCTYPE html>

<html>

    <head>

        <meta charset="UTF-8" name="viewpoint" content="device=device-width, initial-scale=1.0">

        <title>
        QUB Houses
        </title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.min.css">
        <link rel="stylesheet" href="ui.css" type="text/css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <script>
        
        $(document).ready(function() {

            $("#year-calc").click(function(e) {

                e.preventDefault();
                var annum = $("#monthrent").val();
                annum = annum*12;

                $("#perannum").html("<p><strong>£" + annum +" </strong> per year.</p>");

            });

        });
        
        
        
        </script>

    </head>

    <body>
        <!-- 80% width of page, centre aligned  -->
        <div class="container">

            <!-- page header -->
            <div class="row head">
                <h3 class="u-pull-right" id="pagetitle">Houses for Rent</h3>
            </div>

            <div class="row content">

                <div class="row tablehead">
                    <h3>home</h3>
                </div>

                <!-- page content -->
                <div class="row tablecontent">
                    <table class="u-full-width">
                        <tbody>
                        <!-- pull data from database and format in table layout -->
                            <?php

                                while($row = $result->fetch_assoc()) {

                                    $id = $row["id"];
                                    $address = $row["address"];
                                    $price = $row["price"];

                                    echo "<tr>
                                            <td>$address - <strong>£$price</strong> per month</td>
                                            <td><a class='button u-pull-right' href='rent.php'>DETAILS</a></td>
                                            </td>
                                        </tr>";
                                }
                            ?>
                        </tbody>
                    </table>

                    <!-- form to calculate rent per annum -->
                    <form>
                        <div class="row">
                            <h5>Calculate how much you pay per annum</h5>

                            <div class="row">

                                <div class="two columns">
                                    Enter amount per month
                                </div>

                                <div class="five columns">
                                    <input type="number" class="u-full-width" placeholder="i.e. 300" id="monthrent">
                                </div>

                                <div class="five columns">
                                    <input class="button-primary" type="submit" value="CALCULATE" id="year-calc">
                                </div>

                            </div>

                        </div>
                    </form>
                    
                    <!-- where result of form calculation is placed once submitted -->
                    <div id="perannum">
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>