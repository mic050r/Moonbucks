<?php
session_start();

// DB 연결 설정
include('./connect.php');
mysqli_set_charset($conn, "utf8");

// 세션에서 사용자 이름 가져오기
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $response = array(); // 응답 데이터를 저장할 배열

    // 사용자의 장바구니 항목 가져오기 및 product 테이블과 조인
    $query = "SELECT cart.product_id, cart.quantity, products.product_name, products.price FROM cart
              JOIN products ON cart.product_id = products.id
              WHERE cart.user_id = ?;";
    
    // 쿼리를 실행할 준비
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $username);

    if (mysqli_stmt_execute($stmt)) {
        // 결과를 배열로 변환
        $result = mysqli_stmt_get_result($stmt);
        while ($row = mysqli_fetch_assoc($result)) {
            $response[] = $row;
        }
    } else {
        $response['error'] = "쿼리 실행 중 오류 발생: " . mysqli_error($conn);
    }

    // JSON 형식으로 응답 보내기
    header('Content-Type: application/json; charset=UTF-8');
    echo json_encode($response);
} else {
    echo "로그인하지 않았습니다.";
}

// 데이터베이스 연결 종료
mysqli_close($conn);
?>
