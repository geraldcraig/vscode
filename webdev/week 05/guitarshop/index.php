<?php
    // initial array data will go here

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

                // PHP to populate product info should go here
                <?php


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
        
            <div class="columns is-mobile">
                <div class="column is-half">
                    <div class="card">
                        <div class="card-content">
                            <p class="title" id="product1"></p>
                            <p class="subtitle" id="price1"></p>
                        </div>
                        <footer class="card-footer">
                            <a href="#" class="card-footer-item">more info</a>
                        </footer>
                    </div>
                </div>
            
                <div class="column is-half">
                    <div class="card">
                        <div class="card-content">
                            <p class="title" id="product2"></p>
                            <p class="subtitle" id="price2"></p>
                        </div>
                        <footer class="card-footer">
                            <a href="#" class="card-footer-item">more info</a>
                        </footer>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>