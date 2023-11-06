<?php
header('Content-Type: application/json');
require_once("db.php");
$conn = new Database();
session_start();

// libraries/admin.php

// Check if the request method is DELETE
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $data = json_decode(file_get_contents("php://input"));
    
    if ($data !== null && isset($data->id)) {
        $id = $data->id;
        $success = handleDeleteRequest($conn, $id);

    
    } else {
        $errors['id'] = "Missing id";
        echo json_encode(false); // Handle the error as needed
    }
}

 elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        handlePostRequest($conn);
    } elseif (isset($_POST['buttonId'])) {
        handleButtonIdRequest($conn);
    } else {
        die();
    }
}

die();

function handleDeleteRequest($conn, $id) {

        $result = $conn->delete("DELETE FROM news_articles WHERE article_id = $id");
        echo json_encode($result);
    
}

function validateInput($title, $content, $image_url, $category) {
    $errors = [];

    if (empty($title)) {
        $errors['title'] = "Title is required.";
    }

    if (empty($content)) {
        $errors['content'] = "Content is required.";
    }

    if (empty($image_url)) {
        $errors['image_url'] = "Image URL is required.";
    } else {
        if (!filter_var($image_url, FILTER_VALIDATE_URL)) {
            $errors['image_url'] = "Image URL is not a valid URL.";
        } else {
            $image_info = @getimagesize($image_url);
            if (!$image_info) {
                $errors['image_url'] = "Image URL is not a valid image.";
            }
        }
    }


    return $errors;
}

function handlePostRequest($conn) {
    if ($_POST['action'] === 'save') {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $category = $_POST['category'];
        $image_url = $_POST['image_url'];

        $errors = validateInput($title, $content, $image_url, $category);

        if (empty($errors)) {
            $result = updateArticle($conn, $id, $title, $content, $image_url);
            echo json_encode($result);
        } else {
            // Return validation errors as a JSON response
            echo json_encode(['errors' => $errors]);
        }
    } elseif ($_POST['action'] === 'new') {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $image_url = $_POST['image_url'];
        $category = $_POST['category'];

        $errors = validateInput($title, $content, $image_url, $category);

        if (empty($errors)) {
            $result = insertArticle($conn, $title, $content, $category, $image_url);
            echo json_encode($result);
        } else {
            // Return validation errors as a JSON response
            echo json_encode(['errors' => $errors]);
        }
    }
}

function updateArticle($conn, $id, $title, $content, $image_url) {
    $stmt = $conn->prepare("UPDATE news_articles SET title = ?, content = ? WHERE article_id = ?");
    $stmt->bind_param("ssi", $title, $content, $id);

    if ($stmt->execute()) {
        // Now, update the image URL in the article_images table
        $stmt = $conn->prepare("UPDATE article_images SET image_url = ? WHERE article_id = ?");
        $stmt->bind_param("si", $image_url, $id);

        return $stmt->execute();
    }
}

function insertArticle($conn, $title, $content, $category, $image_url) {
    $author = $_SESSION['id'];

    $stmt = $conn->prepare("INSERT INTO news_articles (title, author_id, category_id, content) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("siss", $title, $author, $category, $content);

    if ($stmt->execute()) {
        $articleId = $stmt->insert_id;
        $stmt = $conn->prepare("INSERT INTO article_images (article_id, image_url) VALUES (?, ?)");
        $stmt->bind_param("is", $articleId, $image_url);

        return $stmt->execute();
    }
}

function handleButtonIdRequest($conn) {
    $id = $_POST['buttonId'];
    $result = $conn->select("SELECT
        a.article_id,
        a.title,
        a.content,
        a.published_date,
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

    $images = json_decode($result[0][7]);
    $response = array(
        'article_id' => $result[0][0],
        'title' => $result[0][1],
        'content' => $result[0][2],
        'published_date' => $result[0][3],
        'views' => $result[0][4],
        'category' => $result[0][5],
        'author' => $result[0][6],
        'image_url' => $images[0], // The image URL
        'like_count' => $result[0][8]
    );

    echo json_encode($response);
}
?>
