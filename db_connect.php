<?php
require_once __DIR__ .  "/checkenv.php";

$env = loadEnv(__DIR__ . '/.env');

$servername = "localhost";
$username = "root";
$password = $env['DB_PASSWORD'];
$dbname = "blogphp";

// echo "connesso .env";
try {
    $connect = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "DROP TABLE IF EXISTS users;
            CREATE TABLE users(
                id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
                fullname VARCHAR(255) NOT NULL,
                email VARCHAR(255) NOT NULL,
                password VARCHAR(255) NOT NULL
            );";

    $connect->exec($sql);
    // echo "Table users created successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}
