<?php
$host = "db";
$db = "app_db";
$pass = "app_pass";
$usr = "app_user";

$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
try {
    $conn = new PDO($dsn, $usr, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro de conexão: " . $e->getMessage();
    exit();
}
