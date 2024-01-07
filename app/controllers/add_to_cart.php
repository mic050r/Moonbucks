<?php
session_start(); // 세션 시작

// 클라이언트로부터 전송된 상품 ID와 수량 받기 (유효성 검사는 추가해야 함)
$productId = $_GET['productId'];
$quantity = $_GET['quantity'];
$username = $_GET['username'];


// 데이터베이스 연결 설정 (connect.php 파일을 포함하여 사용)
include('./connect.php');

// SQL 쿼리 작성 및 실행 (보안을 위해 prepared statement 사용 권장)
$query = "INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($conn, $query);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, 'sss', $username, $productId, $quantity);
    
    if (mysqli_stmt_execute($stmt)) {
        $response = [
            'success' => true,
            'message' => '장바구니에 상품이 추가되었습니다.'
        ];
    } else {
        $response = [
            'success' => false,
            'message' => '장바구니에 상품을 추가하지 못했습니다.'
        ];
    }

    mysqli_stmt_close($stmt);
} else {
    $response = [
        'success' => false,
        'message' => 'SQL 쿼리 준비 중 오류가 발생했습니다.'
    ];
}

header('Content-Type: application/json');
echo json_encode($response);
mysqli_close($conn);
?>
