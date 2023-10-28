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

    public function insertRetId($sql)
    {
        if ($this->conn->query($sql) === true) {
            return $this->conn->insert_id;
        } else {
            return false;
        }
    }

    public function login($username, $password)
    {
        $obj = [
            'errUser' => '',
            'errPass' => '',
            'reder' => '',
            'errVeri' => ''
        ];



        $stmt = $this->conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            $obj['errUser'] = 'Nav atrasts profils!';
            echo json_encode($obj);
            return;
        }

        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            if ($user['verified'] != 0) {
                $_SESSION["UId"] = $username;
                $_SESSION['id'] = $user['id'];
                $obj['reder'] = 1;
            } else {
                $obj['errVeri'] = true;
            }
        } else {
            $obj['errPass'] = 'Ievadīta nepareiza parole!';
        }
        echo json_encode($obj);
    }

    public function signUp($username, $email, $pass, $repeat)
    {
        $obj = [
            'errUser' => '',
            'errPass' => '',
            'errEmail' => '',
            'success' => false
        ];

        if ($pass != $repeat) {
            $obj['errPass'] = 'Passwords do not match!';
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $obj['errEmail'] = 'Enter a valid email address!';
        }

        if ($obj['errEmail'] == '' && $obj['errPass'] == '') {
            $stmt = $this->conn->prepare("SELECT * FROM users_blog WHERE username = ?");
            $stmt->bind_param('s', $username);
            $stmt->execute();
            $stmt->store_result();
            if ($stmt->num_rows === 0) {
                $stmt->close();

                $emailExists = $this->select("SELECT * FROM users_blog WHERE email = '$email'");
                if (empty($emailExists)) {
                } else {
                    // Email already exists
                    $obj['success'] = false;
                    $obj['errEmail'] = 'Email already in use';
                }
            } else {
                $obj['errUser'] = 'Username already taken!';
            }
        }
        echo json_encode($obj);
    }

 
}
