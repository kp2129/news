<?php
include_once('components/navbar.php')

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet"  href="styles/style.css">
    <link rel="stylesheet" href="styles/navbar.css">

    <title>Login</title>
</head>
<body>

<header></header>
    <div class="container">
        <h1>Login</h1>
        <form action="process_file.php" method="post">
            <div class="form-group">
                <label>Lietotājvārds</label>
                <input type="text" id="username" name="username" placeholder="Email adress" required>
            </div>
            <div class="form-group">
            <label>Parole</label>
                <input type="password" id="password" name="password" placeholder="Password" required>
            </div>
            <input type="submit" value="Pieslēgties">
            <div class="form-group">
                <p>Don't have an account? <a href="#">Sign Up here!</a></p>
            </div>
        </form>
    </div>

    </body>
</html>
