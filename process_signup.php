<?php
require_once __DIR__ . '/db_connect.php';

if (isset($_POST['submit'])) {
    $fullname = filter_var($_POST['fullname'], FILTER_UNSAFE_RAW);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    // Validazione dell'email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Email non valida.");
    }

    // Hash della password
    $password = password_hash($password, PASSWORD_BCRYPT);

    try {
        // Preparazione della query SQL
        $stmt = $connect->prepare("INSERT INTO `users` (`fullname`, `email`, `password`) VALUES (:fullname, :email, :password)");

        // Binding dei parametri
        $stmt->bindParam(':fullname', $fullname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);

        // Esecuzione della query
        if ($stmt->execute()) {
            header("Location: register.php?success=1"); // Reindirizza con un messaggio di successo
            exit();
        } else {
            header("Location: register.php?error=1"); // Reindirizza con un messaggio di errore
            exit();
        }
    } catch (PDOException $e) {
        die("Errore del database: " . $e->getMessage());
    }
}