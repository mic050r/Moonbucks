<?php
session_start(); // 세션 시작

// 세션에서 사용자 이름 가져오기
if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    echo "현재 로그인한 사용자: $username";
} else {
    echo "로그인하지 않았습니다.";
}
?>