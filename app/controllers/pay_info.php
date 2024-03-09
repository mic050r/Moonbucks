<?php
session_start();

// DB 연결 설정
include('./connect.php');
mysqli_set_charset($conn, "utf8");

// 응답 데이터를 저장할 배열 초기화
$response = array();

// 세션에서 사용자 이름 가져오기
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    // 사용자의 이메일 가져오기
    $getEmailQuery = "SELECT email FROM users WHERE username = ?";
    $getEmailStmt = mysqli_prepare($conn, $getEmailQuery);
    mysqli_stmt_bind_param($getEmailStmt, "s", $username);

    if (mysqli_stmt_execute($getEmailStmt)) {
        $emailResult = mysqli_stmt_get_result($getEmailStmt);
        $emailRow = mysqli_fetch_assoc($emailResult);
        $userEmail = $emailRow['email'];

        // 사용자의 장바구니 항목 및 가격 가져오기
        $getCartQuery = "SELECT cart.product_id, cart.quantity, products.product_name, products.price FROM cart
                  JOIN products ON cart.product_id = products.id
                  WHERE cart.user_id = ?;";

        $getCartStmt = mysqli_prepare($conn, $getCartQuery);
        mysqli_stmt_bind_param($getCartStmt, "s", $username);

        if (mysqli_stmt_execute($getCartStmt)) {
            $result = mysqli_stmt_get_result($getCartStmt);

            // 장바구니 가격 초기화
            $totalPrice = 0;

            while ($row = mysqli_fetch_assoc($result)) {
                // 장바구니 항목을 응답에 추가
                $response['cart'][] = $row;

                // 장바구니 항목의 가격을 더하기
                $totalPrice += $row['price'] * $row['quantity'];
            }

            // 총 가격을 응답에 추가
            $response['total_price'] = $totalPrice;
            $response['user_email'] = $userEmail;
            $response['username'] = $username;
        } else {
            $response['error'] = "장바구니 조회 중 오류 발생: " . mysqli_error($conn);
        }
    } else {
        $response['error'] = "이메일 조회 중 오류 발생: " . mysqli_error($conn);
    }
} else {
    $response['error'] = "로그인하지 않았습니다.";
}

// JSON 형식으로 응답 보내기
header('Content-Type: application/json; charset=UTF-8');
echo json_encode($response);

// 데이터베이스 연결 종료
mysqli_close($conn);
?>
