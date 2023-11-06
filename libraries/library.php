<?php
require_once("db.php");

print_r($_POST);




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

// SALIEK VISUS ADMIN PAGE POSTUS
function AdminPage()
{
    $db = Sync();
    $allPosts = $db->GetAllPosts();
    $i = 0;
    $result = '';
    if ($allPosts['posts'] == false) {
        return '<p>No posts here!</p>';
    }
    foreach ($allPosts['posts'] as $post => $content) {
        $likeCount = $db->GetPostLikeCount($content[0]);
        // return $likeCount[0];
        $result .= '
        <div class="post">
            <div class="post-image" style="background-image: linear-gradient(to bottom,transparent,rgba(0, 0, 0, 0.75)),url(' . $allPosts['images'][$i][0] . ');">
                <button class="edit-post-button  button-style">' . sizeof($likeCount) . ' <img src="svg/hand-thumbs-up-fill.svg" alt=""></button>
                <button class="edit-post-button  button-style" id="' . $content[0] . '">edit</button>
            </div>
            <p class="post-title">' . $content[1] . '</p>

        </div>
        ';
        $i++;
    }

    return $result;
}
