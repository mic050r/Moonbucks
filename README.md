# ☕ Starbucks
> 스타벅스의 음료 메뉴를 장바구니 추가 및 결제 할 수 있는 홈페이지
> 
[📚 개발&에러 일지](https://www.notion.so/aa569884125a4b3389955385960e4bac?v=577eb1f73aa749be9ef5e90ab6a287cb&pvs=4)

## 📝 Skill

|  | 사용스킬 |
| --- | --- |
| 기술스택 | HTML/CSS/JavaScript, GSAP, Swiper, ScrollMagic,  PHP, Twig |
| DB | MariaDB |
| IDE /  Tool | Visual Studio Code, DBeaver |
| API, 라이브러리  | Portone 결제 API, DOTENV in PHP, jQuery |


## 📍 TECH

> 포지션 : Front, Back
> 
- **Front**
    
    **오픈 그래프와 트위터 카드를 이용**
    
    - 웹페이지가 소셜 미디어(페이스북, 트위터 등)로 공유될 때 우선적으로 활용되는 정보를 지정
    
    **GSAP & ScrollToPlugin & Swiper & ScrollMagic**
    
    - 애니메이션 기능을 추가하고,  스크롤 애니메이션 추가
    - [ScrollMagic](https://github.com/janpaepke/ScrollMagic)은 스크롤과 요소의 상호 작용. 어떤 요소가 현재 화면에 보이는 상태인지를 확인
    
    **Youtube API**
    
    - [IFrame Player API](https://developers.google.com/youtube/iframe_api_reference?hl=ko)를 통해 YouTube 동영상 추가 및 생성
    
    **JS Strict Mode**
    
    - JavaScript의 '엄격 모드'를 사용하여 콘텍스트 안에서 실행시킬 수 있게끔 추가.하여 몇가지 액션들을 실행할 수 없도록 하며, 좀 더 많은 예외를 발생시키도록 작성.

**1. 로그인/ 로그아웃 기능**

**2. DB 연결 모듈 분리하여 라이브러리를 사용하여 doenv 사용** 

**3. 장바구니 기능 추가**

- 음료 사진을 누르면 관련 id를 통해 관련 정보를 ajax로 보내기
- 상품 id를 조회한 후 관련 정보를 음료 상세 페이지에 연결해서 값 넣기

**4. 결제 기능 추가**

- 포트원 결제 api 연동 구현

**5. twig를 이용해서 헤더, 메인, 푸터 분리하기**

- session을 받아 twig에 로그인 여부 보내기

## ✅ 프로젝트 구조
![image](https://github.com/mic050r/StarBucks/assets/103114387/48f39d92-549a-4586-8d12-8ab18e75bec9)

