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
    <title>Login</title>
</head>


<body>
    <div class="cont">
        <div class="border">
            <div class="title">
                <h1>Pieslēgties</h1>
            </div>
            <div class="input">
                <div class="user">
                    <p>Lietotājvārds</p>
                </div>
                <input type="text">
                <div class="pass">
                    <p>Parole</p>
                </div>
                <input type="text">
            </div>
            <div class="submit">
                <button>Pieslēgties</button>
            </div>
        </div>
    </div>
</body>

</html>