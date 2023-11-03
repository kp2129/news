<?php
header('Content-Type: application/json'); 

if (isset($_POST)) {

    require_once("db.php");
    $conn = new Database();

    if (isset($_POST['id']) && $_POST['action'] == 'delete') {
        $id = $_POST['id'];
        $result = $conn->delete("DELETE FROM news_articles WHERE article_id = $id");
        echo json_encode($result);
    }


    if (isset($_POST['buttonId'])) {
        $id = $_POST['buttonId'];
        $result = $conn->select("SELECT
    a.article_id,
    a.title,
    a.content,
    a.published_date,
    a.source,
    a.views,
    c.category_name AS category,
    u.username AS author,
    (
        SELECT JSON_ARRAYAGG(i.image_url)
        FROM article_images AS i
        WHERE i.article_id = a.article_id
    ) AS images,
    (
        SELECT COUNT(*)
        FROM article_likes AS al
        WHERE al.article_id = a.article_id
    ) AS like_count
    FROM news_articles AS a
    LEFT JOIN categories AS c ON a.category_id = c.category_id
    LEFT JOIN users AS u ON a.author_id = u.user_id
    WHERE a.article_id = $id;
    ");

        $images = json_decode($result[0][8]);
        // $imageUrl = $images[0]; 
        // Create an associative array to structure the response
        $response = array(
            'article_id' => $result[0][0],
            'title' => $result[0][1],
            'content' => $result[0][2],
            'published_date' => $result[0][3],
            'source' => $result[0][4],
            'views' => $result[0][5],
            'category' => $result[0][6],
            'author' => $result[0][7],
            'image_url' => $images[0], // The image URL
            'like_count' => $result[0][9]
        );

        echo json_encode($response);
    }
}
