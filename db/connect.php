<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "starbucks";
$port = "3308";

$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("데이터베이스 연결 실패: " . $conn->connect_error);
} 
// else {
//     echo "데이터베이스 연결 성공!";
//}
?>
