<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyGoodsStore</title>
  <link rel="stylesheet" href="index.css">
</head>
<body>
  <?php
    session_start();
    $memberNo = isset($_SESSION["memberNo"]) ? $_SESSION["memberNo"] : 0;
    $name = isset($_SESSION["memberNo"]) ? $_SESSION["name"] : 0;
    $id = isset($_SESSION["memberNo"]) ? $_SESSION["id"] : 0;
  ?>
  <script>
    const memberNo = <?php echo $memberNo ?>;
  </script>

  <div id="mainDiv">
    <div id="topDiv">
      <div id="topDivMent">
        <?php if($memberNo == 1 ): ?>
          <a href="./manage/productList.php" id="productListBtn">상품관리</a>
          <span id="adminMent">[관리자]</span><span id="myName"><?=$name ?>(<?=$id?>)님</span>
          <a href="./login/logoutProc.php" id="logoutBtn">LOGOUT</a>
        <?php elseif($memberNo > 1): ?>
          <span id="myName"><?=$name ?>(<?=$id?>)님</span>
          <a href="./login/logoutProc.php" id="logoutBtn" class="btnClass">LOGOUT</a>
        <?php else: ?>
          <a href="./login/login.php" id="loginBtn" class="btnClass">LOGIN</a> 
          <a href="./join/join.php" id="joinBtn" class="btnClass">JOIN</a>
        <?php endif; ?>
      </div>
    </div>

    <div id="titleDiv">
      <div id="mainTitleDiv">
        <img src="./img/MyGoodsStoreLogoBlack.png" alt="logoImg" width="180px" id="logoImg" onClick="location.href='index.php'">
      </div>
      <div id="usercartDiv">
        <img src="./img/user.png" alt="userImg" width="35px" id="userImg" onClick="moveUserPage();">
        <img src="./img/basket.png" alt="basketImg" width="50px" id="basketImg" onClick="momveCartPage();">
      </div>
      <div id="searchDiv">
        <input type="text" name="searchInput" id="searchInput" onkeydown="if(event.keyCode==13) search()">  
        <!-- placeholder="찾고 싶은 상품을 검색해보세요!" -->
        <button type="button" id="searchBtn" onClick="search();">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 20">
            <path d="M21.71 20.29l-5.01-5.01C17.54 13.68 18 11.91 18 10c0-4.41-3.59-8-8-8S2 5.59 2 10s3.59 8 8 8c1.91 0 3.68-.46 5.28-1.3l5.01 5.01c.39.39 1.02.39 1.41 0l1.41-1.41c.38-.38.39-1.01 0-1.4zM4 10c0-3.31 2.69-6 6-6s6 2.69 6 6-2.69 6-6 6-6-2.69-6-6z"/>
          </svg>
        </button>
      </div>
    </div>

    <div id="categoryDiv">
      <div id="categoryNameDiv">
        <a href="./product/list.php?cateCode=1" id="categoryMusic" class="categoryName">MUSIC</a>
        <a href="./product/list.php?cateCode=2" id="categoryPhoto" class="categoryName">PHOTO</a>
        <a href="./product/list.php?cateCode=3" id="categoryFashion" class="categoryName">FASHION</a>
        <a href="./product/list.php?cateCode=4" id="categoryConcert" class="categoryName">CONCERT</a>
        <a href="./funding/list.php" id="categoryFunding" class="categoryName">FUNDING</a>
        <a href="./eventPage/list.php" id="categoryEvent" class="categoryName">EVENT</a>
      </div>
    </div>

    <div id="slideDiv">
      <section class="section">
        <div class="slider">
          <div class="slide">
            <input type="radio" name="radio-btn" id="radio1">
            <input type="radio" name="radio-btn" id="radio2">
            <input type="radio" name="radio-btn" id="radio3">
            <input type="radio" name="radio-btn" id="radio4">
            <div class="st first">
              <img src="./img/image1.jpg" alt="">
            </div>
            <div class="st">
              <img src="./img/image2.jpg" alt="">
            </div>
            <div class="st">
              <img src="./img/image3.jpg" alt="">
            </div>
            <div class="st">
              <img src="./img/image4.jpg" alt="">
            </div>
            <div class="nav-auto">
              <div class="a-b1"></div>
              <div class="a-b2"></div>
              <div class="a-b3"></div>
              <div class="a-b4"></div>
            </div>
            <div class="nav-m">
              <label for="radio1" class="m-btn"></label>
              <label for="radio2" class="m-btn"></label>
              <label for="radio3" class="m-btn"></label>
              <label for="radio4" class="m-btn"></label>
            </div>
          </div>
        </div>
      </section>
    </div>

    <input type="hidden" value="1" id="tempNum">

  </div>
  <div id="leftArrowDiv" onClick="goLeft();">
    <img src="./img/arrowLeft.png" alt="leftArrow" id="leftArrow">
  </div>
  <div id="rightArrowDiv" onClick="goRight();">
    <img src="./img/arrowRight.png" alt="rightArrow" id="rightArrow">
  </div>


<script src="index.js"></script>
</body>
</html>