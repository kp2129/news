<?php
include_once('components/navbar.php');
include_once('libraries/library.php');
include_once('libraries/db.php');
$conn = new Database;
$categories = $conn->select("SELECT * FROM categories");

if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] != 1) {
        header("Location: index.php");
        exit;
    }
}else{
    header("Location: index.php");
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/navbar.css">
    <link rel="stylesheet" href="styles/admin.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="scripts/scripts.js"></script>

    <title>Admin</title>
</head>

<body>
    <div class="container">
        <!-- JAUNÁKIE IERAKSTI  -->
        <!-- jaunākie raksti - visi raksti ievietoti savā "post" divā -->

        <div class="left-container">
            <p class="side-title">Jaunākie ieraksti</p>
            <div class="post-container">
                <?= AdminPage() ?>
            </div>
        </div>
        <!-- REDIĢĒT IERAKSTU -->
        <!-- rediģē selected ierakstu. JA NAV SELECTED, tad display:none top un bottom edit-containeriem -->
        <!-- ja ir JAUNS, tad rediģēt pogu pārdēvēt uz "izveidot" un dzēst pogu noņemt -->

        <!-- script.js ir admin formas funkcionalitāte -->
        <div class="right-container">
            <p class="side-title">Rediģēt ierakstu</p>
            <div class="edit-container">
                <div class="edit-top-container">
                    <form id="edit-form" action="" class="edit-form">
                        <div class="input-container">
                            <p>Virsraksts</p>
                            <input type="text" name="title">
                            <p id='err_title'></p>
                        </div>
                        <div class="input-container">
                            <p>Bilde</p>
                            <input type="text" name="image_url">
                            <p id='err_img'></p>
                        </div>

                        <div class="input-container">
                            <p>Kategorija</p>
                            <select name="kategorija">
                                <?php
                                foreach ($categories as $categorie) {
                                    echo "<option value=" . $categorie[0] . ">" . $categorie[1] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="input-container">
                            <p>Saturs</p>
                            <textarea name="content" class='input-textarea' name="" id="" cols="30" rows="13"></textarea>
                            <p id='err_content'></p>
                        </div>
                </div>
                <div class="edit-bottom-container">
                    <button id='new-post-button' class="edit-button button-style add-post">Pievienot jaunu</button>

                </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

