<?php
include_once('components/navbar.php');
include_once('libraries/db.php');

if (isset($_SESSION)) {
    if (isset($_SESSION['UId'])) {
        header("Location: index.php");
        exit; // Important: After a redirect, exit the script to prevent further execution

    }
}

print_r($_SESSION)
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="styles/navbar.css">
    <link rel="stylesheet" href="styles/login.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="scripts/scripts.js"></script>

    <title>Login</title>
</head>



<body>
    <form method="POST" class="cont login">
        <div class="border">
            <div class="login-title">
                Pieslēgties
            </div>
            <p class="err">MAn</p>
            <div class="input">
                <p>Lietotājvārds</p>
                <input type="text" name="username">
            </div>
            <div class="input">
                <p>Parole</p>
                <input type="text" name="password">
            </div>
            <div class="submit">
                <button>Pieslēgties</button>
            </div>
            <a href="register.php" class="switch-login">neesi lietotājs?</a>
        </div>
    </form>
</body>

</html>