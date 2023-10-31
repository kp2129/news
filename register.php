<?php
include_once('components/navbar.php')

// skatās pēc $_GET['id'], saskaņot ar DB

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
    <title>Register</title>
</head>



<body>
    <form method="POST" class="cont register">
        <div class="border">
            <div class="login-title">Reģistrēties</div>
            <p class="err">MAn</p>
            <div class="input">
                <p>Lietotājvārds</p>
                <input type="text" name="username">
            </div>
            <div class="input">
                <p>Parole</p>
                <input type="text" name="password">
            </div>
            <div class="input">
                <p>Epasts</p>
                <input type="text" name="email">
            </div>
            <div class="submit">
                <button>Pieslēgties</button>
            </div>
            <a href="login.php" class="switch-login">esi lietotājs?</a>
        </div>
    </form>
</body>


</html>