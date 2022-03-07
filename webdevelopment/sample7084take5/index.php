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
        $(document).ready(function () {

            console.log("jQuery engine loaded")

            $("#submit").click(function(e) {

                $("#submit").find("span").remove();

                e.preventDefault();

                var annum = $("#amountrpm").val();
                var total = parseFloat(annum)*12;

                if(annum.length <=0 || annum == 0) {
                    console.log("form not submitted");
                } else {
                    $("#totalannum").html($("<p><strong>&pound" + total + "</strong> per year.</p>").delay(2000).fadeOut(300));
                }
            });

        });
    </script>

</head>

<body>

    <div class="container">
        
            <header class="pagehead">
                <div class="row">
                    <h1 class="u-pull-right">Houses for Rent</h1>
                </div>   
            </header>
        
    

        <main class="content">
            <div class="row">
                <h2>home</h2>
            </div>

            <table class='u-full-width'>
                <tbody>
                    <?php

                        while($row = $result->fetch_assoc()) {
                            $address = $row["address"];
                            $price = $row["price"];

                            echo "<tr>
                                    <td>$address - <strong>&pound$price</strong> per month 
                                    <a class= 'button u-pull-right' href='rent.php'>DETAILS</a>
                                    </td>
                                </tr>";
                        }
                    ?>

                </tbody>

            </table>

            
            <form>
                <div class="row formtitle">
                        <h3>Calculate how much you pay per annum</h3>
                </div>
                <div class="row">
                    <div class="two columns">
                        Enter amount per month
                    </div>
                    <div class="five columns">
                        <input class="u-full-width" type="number" placeholder="i.e. 300" id="amountrpm">
                    </div>
                    <div class="five columns">
                        <input class="button-primary" type="submit" value="CALCULATE" id="submit">
                    </div>
            </form>

            <div class="row" id="totalannum">

            </div>
        </main>
    </div>
</body>
</html>