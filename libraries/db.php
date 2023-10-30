<?php
session_start();

date_default_timezone_set('Europe/Riga');
class Database
{
    public mysqli $conn;

    public function __construct()
    {

        $this->conn = new mysqli("localhost", "root", "", "news");
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    private function query_($query)
    {
        return $this->conn->query($query);
    }

    public function insert($query)
    {
        return $this->query_($query);
    }

    public function select($query)
    {
        $result = $this->query_($query);
        if ($result === false) {
            return null;
        }
        return $result->fetch_all();
    }

    public function selectWhere($query)
    {
        return $this->query_($query);
    }

    public function delete($query)
    {
        return $this->query_($query);
    }

    public function update($query)
    {
        return $this->query_($query);
    }

    public function prepare($query)
    {
        return $this->conn->prepare($query);
    }

    // atgriež pēdējo ievietoto ID
    public function insertRetId($sql)
    {
        if ($this->conn->query($sql) === true) {
            return $this->conn->insert_id;
        } else {
            return false;
        }
    }

    public function GetAllPosts()
    {
        $posts = $this->select("SELECT * from news_articles");
        $images = $this->select("SELECT image_url from article_images");
        return array("posts" => $posts, "images" => $images);
    }

    public function GetPostLikeCount($id)
    {
        $likes = $this->select(
            "SELECT article_id, COUNT(like_id) AS like_count
        FROM article_likes
        WHERE article_id = $id
        GROUP BY article_id"
        );
        return $likes;
    }

    public function singleView($id)
    {
        $obj = new Database();

        $data = $obj->select("SELECT
        a.article_id,
        a.title,
        a.content,
        a.published_date,
        a.source,
        a.views,
        c.category_name AS category,
        u.username AS author,
        (
            SELECT JSON_ARRAYAGG(
                JSON_OBJECT('comment', co.content, 'comment_date', co.comment_date, 'user_id', co.user_id)
            )
            FROM comments AS co
            WHERE co.article_id = a.article_id
        ) AS comments,
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
    LEFT JOIN users AS u ON a.author_id = u.user_id WHERE a.article_id = $id;");

        $single = [
            'data' => $data
        ];
        return ($single);
    }
    public function comments($id)
    {
        $obj = new Database();

        $data = $obj->select("SELECT 
        c.comment_id,
        c.article_id,
        u.username AS user_name,
        c.content,
        c.comment_date
        FROM comments c
        JOIN users u ON c.user_id = u.user_id
        WHERE c.article_id = 1;");

        $comment = [
            'data' => $data
        ];

        return ($comment);
    }
    public function GetPostByID($id)
    {
        $posts = $this->select("SELECT * from news_articles WHERE article_id = $id");
        $images = $this->select("SELECT image_url from article_images WHERE article_id = $id");
        return array("posts" => $posts, "images" => $images);
    }
}
