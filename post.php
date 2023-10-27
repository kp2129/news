<?php
include_once('components/navbar.php');
include('libraries/db.php');
$db = new Database;

// skatās pēc $_GET['id'], saskaņot ar DB
$id = $_GET['id'];
$data = singleView($id);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/navbar.css">
    <link rel="stylesheet" href="styles/post.css">
    <!-- POST TITLE SAMAZINÁT LÍDZ APMÉRAM 7 CHARACTERIEM -->
    <title>$TITLE</title>
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

            <!-- KOMENTĀRI -->
            <div class="comments-container">
                <p class="section-title">
                    Komentāri
                </p>
                <!-- forma -->
                <div class="comment-submit-container">
                    <textarea name="" id="" cols="30" rows="10" class="comment-input">Ievadi komentāru!</textarea>
                    <button class="comment-submit-button button-style">Publicēt</button>
                </div>
                <!-- komentāri  -->
                <!-- LAI RĀDĪTU KOMENTĀRUS, KOPĒT comment-entry-container un ievadīt katra komentāra datus -->
                <div class="comment-entry-container">
                    <div class="comment-head">
                        <p class="comment-author">$AUTHOR</p>
                        <p class="comment-date">$DATE</p>
                    </div>
                    <p class="comment-content">$CONTENT</p>
                </div>
                <div class="comment-entry-container">
                    <div class="comment-head">
                        <p class="comment-author">Author</p>
                        <p class="comment-date">2023-10-23</p>
                    </div>
                    <p class="comment-content">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aspernatur at aliquam, minima, quod incidunt quas vel pariatur ad dignissimos distinctio iure, iste odit! Optio laudantium quod, ad quisquam iusto commodi.</p>
                </div>
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