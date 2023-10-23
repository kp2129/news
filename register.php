<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="scripts/scripts.js"></script>
    <title>Register</title>
    <link rel="stylesheet"  href="style.css">

</head>
<body>
    <header></header>
    <div class="container">
        <h1>Register</h1>
        <form action="process_file.php" method="post">
            <div class="form-group">
                <input type="text" id="username" name="username" placeholder="Email adress" required>
            </div>
            <div class="form-group">
                <input type="password" id="password" name="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <input type="password" id="password" name="password" placeholder="Confirm Password" required>
            </div>
            <input type="submit" value="Register account">
            <div class="form-group">
            </div>
        </form>
    </div>

    
</body>
</html>