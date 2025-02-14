<?php
require_once __DIR__ . '/db_connect.php';

session_start();
if (isset($_SESSION['user_id'])) {
    echo "user id";
    header("Location: contacts.php");
    exit();
}

$error_msg = "";
if (isset($_POST['submit'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    echo "submit";
    // Hash della password
    // $password = password_hash($password, PASSWORD_BCRYPT);

    try {
        // Preparazione della query SQL
        $stmt = $connect->prepare("SELECT * FROM `users` WHERE email = :email");
        print_r($stmt);
        $stmt->bindParam(':email', $email);

        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            echo 'utente trovato';

            if (password_verify($password, $result['password'])) {
                echo 'password verificata';
                session_start();
                $_SESSION['user_id'] = $result['id'];
                header("Location: contacts.php");
                exit();
            } else {
                $error_msg = "Incorrect email or password";
            }
        } else {
            $error_msg = "Incorrect email or password (fuori)";
        }
        $connect = null;
        $stmt->bindParam(':password', $password);
    } catch (PDOException $e) {
        die("Errore del database: " . $e->getMessage());
    }
}
