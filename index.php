<?php
include_once('components/navbar.php')

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="scripts/scripts.js"></script>
    <link rel="stylesheet" href="styles/navbar.css">
    <link rel="stylesheet" href="styles/index.css">
    <title>Document</title>
</head>

<body>
    <!-- saņem no DB visus ierakstus. pirmie 2 ir lielie, pārējie ir mazie varianti -->
    <!-- skatīt pēc figma stila -->
    <div class="container">
        <!-- lielais variants (pirmajiem 2 ierakstiem)-->
        <div class="top-container">
            <a href="post.php?id=0" class="l-post-container">
                <img class="l-post-image" src="https://ichef.bbci.co.uk/news/976/cpsprodpb/EF66/production/_98268216_gettyimages-826469180-1.jpg.webp" alt="">
                <p class="l-post-title">LOL JK, Putins izsaka. Mediji pārsteigti par viņu angļu valodas un interneta kultūras izpratni</p>
                <div class="l-post-like-count button-style">
                    <p>12K</p>
                    <i class="bi bi-hand-thumbs-up-fill"></i>
                </div>
            </a>

            <a href="post.php?id=0" class="l-post-container">
                <img class="l-post-image" src="https://ichef.bbci.co.uk/news/976/cpsprodpb/EF66/production/_98268216_gettyimages-826469180-1.jpg.webp" alt="">
                <div class="l-post-like-count button-style">
                    <p>139K</p>
                    <i class="bi bi-hand-thumbs-up-fill"></i>
                </div>
                <p class="l-post-title">LOL JK, Putins izsaka. Mediji pārsteigti par viņu angļu valodas un interneta kultūras izpratni</p>
            </a>
        </div>
        <!-- mazais variants (pārējiem) -->
        <div class="bottom-container">
            <a href="#" class="m-post-container">
                <img class="m-post-image" src="https://ichef.bbci.co.uk/news/976/cpsprodpb/EF66/production/_98268216_gettyimages-826469180-1.jpg.webp" alt="">
                <p class="m-post-title">LOL JK, Putins izsaka. Mediji pārsteigti par viņu angļu valodas un interneta kultūras izpratni</p>
            </a>

            <a href="#" class="m-post-container">
                <img class="m-post-image" src="https://ichef.bbci.co.uk/news/976/cpsprodpb/EF66/production/_98268216_gettyimages-826469180-1.jpg.webp" alt="">
                <p class="m-post-title">LOL JK, Putins izsaka. Mediji pārsteigti par viņu angļu valodas un interneta kultūras izpratni</p>
            </a>

            <a href="#" class="m-post-container">
                <img class="m-post-image" src="https://ichef.bbci.co.uk/news/976/cpsprodpb/EF66/production/_98268216_gettyimages-826469180-1.jpg.webp" alt="">
                <p class="m-post-title">LOL JK, Putins izsaka. Mediji pārsteigti par viņu angļu valodas un interneta kultūras izpratni</p>
            </a>

            <a href="#" class="m-post-container">
                <img class="m-post-image" src="https://ichef.bbci.co.uk/news/976/cpsprodpb/EF66/production/_98268216_gettyimages-826469180-1.jpg.webp" alt="">
                <p class="m-post-title">LOL JK, Putins izsaka. Mediji pārsteigti par viņu angļu valodas un interneta kultūras izpratni</p>
            </a>
            <a href="#" class="m-post-container">
                <img class="m-post-image" src="https://ichef.bbci.co.uk/news/976/cpsprodpb/EF66/production/_98268216_gettyimages-826469180-1.jpg.webp" alt="">
                <p class="m-post-title">LOL JK, Putins izsaka. Mediji pārsteigti par viņu angļu valodas un interneta kultūras izpratni</p>
            </a>
            <a href="#" class="m-post-container">
                <img class="m-post-image" src="https://ichef.bbci.co.uk/news/976/cpsprodpb/EF66/production/_98268216_gettyimages-826469180-1.jpg.webp" alt="">
                <p class="m-post-title">LOL JK, Putins izsaka. Mediji pārsteigti par viņu angļu valodas un interneta kultūras izpratni</p>
            </a>

        </div>
    </div>
</body>

</html>