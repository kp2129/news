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
    <link rel="stylesheet" href="styles/post.css">
    <title>Document</title>
</head>

<!-- content vietā var ielikt no DB php variables -->

<!-- priekš jums sadaļā pirmie 3 (izņemot to kuru jau skatās) ierakstus -->
<!-- mazo ierakstu TITLE jābūt samazinātam līdz 40 characters. Ja ir vairāk, noīsināt uz 37 un ielikt 3 punktus -->

<!-- like poga varianti: bi-hand-thumbs-up, bi-hand-thumbs-up-fill, atkarībā vai lietotājs ir spiedis "like" šim ierakstam -->

<body>
    <div class="container">
        <!-- kreisā daļa (Post sadaļa) -->
        <div class="post-container">
            <button class="post-like-button button-style">
                <i class="bi bi-hand-thumbs-up"></i>
            </button>
            <img class="post-image" src="https://ichef.bbci.co.uk/news/976/cpsprodpb/EF66/production/_98268216_gettyimages-826469180-1.jpg.webp" alt="">
            <p class="post-title">$TITLE</p>

            <div class="post-details-container">
                <p class="post-details">$AUTORS • $CREATION_DATE • $LIKE_COUNT</p>
                <i class="bi bi-hand-thumbs-up-fill"></i>
            </div>

            <div class="post-content-container">
                <p class="post-content">
                    $CONTENT
                </p>
            </div>
        </div>

        <!-- labā daļa (Priekš jums sadaļa) -->
        <div class="suggestions-container">
            <p class="suggestions-title">
                Priekš Jums
            </p>
            <a href="#" class="m-post-container">
                <img class="m-post-image" src="https://ichef.bbci.co.uk/news/976/cpsprodpb/EF66/production/_98268216_gettyimages-826469180-1.jpg.webp" alt="">
                <p class="m-post-title">LOL JK, Putins izsaka. Mediji pārstei...</p>
            </a>

            <a href="#" class="m-post-container">
                <img class="m-post-image" src="https://ichef.bbci.co.uk/news/976/cpsprodpb/EF66/production/_98268216_gettyimages-826469180-1.jpg.webp" alt="">
                <p class="m-post-title">LOL JK, Putins izsaka. Mediji pārstei...</p>
            </a>

            <a href="#" class="m-post-container">
                <img class="m-post-image" src="https://ichef.bbci.co.uk/news/976/cpsprodpb/EF66/production/_98268216_gettyimages-826469180-1.jpg.webp" alt="">
                <p class="m-post-title">LOL JK, Putins izsaka. Mediji pārstei...</p>
            </a>
        </div>
    </div>
</body>

</html>