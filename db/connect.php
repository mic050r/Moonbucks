<?php
require_once __DIR__ . '/vendor/autoload.php'; // Composer autoload

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$servername = $_ENV['DB_HOST'];
$name = $_ENV['DB_USERNAME'];
$password = $_ENV['DB_PASSWORD'];
$dbname = $_ENV['DB_NAME'];
$port = $_ENV['DB_PORT'];

$conn = new mysqli($servername, $name, $password, $dbname, $port);

if ($conn->connect_error) {
    die("데이터베이스 연결 실패: " . $conn->connect_error);
}
?>