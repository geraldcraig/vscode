<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-all.min.css">
    <link rel="stylesheet" href="solar.css">
</head>

<body class=" h-vh-100 bg-dark">
    <div data-role="appbar" data-expand-point="md" class="bg-crimson fg-gray">
        <a href="#" class="brand no-hover">
            <span class="mif-spinner4 ani-spin black"> </span>  <span class="pl-2" >Solar Me</span>
        </a>

        <ul class="app-bar-menu">
            <li><a href="index.php">Home</a></li>
        </ul>
    </div>

    <div class="begincontent fg-white bg-black p-6 mx-auto border bd-default win-shadow">
        <?php
            echo "<div><h2>Login</h2></div>
                <form method='POST' action='processlogin.php'>
                <div class='form-group'>
                <label>Username</label>
                <input name='uname' type='text' class='metro-input' required='required' placeholder='Enter your username'>
                </div>
                <div class='form-group'>
                <label>Password</label>
                <input name='pword' type='password' class='metro-input' required='required' placeholder='Enter your password'>
                </div>
                <input class='button yellow outline pl-10 pr-10 mt-10 place-right' type='submit' value='login'>
                </form>";     
        ?>
    </div>

    <script src="https://cdn.metroui.org.ua/v4.3.2/js/metro.min.js"></script>

</body>
</html>