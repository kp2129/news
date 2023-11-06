<?php
include_once('components/navbar.php');
include('libraries/db.php');
date_default_timezone_set('Europe/Riga');
$date = date('Y-m-d h:i:s');
$database = new Database();


$_session['id'] = 3;

$id = $_GET['id'];
$uid = $_session['id'];

$data = $database->single($id);
$single = $data['data'];

$data1 = $database->comments($id);


$comment = $data1['data'];

// echo '<pre>';
// echo var_dump($single);
// echo '</pre>';
// print_r($single[0]);
if(!empty($single[0][8])){
    $img = json_decode($single[0][8]);
}

$data2 = $database->suggestion($single[0][5]);
// print_r($data1);
$count = count($data2);

$like = $database->ifliked($id, $uid);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="scripts/scripts.js"></script>
    <link rel="stylesheet" href="styles/navbar.css">
    <link rel="stylesheet" href="styles/post.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="scripts/scripts.js"></script>
    <!-- POST TITLE SAMAZINÁT LÍDZ APMÉRAM 7 CHARACTERIEM -->
    <title><?= $single[0][1] ?></title>
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
                <i class="bi bi-hand-thumbs-up"><?= $single[0][9]?></i>
            </button>
            <img class="post-image" src="<?= $img[0] ?>" alt="">
            
            <div id = "like">
            <?php if(empty($like)){ ?>
                <button onclick = "like(<?=$uid?>,<?=$id?>,<?=$single[0][9]?>)" id = "like">🤍</button>
                <p id = "counted"><?=$single[0][9]?></p>
            <?php } elseif(!empty($like)) { ?>
                <button onclick = "dislike(<?=$uid?>,<?=$id?>,<?=$single[0][9]?>)" id = "like">❤️</button>
                <p id = "counted"><?=$single[0][9]?></p>
            <?php }else{ ?>
                <p>❤️<?=$single[0][9]?></p>
            <?php } ?>
            </div>

            <p class="post-title"><?=$single[0][1]?></p>

            <div class="post-details-container">
                <p class="post-details"><?= $single[0][6] ?> • <?= $single[0][3] ?> • <?= $single[0][5] ?></p>
                <i class="bi bi-hand-thumbs-up-fill"></i>
            </div>

            <div class="post-content-container">
                <p class="post-content">
                    <?= $single[0][2] ?>
                </p>
            </div>

            <!-- KOMENTĀRI -->
            <div class="comments-container">
                <p class="section-title">
                    Komentāri
                </p>
                <!-- forma -->
                <div class="comment-submit-container">
                <?php if(isset($_SESSION['UId'])){ ?>
                    <textarea name="" id="contest" cols="30" rows="10" class="comment-input">Ievadi komentāru!</textarea>
                    <button class="comment-submit-button button-style" onclick = "comment($_GET['id'], $_SESSION['Uid'], $date)">Publicēt</button>
                    <p id = "errContest"></p>
                    <p id = "msg"></p>
                <?php }else{ ?>
                    <textarea name="" id="contest" cols="30" rows="10" class="comment-input" disabled="disabled">Lai ievadītu komentāru, lūdzu reģistrēties</textarea>
                <?php } ?>
                </div>
                <!-- komentāri  -->
                <!-- LAI RĀDĪTU KOMENTĀRUS, KOPĒT comment-entry-container un ievadīt katra komentāra datus -->
                <?php foreach ($comment as $dati) { ?>
                    <div class="comment-entry-container" id = "comment-entry-container">
                        <div class="comment-head">
                            <p class="comment-author"><?= $dati[2] ?></p>
                            <p class="comment-date"><?= $dati[4] ?></p>
                        </div>
                        <p class="comment-content"><?= $dati[3] ?></p>
                    </div>
                <?php } ?>
            </div>

        </div>

        <!-- labā daļa (Priekš jums sadaļa) -->
        <div class="suggestions-container">
            <p class="suggestions-title">
                Priekš Jums
            </p>
            <?php foreach($data2 as $sugg){
                if($sugg[0] != $single[0][0]){?>
            <a href="?id=<?=$sugg[0]?>" class="m-post-container">
                <img class="m-post-image" src="<?=$sugg[7]?>" alt="">
                <p class="m-post-title"><?=$sugg[1]?></p>
            </a>
            <?php }} ?>
        </div>
    </div>
</body>

</html>