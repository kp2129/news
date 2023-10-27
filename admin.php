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
        <!-- jaunākie raksti - visi raksti ievietoti savā "post" divā -->

        <div class="left-container">
            <p class="side-title">Jaunākie ieraksti</p>
            <div class="post-container">
                <div class="post">
                    <div class="post-image">
                        <button class="admin-button button-style">x (like icon)</button>
                        <button class="admin-button button-style">edit</button>
                    </div>
                    <p class="post-title">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt, quae.</p>

                </div>

                <div class="post">
                    <div class="post-image">
                        <button class="admin-button button-style">x (like icon)</button>
                        <button class="admin-button button-style">edit</button>
                    </div>
                    <p class="post-title">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt, quae.</p>

                </div>
            </div>
        </div>
        <!-- REDIĢĒT IERAKSTU -->
        <!-- rediģē selected ierakstu. JA NAV SELECTED, tad display:none top un bottom edit-containeriem -->
        <div class="right-container">
            <p class="side-title">Rediģēt ierakstu</p>
            <div class="edit-container">
                <div class="edit-top-container">
                    <form action="" class="edit-form">
                        <div class="input-container">
                            <p>Virsraksts</p>
                            <input type="text">
                        </div>
                        <div class="input-container">
                            <p>Bildes lokācija</p>
                            <input type="text">
                        </div>
                        <div class="input-container">
                            <p>Autors</p>
                            <input type="text">
                        </div>
                        <div class="input-container">
                            <p>Kategorija</p>
                            <select name="kategorija">
                                <option value="0">Example</option>
                            </select>
                        </div>
                        <div class="input-container">
                            <p>Saturs</p>
                            <textarea class='input-textarea' name="" id="" cols="30" rows="13"></textarea>
                        </div>
                </div>
                <div class="edit-bottom-container">
                    <button class="edit-button button-style">Dzēst</button>
                    <button class="edit-button button-style">Rediģēt</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>