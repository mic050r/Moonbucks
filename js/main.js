// DOM 요소들을 선택합니다.
const searchEl = document.querySelector(".search"); // 검색 요소
const searchInputEl = searchEl.querySelector("input"); // 검색 입력 필드 요소

// 검색 요소를 클릭할 때 검색 입력 필드에 포커스를 주는 이벤트 리스너를 추가합니다.
searchEl.addEventListener("click", function () {
  searchInputEl.focus();
});

// 검색 입력 필드에 포커스가 될 때, 스타일 및 속성을 변경하는 이벤트 리스너를 추가합니다.
searchInputEl.addEventListener("focus", function () {
  searchEl.classList.add("focused"); // 검색 요소에 'focused' 클래스 추가
  searchInputEl.setAttribute("placeholder", "통합검색"); // 검색 입력 필드의 placeholder 변경
});

// 검색 입력 필드에서 포커스가 해제될 때, 스타일 및 속성을 원래대로 돌리는 이벤트 리스너를 추가합니다.
searchInputEl.addEventListener("blur", function () {
  searchEl.classList.remove("focused"); // 검색 요소에서 'focused' 클래스 제거
  searchInputEl.setAttribute("placeholder", ""); // 검색 입력 필드의 placeholder 제거
});

// 배지 요소를 선택합니다.
const badgeEl = document.querySelector("header .badges");

// 스크롤 이벤트에 _.throttle을 사용하여 배지 요소를 제어하는 이벤트 리스너를 추가합니다.
window.addEventListener(
  "scroll",
  _.throttle(function () {
    console.log(window.scrollY); // 스크롤 위치를 콘솔에 출력

    // 스크롤 위치가 500보다 크면 배지를 숨깁니다.
    if (window.scrollY > 500) {
      gsap.to(badgeEl, 0.6, {
        opacity: 0,
        display: "none",
      });
    } else {
      // 스크롤 위치가 500보다 작으면 배지를 보여줍니다.
      gsap.to(badgeEl, 0.6, {
        opacity: 1,
        display: "block",
      });
    }
  }),
  300
);
// _.throttle(함수, 시간)

// 화면에 나타날 때 페이드 인 효과를 주는 요소들을 선택합니다.
const fadeEls = document.querySelectorAll(".visual .fade-in");

// 각 요소에 페이드 인 애니메이션을 적용합니다.
fadeEls.forEach(function (fadeEl, index) {
  gsap.to(fadeEl, 1, {
    delay: (index + 1) * 0.7, // 요소마다 0.7초씩 딜레이를 주어 순차적으로 페이드 인
    opacity: 1,
  });
});

// Swiper 라이브러리를 사용하여 슬라이드 쇼를 구현합니다.
new Swiper(".notice-line .swiper-container", {
  direction: "vertical", // 수직 방향 슬라이드
  autoplay: true, // 자동 재생
  loop: true, // 반복 재생
});

// 또 다른 Swiper 슬라이드 쇼를 구현합니다.
new Swiper(".promotion .swiper-container", {
  slidesPerView: 3, // 한 번에 보여줄 슬라이드 개수
  spaceBetween: 10, // 슬라이드 사이 여백
  centeredSlides: true, // 1번 스라이드가 가운데 보이기
  loop: true, // 반복 재생
  autoplay: {
    delay: 5000, // 5초 간격으로 자동 재생
  },
  pagination: {
    el: ".promotion .swiper-pagination", // 페이지 번호 요소 선택자
    clickable: true, // 페이지 번호 클릭 가능 여부
  },
  navigation: {
    prevEl: ".promotion .swiper-prev", // 이전 버튼 선택자
    nextEl: ".promotion .swiper-next", // 다음 버튼 선택자
  },
});

// 프로모션 요소와 토글 버튼을 선택합니다.
const promotionEl = document.querySelector(".promotion");
const promotionToggleBtn = document.querySelector(".toggle-promotion");
let isHidePromotion = false;

// 토글 버튼을 클릭할 때 프로모션 요소를 숨기거나 보이게 합니다.
promotionToggleBtn.addEventListener("click", function () {
  isHidePromotion = !isHidePromotion;
  if (isHidePromotion) {
    promotionEl.classList.add("hide"); // 숨김 처리
  } else {
    promotionEl.classList.remove("hide"); // 보임 처리
  }
});

// 범위 내에서 랜덤한 숫자를 생성하는 함수입니다.
function random(min, max) {
  return parseFloat((Math.random() * (max - min) + min).toFixed(2));
}

// 요소를 부드럽게 움직이도록 하는 함수입니다.
function floatingObject(selector, delay, size) {
  gsap.to(selector, random(1.5, 2.5), {
    y: size,
    repeat: -1,
    yoyo: true,
    ease: Power1.easeInOut,
    delay: random(0, delay),
  });
}

// 다양한 요소에 부드러운 움직임을 적용합니다.
floatingObject(".floating1", 1, 15);
floatingObject(".floating2", 0.5, 15);
floatingObject(".floating3", 1.5, 20);

// 스크롤 위치에 따라 요소가 화면에 보여지는지 감시하는 기능을 구현합니다.
const spyEls = document.querySelectorAll("section.scroll-spy");
spyEls.forEach(function (spyEl) {
  new ScrollMagic.Scene({
    triggerElement: spyEl,
    triggerHook: 0.8,
  })
    .setClassToggle(spyEl, "show") // 요소가 화면에 보이면 'show' 클래스 추가
    .addTo(new ScrollMagic.Controller()); // ScrollMagic 컨트롤러에 장면 추가
});

// 현재 연도를 계산하여 표시합니다.
const thisYear = document.querySelector(".this-year");
thisYear.textContent = new Date().getFullYear();
