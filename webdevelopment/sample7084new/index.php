<?php

    include("conn.php");

    $read = "SELECT * FROM housetable";
    $result = $conn->query($read);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>QUB Houses</title>

    <link rel="stylesheet" href="ui.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script>
    
    $(document).ready(function() {

        console.log("jQuery engine is running");

        $("#calc").click(function(e) {

            e.preventDefault();
            var annum = $("#rentpermonth").val();
            annumtotal= parseInt(annum)*12;

            if(annum.length <= 0 || annum == 0) {
                console.log("form not submitted");
                $("#rentpermonth").after($("<span>Please enter a value</span>").delay(2000).fadeOut(300));
            } else {
                $("#total").html($("<p><strong>£" + annumtotal + "</strong> per year.</p>").delay(2000).fadeOut(300));
            }

                
            

        });

    });
    
    
    </script>


</head>

<body>

    <div class="container">
        <header class="row head">
            <h1 class="u-pull-right">Houses for Rent</h1>
        </header>

        <div class="content">
           <div class="row tablehead">
                <h2>home</h2>
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
                                        </td>
                                    </tr>";
                            }

                        ?>
                    </tbody>
                </table>
           </div>

           <form>
                <div class="form">

                    <div class="row">
                        <h3 class="formh3">calculate how much you pay per annum</h3>
                    </div>

                    <div class="row">
                        <div class="two columns">
                            Enter amount per month
                        </div>

                        <div class="five columns">
                            <input class="u-full-width" type="number" placeholder="i.e. 300" id="rentpermonth">
                        </div>

                        <div class="five columns">
                            <input class="button-primary" type="submit" value="CALCULATE" id="calc">
                        </div>
                    </div>
                </div>
           </form>

           <div class="row" id="total">

           </div>

        </div>
    </div>
    
</body>
</html>