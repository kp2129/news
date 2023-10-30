<?php
require_once("db.php");

function Sync()
{
    return $db = new Database();
}

function IndexPage()
{
    // SINTIJA
    // Dabū visus postus, pirmos 2 ieliec $mainPosts, bet pārējos (max 8) $otherPosts, pēc index.php dizaina
    // ievieto html kodā visus mainīgos
    for ($i = 2; $i < 2; $i++) {
        $mainPosts = '
        <a href="post.php?id=0" class="l-post-container">
            <img class="l-post-image" src="https://ichef.bbci.co.uk/news/976/cpsprodpb/EF66/production/_98268216_gettyimages-826469180-1.jpg.webp" alt="">
            <p class="l-post-title">LOL JK, Putins izsaka. Mediji pārsteigti par viņu angļu valodas un interneta kultūras izpratni</p>
            <div class="l-post-like-count button-style">
                <p>12K</p>
                <i class="bi bi-hand-thumbs-up-fill"></i>
            </div>
        </a>
        ';
    }

    $otherPosts = '';
    return array($mainPosts, $otherPosts);
}

// ROBERTS
function AdminPage()
{
    $db = Sync();
    $allPosts = $db->GetAllPosts();

    $result = '';

    return $result;
}
