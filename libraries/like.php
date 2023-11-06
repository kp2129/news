<?php 
require_once("db.php");
$obj = new Database();

if(isset($_POST['dislikeId']) && isset($_POST['dispostId'])){
    $user = $_POST['dislikeId'];
    $post = $_POST['dispostId'];
    $like = $obj->delete("DELETE FROM `article_like` WHERE `article_id` = '$post' AND `user_id` = '$user'");
    echo json_encode("disliked succesfuly");
}
if(isset($_POST['likeId']) && isset($_POST['postId'])){
    $user = $_POST['likeId'];
    $post = $_POST['postId'];
    $like = $obj->insert("INSERT INTO `article_like` (`article_id`, `user_id`) VALUE ('$post', $user)");
    echo json_encode("liked succesfuly");
}


?>