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
        alert("You must be enter a comment.") 
            return false;
        
    }

    alert("Thank you for your message \nWe will get back to you soon...");

}