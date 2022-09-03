/* Create a function to validate the form */
function validation() {
    /* Create variable to store the values from the form */
    var fname = document.getElementById("setData1").value;
    var lname = document.getElementById("setData2").value;
    var email = document.getElementById("setData3").value;
    var comment = document.getElementById("comment").value;

    /* */
    if (fname == "") {
        alert("First name must be entered.");
        return false;
    }

    if (lname == "") {
        alert("Last name must be entered.") 
            return false;
        
    }

    if (!email.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/) || email == "") {
            alert("Email must be entered.")
            console.log("email missing @");
            return false;
        }

    if (comment == "") {
        alert("Comment must be entered.")
        return false;
    }
    
    alert("Thank you for your message \nWe will get back to you soon...");

}

document.getElementById("btnSet").addEventListener("click", function()
{
    var data1 = document.getElementById("setData1");
    var data2 = document.getElementById("setData2");
    var data3 = document.getElementById("setData3");
    var comment = document.getElementById("comment");
    var userInput1 = data1.value;
    var userInput2 = data2.value;
    var userInput3 = data3.value;
    var userInput4 = comment.value;
    localStorage.setItem("userData1", userInput1);
    localStorage.setItem("userData2", userInput2);
    localStorage.setItem("userData3", userInput3);
    localStorage.setItem("comment", userInput4);
});

document.getElementById("btnGet").addEventListener("click", function()
{
    var data1 = localStorage.getItem("userData1");
    var data2 = localStorage.getItem("userData2");
    var data3 = localStorage.getItem("userData3");
    var comment = localStorage.getItem("comment");
    document.getElementById("result").innerHTML = "The data entered into the Contact Us form is: ";
    document.getElementById("result1").innerHTML = "First Name: " + data1;
    document.getElementById("result2").innerHTML = "Last Name:  " + data2;
    document.getElementById("result3").innerHTML = "Email Address: " + data3;
    document.getElementById("result4").innerHTML = "Comment: " + comment;
});