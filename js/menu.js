const drinkImages = document.querySelectorAll(".goDrinkView");

drinkImages.forEach((drinkImage) => {
  drinkImage.addEventListener("click", () => {
    // 클라이언트에서 음료 ID 또는 다른 식별자를 가져와서 서버로 전송
    const drinkId = drinkImage.id;

    // 서버로 데이터 요청 보내기 (GET 요청으로 수정)
    fetch(`db/drink_info.php?drinkId=${drinkId}`, {
      method: "Post",
    })
      .then((response) => {
        if (!response.ok) {
          throw new Error("서버 응답 오류");
        }
        return response.json(); // JSON 형식의 응답을 파싱
      })
      .then((drinkInfo) => {
        // 서버에서 받은 음료 정보를 처리하여 웹 페이지에 표시
        console.log(drinkInfo);
        // 이 부분에서 음료 정보를 원하는 방식으로 웹 페이지에 추가
      })
      .catch((error) => {
        console.error("에러 발생:", error);
      });
  });
});
