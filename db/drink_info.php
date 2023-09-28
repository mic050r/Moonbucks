<?php
// 클라이언트로부터 전송된 음료 ID 받기
if (isset($_GET['drinkId'])) {
    $drinkId = $_GET['drinkId'];
} else {
    // "drinkId"가 전달되지 않았을 때 처리할 코드 추가
    echo "음료 ID가 전달되지 않았습니다.";
    exit; // 스크립트 실행 종료
}

// 데이터베이스 연결 설정
include('./connect.php');


// SQL 쿼리에서 $drinkId를 사용하기 전에 정수로 변환하고 이스케이프 처리
$drinkId = (int)$drinkId;
$escapedDrinkId = mysqli_real_escape_string($conn, $drinkId);

$query = "SELECT * FROM products WHERE id = $escapedDrinkId";

$result = mysqli_query($conn, $query);

if ($result) {
    $drinkInfo = mysqli_fetch_assoc($result);

    // JSON 형식으로 응답 보내기
    header('Content-Type: application/json; charset=UTF-8');
    echo json_encode($drinkInfo, JSON_UNESCAPED_UNICODE);


} else {
    echo "음료 정보를 가져오지 못했습니다.";
}

// 데이터베이스 연결 종료
mysqli_close($conn);

?>
