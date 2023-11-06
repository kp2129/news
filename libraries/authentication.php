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
            if (isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"])) {
                $username = $_POST["username"];
                $email = $_POST["email"];
                $password = $_POST["password"];
                signUp($conn, $username, $email, $password);
            }
        } elseif ($_POST["action"] === "logoff") {
            if (isset($_SESSION['UId'])) {
                session_destroy();
                echo json_encode("success");
                return;
            } else {
                echo json_encode("UId is not set");
            }
        }
    }
}

function login($conn, $username, $password)
{
    $returnOBJ = ["error" => "", "success" => false];
    if (empty($username)) {
        $returnOBJ['error'] = 'Username is required.';
        echo json_encode($returnOBJ);
        return;
    }

    if (empty($password)) {
        $returnOBJ['error'] = 'Password is required.';
        echo json_encode($returnOBJ);
        return;
    }

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        $returnOBJ['error'] = 'Incorrect Password or Username.';
        echo json_encode($returnOBJ);
        return;
    }

    $user = $result->fetch_assoc();
    // echo json_encode($user);
    // return $user;

    // if (password_verify($password, $user['password'])) {
    //     if ($user['verified'] != 0) {
    //         session_start(); // Start the session
    //         $_SESSION["UId"] = $username;
    //         $_SESSION['id'] = $user['id'];
    //         $err = 'b';
    //         echo json_encode($err);
    //         return;
    //     } else {
    //         $err = "Not verified";
    //         echo json_encode($err);
    //         return;
    //     }
    // } else {
    //     $err = 'Incorrect Password or Username 1';
    //     echo json_encode($err);
    //     return;
    // }

    if ($user['password'] == $password) {
        session_start();
        $_SESSION["UId"] = $username;
        $_SESSION['id'] = $user['user_id'];
        $_SESSION['role'] = $user['role_id'];
        $returnOBJ['success'] = true;
        echo json_encode($returnOBJ);
        return;
    } else {
        $returnOBJ['error'] = 'Incorrect Password or Username.';
        echo json_encode($returnOBJ);
        return;
    }
}

function signUp($conn, $username, $email, $pass)
{
    $returnOBJ = ["error" => "", "success" => false];

    if (empty($username)) {
        $returnOBJ['error'] = 'Username is required.';
        echo json_encode($returnOBJ);
        return;
    }

    if (empty($pass)) {
        $returnOBJ['error'] = 'Password is required.';
        echo json_encode($returnOBJ);
        return;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $returnOBJ['error'] = 'A valid email address is required.';
        echo json_encode($returnOBJ);
        return;
    }

    if ($returnOBJ['error'] == '') {
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows === 0) {
            $stmt->close();

            $emailExists = $conn->select("SELECT * FROM users WHERE email = '$email'");
            if (!empty($emailExists)) {
                // Email already exists
                $returnOBJ['error'] = 'Email already in use.';
                echo json_encode($returnOBJ);
                return;
            }

            // successful registration
            $stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $username, $pass, $email);
            $stmt->execute();

            $returnOBJ['success'] = true;
            echo json_encode($returnOBJ);
            return;
        } else {
            $returnOBJ['error'] = 'Username already taken.';
            echo json_encode($returnOBJ);
            return;
        }
    } else {
        $returnOBJ['error']  = 'Something went wrong.';

        echo json_encode($returnOBJ);
        return;
    }
}
