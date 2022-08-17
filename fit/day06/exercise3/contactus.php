<!DOCTYPE html>
<html lang="en">

<head>
    <title>Contact Us</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="scripts/script.js"></Script>
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Contact Us</h1>
            <p class="lead">Have a question, fill out the form below and we will get back to you as soon as possible.</p>
        </div>
    </div>
    <div class="container">
        <div class="row mx-auto">
            <div class="col-sm-6">
                <form name="mylist" method="POST" action="processregister.php" enctype="multipart/form-data" onsubmit="validation()">
                    <div class="form-group">
                        <label for="fname">First name</label>
                        <input type="text" class="form-control" id="fname" placeholder="First Name" name="firstname">
                    </div>
                    <div class="form-group">
                        <label for="lname">Last Name</label>
                        <input type="text" class="form-control" id="lname" placeholder="Last Name" name="lastname">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else</small>
                    </div>
                    <div class="form-group">
                        <label for="comment">Comment:</label>
                        <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
                        <small id="maxlength" class="form-text text-muted">Max Length 280 characters</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col-sm-6">
                <img class="zoom" src="images/turntable.jpg" alt="logo" height="15%">
            </div>

            <div class="footer">
                <p>
                    My company Name, 12 Main Street, Liverpool, England
                </p>
                <a href="mailto:mike.maycock@gmail.com">Email Us...</a>
            </div>
        </div>
    </div>
</body>

</html>