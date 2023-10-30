<?php

require_once("db.php");
$conn = new Database();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["action"])) {
        if ($_POST["action"] === "login") {
            if (isset($_POST["username"]) && isset($_POST["password"])) {
                $username = $_POST["username"];
                $password = $_POST["password"];
                login($conn, $username, $password);
            }
        } elseif ($_POST["action"] === "signup") {
            if (isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["repeat"])) {
                print_r($_POST);
                // $username = $_POST["username"];
                // $email = $_POST["email"];
                // $password = $_POST["password"];
                // $repeat = $_POST["repeat"];
                // signUp($conn, $username, $email, $password, $repeat);
            }
        }
    }
}

function login($conn, $username, $password)
{
    $obj = [
        'errUser' => '',
        'errPass' => '',
        'reder' => '',
        'errVeri' => ''
    ];

    if (empty($username)) {
        $obj['errUser'] = 'Username is required.';
        echo json_encode($obj);
        return;
    }

    if (empty($password)) {
        $obj['errPass'] = 'Password is required.';
        echo json_encode($obj);
        return;
    }

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        $obj['errUser'] = 'Profile not found!';
        echo json_encode($obj);
        return;
    }

    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {
        if ($user['verified'] != 0) {
            session_start(); // Start the session
            $_SESSION["UId"] = $username;
            $_SESSION['id'] = $user['id'];
            $obj['reder'] = 1;
        } else {
            $obj['errVeri'] = true;
        }
    } else {
        $obj['errPass'] = 'Incorrect password entered!';
    }
    echo json_encode($obj);
}

function signUp($conn, $username, $email, $pass, $repeat)
{
    $obj = [
        'errUser' => '',
        'errPass' => '',
        'errEmail' => '',
        'success' => false
    ];

    if (empty($username)) {
        $obj['errUser'] = 'Username is required.';
        echo json_encode($obj);
        return;
    }

    if (empty($pass)) {
        $obj['errPass'] = 'Password is required.';
        echo json_encode($obj);
        return;
    }

    if ($pass != $repeat) {
        $obj['errPass'] = 'Passwords do not match!';
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $obj['errEmail'] = 'Enter a valid email address!';
    }

    if ($obj['errEmail'] == '' && $obj['errPass'] == '' && $obj['errUser'] == '') {
        $stmt = $conn->prepare("SELECT * FROM users_blog WHERE username = ?");
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows === 0) {
            $stmt->close();

            $emailExists = $conn->select("SELECT * FROM users_blog WHERE email = '$email'");
            if (empty($emailExists)) {
                $obj['success'] = true;
            } else {
                // Email already exists
                $obj['errEmail'] = 'Email already in use';
            }
        } else {
            $obj['errUser'] = 'Username already taken!';
        }
    }
    echo json_encode($obj);
}
?>
