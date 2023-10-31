<?php
include_once('components/navbar.php');
include_once('libraries/db.php');





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
            <div class="title">
                <h1>Pieslēgties</h1>
            </div>
            <input type="hidden" name="action" value="login">

            <div class="input">
                <div class="user">
                    <p>Lietotājvārds</p>
                </div>
                <input type="text" name="username">
                <span class="error errUser"></span> 
                <div class="pass">
                    <p>Parole</p>
                </div>
                <input type="password" name="password">
                <span class="error errPass"></span> 
            </div>
            <div class="submit">
                <button type="submit">Pieslēgties</button>
            </div>
        </div>
    </form>
</body>

</html>