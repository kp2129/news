<?php
<<<<<<< Updated upstream
include_once('components/navbar.php')
=======
include_once('components/navbar.php');
include_once('libraries/db.php');
$db = new Database;



if (isset($_GET['topic'])) {
    $topic = $_GET['topic'];

    $allNews = $db->select("SELECT na.*, ai.image_url
        FROM news_articles na
        INNER JOIN article_images ai ON na.article_id = ai.article_id
        INNER JOIN categories c ON na.category_id = c.category_id
        WHERE c.category_name = '$topic'
        ORDER BY na.views DESC
        LIMIT 100 OFFSET 2;
    ");

    $top2News = $db->select("SELECT na.*, ai.image_url
        FROM news_articles na
        INNER JOIN article_images ai ON na.article_id = ai.article_id
        INNER JOIN categories c ON na.category_id = c.category_id
        WHERE c.category_name = '$topic'
        ORDER BY na.views DESC
        LIMIT 2; 
    ");
} else {

    $top2News = $db->select("SELECT na.*, ai.image_url
        FROM news_articles na
        INNER JOIN article_images ai ON na.article_id = ai.article_id
        INNER JOIN categories c ON na.category_id = c.category_id
        ORDER BY na.views DESC
        LIMIT 2; 
    ");

    $allNews = $db->select("SELECT na.*, ai.image_url
        FROM news_articles na
        INNER JOIN article_images ai ON na.article_id = ai.article_id
        INNER JOIN categories c ON na.category_id = c.category_id
        ORDER BY na.views DESC
        LIMIT 100 OFFSET 2;
");
}
print_r($allNews);

print_r($top2News);


>>>>>>> Stashed changes

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
<<<<<<< Updated upstream
=======
    <?php print_r($_SESSION) ?>
>>>>>>> Stashed changes
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
            <?php foreach($allNews as $news) : ?>
                <a href="post.php?id=<?php  echo $news[0]; ?>" class="m-post-container">
                    <img class="m-post-image" src="<?php echo $news[8]; ?>" alt="">
                    <p class="m-post-title"><?php  echo $news[1]; ?></p>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>