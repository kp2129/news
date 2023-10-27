<?php
include_once('components/navbar.php')

// IZVEIDOT CHECK VAI IR ADMINS VAI NAV LIETOJOT role_id no user tabulas

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/navbar.css">
    <link rel="stylesheet" href="styles/admin.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <title>Admin</title>
</head>

<body>
    <div class="container">
        <!-- JAUNÁKIE IERAKSTI  -->
        <div class="left-container">
            <div class="post-container">
                <div class="post">
                    <div class="button-overlay">
                        <button class="button-style">views</button>
                        <button class="button-style">edit</button>
                    </div>
                    <img src="https://ichef.bbci.co.uk/news/976/cpsprodpb/EF66/production/_98268216_gettyimages-826469180-1.jpg.webp" alt="">
                    <p class="post-title">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt, quae.</p>

                </div>
            </div>
        </div>
        <!-- REDIĢĒT IERAKSTU -->
        <div class="right-container">
            <div class="edit-container">
                a
            </div>
        </div>
    </div>
</body>

</html>