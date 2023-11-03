<?php 
require_once("db.php");
$obj = new Database();
date_default_timezone_set('Europe/Riga');
session_start();

if(isset($_POST['contest'])){
    $post = $_POST['post'];
    $contest = $_POST['contest'];
    $user = $_SESSION['id'];
    $time = date('Y-m-d h:i:s');
    $msg = [
        'errContest' => '',
        'msg' => ''
    ];
    if(empty($_POST['contest'])){
        $msg['errContest'] = "Input field is empty!";
    }

    if(empty($msg['errContest'])){
        $insert = $obj->insert("INSERT INTO `comments`(`article_id`, `user_id`, `content`, `comment_date`) VALUES ($post,$user,'$contest','$time')");
        echo json_encode($msg);
    }
}
?>