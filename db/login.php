<?php
session_start(); // 세션 시작

// 데이터베이스 연결 설정
$servername = "localhost"; // 데이터베이스 서버 주소
$username = "root"; // 데이터베이스 사용자 이름
$password = "1234"; // 데이터베이스 비밀번호
$dbname = "starbucks"; // 데이터베이스 이름
$port = "3308";

// 데이터베이스 연결
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// 연결 오류 확인
if ($conn->connect_error) {
    die("데이터베이스 연결 실패: " . $conn->connect_error);
} else {
    echo "데이터베이스 연결 성공!";
}

$username = $_POST["username"];
$password = $_POST["password"];

// TODO :  SQL Injection 공격을 방지하기 위해 password_hash 함수로 해싱하기
// 폼에서 제출된 사용자 이름과 비밀번호 가져오기
$username = $_POST['username'];
$password = $_POST['password'];

// SQL 쿼리를 사용하여 사용자 인증
$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 1) {
    // 로그인 성공
    $_SESSION['username'] = $username;
    header('Location: /StarBucks/index.html'); // 로그인 성공 시 리다이렉션할 페이지로 이동
} else {
    // 로그인 실패
    echo "로그인 실패. 다시 시도하세요.";
}

// 데이터베이스 연결 종료
$stmt->close();
$conn->close();
?>
