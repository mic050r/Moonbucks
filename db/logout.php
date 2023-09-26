<?php
session_start();
session_destroy(); // 세션 파기
header('Location: login.php'); // 로그아웃 후 로그인 페이지로 리다이렉션
?>
