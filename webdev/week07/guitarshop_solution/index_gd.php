<?php
    $guitars = array();
    
    $guitar1 = array("name" => "Fender Stratocaster", "price"=>"999.99");
    $guitar2 = array("name" => "Gibson Les Paul", "price"=>"1299.99");
    $guitar3 = array("name" => "Fender Telecaster", "price"=>"1599.99");
    $guitar4 = array("name" => "Epiphone Casino", "price"=>"899.99");
    $guitar5 = array("name" => "Gretsch G2655 ", "price"=>"649.99");
    $guitar6 = array("name" => "Fender Jazzmaster", "price"=>"1499.99");
    $guitar7 = array("name" => "Fender Jag-Stang", "price"=>"1399.99");
    $guitar8 = array("name" => "Ibanez Jem Junior", "price"=>"499.99");
    
    //adding all arrays into the $guitars array
    $guitars[] = $guitar1;
    $guitars[] = $guitar2;
    $guitars[] = $guitar3;
    $guitars[] = $guitar4;
    $guitars[] = $guitar5;
    $guitars[] = $guitar6;
    $guitars[] = $guitar7;
    $guitars[] = $guitar8;

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP Guitar Shop Challenge</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
    <link rel="stylesheet" href="ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    
    $(function(){
        $(".card").hide();
        $("#products").click(function() {
            if (this.id == "products") {
                $("#storepic").fadeOut(500);
                $(".card").show();

                // PHP to populate product info
                <?php

                    // NOT using a loop to populate products
                    /*
                    $name = $guitars[0]['name'];
                    $price = $guitars[0]['price'];
                    $nameselector = "#product1";
                    $priceselector = "#price1";
                    echo "console.log('$name');";
                    echo "console.log('$price');";
                    echo "$('#product1').text('$name');";
                    echo "$('#price1').text('£$price');";

                    $name = $guitars[1]['name'];
                    $price = $guitars[1]['price'];
                    $nameselector = "#product2";
                    $priceselector = "#price2";
                    echo "console.log('$name');";
                    echo "console.log('$price');";
                    echo "$('#product2').text('$name');";
                    echo "$('#price2').text('£$price');";
                    */

                    // Using a for loop
                    /*
                    $max = count($guitars);
                    for ($i = 0; $i < $max; $i++) {
                        $name = $guitars[$i]['name'];
                        $price = $guitars[$i]['price'];
                        $nameselector = "#product".($i + 1);
                        $priceselector = "#price".($i + 1);

                        // echo out to console
                        echo "console.log('$nameselector');";
                        echo "console.log('$priceselector');";

                        //echo out jQuery to webpage
                        echo "$('$nameselector').text('$name');";
                        echo "$('$priceselector').text('£$price');";
                    }
                    */
                ?>

                $("#products").prop("value", "home");
                $("#products").attr("id", "home");
            } else {
                $(".card").hide();
                $("#storepic").show();
                $("#home").prop("value", "display products");
                $("#home").prop("id", "products");
            }

        });


        /*
        $.ajax({
            url: "store.json",
            type: "GET",
            dataType: "json",
            success: function(data) {
        
                    for (var i = 0; i < data.length; i++) {
                        console.log("data[" + i + "] = " + data[i].name);
                        var name = data[i].name;
                        var price = data[i].price;
                        var nameselector = "#product" + (i + 1);
                        $(nameselector).text(name);
                        var priceselector = "#price" + (i + 1);
                        $(priceselector).text("£" + price);
                    }
            }
        });
        */

    });

</script>

</head>

<body>
    <section class="section">
        <div class="container">
        
            <div class="columns is-multiline is-mobile">
                <div class="column is-half">
                    <h2 class="title">Guitar Shop</h2>
                </div>
        
                <div class="column is-half has-text-right">
                    <input type="button" id="products" class="button is-info is-medium" value="display products" />
                </div>
        
                <div class="column">
                    <img id="storepic" src="img/guitars.jpeg">
                </div>
            </div>
        
        

         <div class="columns is-multiline is-mobile">

            <?php

                for ($i = 0; $i < count($guitars); $i++){
                    $name = $guitars[$i]["name"];
                    $price = $guitars[$i]["price"];

                    echo 
                    "<div class='column is-one-quarter'>
                        <div class='card'>
                            <div class='card-content'>
                                <p class='title' id='product1'>$name</p>
                                <p class='subtitle' id='price1'>$price</p>
                            </div>
                            <footer class='card-footer'>
                                <a href='#' class='card-footer-item'>more info</a>
                            </footer>
                        </div>
                    </div>";
                }


            ?>
            
            
            </div>
        </div>
    </section>
</body>

</html>