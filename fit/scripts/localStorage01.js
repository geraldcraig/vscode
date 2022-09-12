/* Create a function to validate the form */
function validation() {
    /* Create variable to store the values from the form */
    var fname = document.getElementById("fname").value;
    var lname = document.getElementById("lname").value;
    var email = document.getElementById("email").value;
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
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var comment = document.getElementById("comment");
    var userInput1 = fname.value;
    var userInput2 = lname.value;
    var userInput3 = email.value;
    var userInput4 = comment.value;
    localStorage.setItem("fname", userInput1);
    localStorage.setItem("lname", userInput2);
    localStorage.setItem("email", userInput3);
    localStorage.setItem("comment", userInput4);
});

document.getElementById("btnGet").addEventListener("click", function()
{
    var fname = localStorage.getItem("fname");
    var lname = localStorage.getItem("lname");
    var email = localStorage.getItem("email");
    var comment = localStorage.getItem("comment");
    document.getElementById("result").innerHTML = "The data entered into the Contact Us form is: ";
    document.getElementById("result1").innerHTML = "First Name: " + fname;
    document.getElementById("result2").innerHTML = "Last Name:  " + lname;
    document.getElementById("result3").innerHTML = "Email Address: " + email;
    document.getElementById("result4").innerHTML = "Comment: " + comment;
});