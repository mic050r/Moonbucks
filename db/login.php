<?php
session_start(); // 세션 시작

include('./connect.php');

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
    header('Location: ../index.html'); 
} else {
    // 로그인 실패
    echo "로그인 실패. 다시 시도하세요.";
}

// 데이터베이스 연결 종료
// $stmt->close();
$conn->close();
?>
