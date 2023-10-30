<?php
if (isset($_POST['buttonId'])) {
    $id = $_POST['buttonId'];
    require_once("db.php");
    $conn = new Database();
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
    print_r($result);
}
