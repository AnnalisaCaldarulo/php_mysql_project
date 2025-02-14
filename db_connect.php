<?php

$servername = "localhost";
$username = "root";
$password = '';
$dbname = "blogphp";

try {
    // Corrected connection string
    $connect = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Corrected SQL statements
    $sql = "DROP TABLE IF EXISTS users;
            CREATE TABLE users(
                id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
                fullname VARCHAR(255) NOT NULL,
                email VARCHAR(255) NOT NULL,
                password VARCHAR(255) NOT NULL
            );";

    // Execute SQL statements
    $connect->exec($sql);
    echo "Table users created successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}