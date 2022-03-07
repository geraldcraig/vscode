$(function () {
    $mytitle = $("#title1").html();
    $mytitle2 = $("#title2").html();
    // $("#title1").html($mytitle2);  

    $(".title").hover(function () {
        $(this).css("color", "#00d1b2");
    },
        function () {
            $(this).css("color", "black");
        });

        $(".icon-id-badge").hover(function () {
            $(this).css("color", "#00d1b2");
        },
            function () {
                $(this).css("color", "black");
            });
       

});

//form field: put emphasis on input field when selected and place holder returns if field remains empty
$(function () {

    var empty = document.forms["pet"]["petname"].value;

    $("input").focus(function () {

        $(this).css("border-color", "#000");
        $("input").attr("placeholder", "");
    });

    $("input").blur(function () {

        //highlights input border red warning user of required empty field
        if (!this.value) {
            $(this).css("border-color", "red");
            $("input").attr("placeholder", "required field*");
            $('input').append($("<span>").text("Fields are empty").delay(4000).fadeOut(600));
        }
        //if field is not empty, border highlist is ignored
        else {
            $(this).css("border-color", "#00d1b2");
        }

    });

    $(document).ready(function(){
        $('#nav-icon1,#nav-icon2,#nav-icon3,#nav-icon4').click(function(){
            $(this).toggleClass('open');
        });
    });

});

