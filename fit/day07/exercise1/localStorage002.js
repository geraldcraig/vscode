document.getElementById("btnSet").addEventListener("click", function()
{
    var data = document.getElementById("setData");
    var userInput = data.value;
    localStorage.setItem("userData", userInput);

});

document.getElementById("btnGet").addEventListener("click", function()
{
    var data = localStorage.getItem("userData");
    alert("The value store in localStorage for 'userData' is: " + data);
});