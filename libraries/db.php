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

    public function singleView($id)
    {
        $data = $this->select("SELECT * FROM `news_articles` WHERE `article_id` = $id");

        return $data;
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
    public function GetPostByID($id)
    {
        $posts = $this->select("SELECT * from news_articles WHERE article_id = $id");
        $images = $this->select("SELECT image_url from article_images WHERE article_id = $id");
        return array("posts" => $posts, "images" => $images);
    }

}
