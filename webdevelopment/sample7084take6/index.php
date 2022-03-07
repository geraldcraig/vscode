<?php

    include("conn.php");

    $read = "SELECT * FROM buildings";
    $result = $conn->query($read);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="ui.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script>

        $(document).ready(function() {

            console.log("jQuery engine loaded")

            $("#onsubmit").click(function(e) {

                e.preventDefault();
                var month = $("#monthinput").val();
                var year = parseFloat(month)*12;

                if(month.length <= 0) {
                    console.log("form not submitted");

                } else {
                $("#totalrent").html($("<span><strong>&pound" + year + "</strong> per year.</span>").delay(2000).fadeOut(200));
            }
            });
        });

    </script>

</head>
<body>

    <div class="container">

        <header>
            <div class="row pagehead">
                <h1 class="u-pull-right">Houses for Rent</h1>
            </div>
        </header>

        <main>
            <div class="row tablehead">
                <h2>home</h2>
            </div>

            <div class="row table">
                <table class="u-full-width">
                    <tbody>
                        <?php

                            while($row = $result->fetch_assoc()) {
                                $address = $row["address"];
                                $price = $row["price"];

                                echo "<tr>
                                        <td>$address - <strong>&pound$price</strong> per month
                                        <a class='button u-pull-right' href='rent.php'>DETAILS</a>
                                        </td>
                                    </tr>";
                            }

                        ?>
                    </tbody>
                </table>
            </div>

            <form>
            <div class="row">
                <h3>Calculate how much you pay per annum</h3>
            </div>
                <div class="row">
                    <div class="two columns">
                        Enter amount per month:
                    </div>
                    <div class="five columns">
                        <input class="u-full-width" type="number" placeholder="i.e. 300" id="monthinput">
                    </div>
                    <div class="five columns">
                        <input class="button-primary" type="submit" value="CALCULATE" id="onsubmit">
                    </div>
                </div>
            </form>

            <div class="row"n id="totalrent">
            </div>
        </main>
    </div>
</body>
</html>