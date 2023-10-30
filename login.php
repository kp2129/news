<?php
include_once('components/navbar.php');
include_once('libraries/db.php');


print_r($_POST);
if(isset($_POST['username']) && isset($_POST['password'])){
    $db = new Database;
    $username = $_POST['username'];
    $password = $_POST['password'];
    $result = $db->login($username, $password);
    print_r($result);
}


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
    <form  method="POST" class="cont">
        <div class="border">
            <div class="title">
                <h1>Pieslēgties</h1>
            </div>
            <div class="input">
                <div class="user">
                    <p>Lietotājvārds</p>
                </div>
                <input type="text" name="username">
                <div class="pass">
                    <p>Parole</p>
                </div>
                <input type="text" name="password">
            </div>
            <div class="submit">
                <button>Pieslēgties</button>

            </div>
        </div>
</form>
</body>

</html>