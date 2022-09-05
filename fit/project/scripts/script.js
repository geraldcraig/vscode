/* jQuery for hero image to consume the header window space
$(document).ready(function () {
    $('.hero').height($(window).height());
}); */

document.getElementById("btnLoad").addEventListener("click", function () {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {

            document.getElementById("demo").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "specialOffers.txt", true);
    xhttp.send();
});

/* x = document.getElementById("demo5");

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        x.innerHTML = "geolocation is not supported by this browser"
    }
}

function showPosition(position) {
    x.innerHTML = "Latitude: " + position.coords.latitude +
        "<br>Longitude: " + position.coords.longitude;
}*/

