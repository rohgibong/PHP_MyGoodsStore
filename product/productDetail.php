<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyGoodsStore</title>
  <link rel="stylesheet" href="productDetail.css">
  <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<body>
  <?php
    session_start();
    $memberNo = isset($_SESSION["memberNo"]) ? $_SESSION["memberNo"] : 0;
    $name = isset($_SESSION["memberNo"]) ? $_SESSION["name"] : 0;
    $id = isset($_SESSION["memberNo"]) ? $_SESSION["id"] : 0;
    $productCode = isset($_GET["productCode"]) ? $_GET["productCode"] : 0;
  ?>
  <script>
    const productCode = <?php echo $productCode ?>; 
    if(productCode <= 0){
      alert('잘못된 접근입니다.');
      location.href='../index.php';
    }
    const memberNo = <?php echo $memberNo ?>;
  </script>
  <?php
    $currentDate = date('Y-m-d');
    $con = mysqli_connect("localhost", "user1", "12345", "phpfinalproject");
    $sql = "select * from storeproduct where productCode = $productCode";
    $result = mysqli_query($con, $sql);
    $row_cnt = mysqli_num_rows($result);

    if($row_cnt != 0){
      while($row = mysqli_fetch_assoc($result)){
        $productName = $row['productName'];
        $detailName = $row['detailName'];
        $productPrice = $row['productPrice'];
        $artistName = $row['artistName'];
        $stock = $row['stock'];
        $delPeriod = $row['delPeriod'];
        $delPrice = $row['delPrice'];
        $mainImgType = $row['mainImgType'];
        $contentImgType = $row['contentImgType'];
        $mainImg = $row['mainImg'];
        $contentImg = $row['contentImg'];
        $soldOut = $row['soldOut'];
      }
    }
    $deliveryDate = date('Y-m-d', strtotime("+$delPeriod days", strtotime($currentDate)));
    $delDate = explode("-", $deliveryDate);
    $point = $productPrice / 100;

    mysqli_close($con);
  ?>
  <script>
  let productPrice = <?php echo $productPrice ?>;
  </script>
  <div id="mainDiv">
    <div id="topDiv">
      <div id="topDivMent">
        <?php if($memberNo == 1 ): ?>
            <a href="../manage/productList.php" id="productListBtn">상품관리</a>
            <span id="adminMent">[관리자]</span><span id="myName"><?=$name ?>(<?=$id?>)님</span>
            <a href="../login/logoutProc.php" id="logoutBtn">LOGOUT</a>
          <?php elseif($memberNo > 1): ?>
            <span id="myName"><?=$name ?>(<?=$id?>)님</span>
            <a href="../login/logoutProc.php" id="logoutBtn" class="btnClass">LOGOUT</a>
          <?php else: ?>
            <a href="../login/login.php" id="loginBtn" class="btnClass">LOGIN</a> 
            <a href="../join/join.php" id="joinBtn" class="btnClass">JOIN</a>
        <?php endif; ?>
      </div>
    </div>

    <div id="titleDiv">
      <div id="mainTitleDiv">
        <img src="../img/MyGoodsStoreLogoBlack.png" alt="logoImg" width="180px" id="logoImg" onClick="location.href='../index.php'">
      </div>
      <div id="usercartDiv">
        <img src="../img/user.png" alt="userImg" width="35px" id="userImg" onClick="moveUserPage();">
        <img src="../img/basket.png" alt="basketImg" width="50px" id="basketImg" onClick="momveCartPage();">
      </div>
      <div id="searchDiv">
        <input type="text" name="searchInput" id="searchInput" onkeydown="if(event.keyCode==13) search();">  
        <button type="button" id="searchBtn" onClick="search();">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 20">
            <path d="M21.71 20.29l-5.01-5.01C17.54 13.68 18 11.91 18 10c0-4.41-3.59-8-8-8S2 5.59 2 10s3.59 8 8 8c1.91 0 3.68-.46 5.28-1.3l5.01 5.01c.39.39 1.02.39 1.41 0l1.41-1.41c.38-.38.39-1.01 0-1.4zM4 10c0-3.31 2.69-6 6-6s6 2.69 6 6-2.69 6-6 6-6-2.69-6-6z"/>
          </svg>
        </button>
      </div>
    </div>
    
    <div id="contentDiv">
        <div id="imgDiv">
          <?php if($soldOut == 'O'): ?>
            <img src="data:image/<?=$mainImgType ?>;base64,<?php echo base64_encode($mainImg); ?>" alt="Main Image" width="500px;" id="soldOutImgId">
          <?php else: ?>
            <img src="data:image/<?=$mainImgType ?>;base64,<?php echo base64_encode($mainImg); ?>" alt="Main Image" width="500px;">
          <?php endif; ?>
        </div>
        <div id="orderDiv">
            <div id="orderContentDiv">
              <span id="artistNameId"><?=$artistName ?></span>
              <div id="productNameDiv">
                <span id="detailNameId"><?=$detailName ?></span>
              </div>
              <?php if($soldOut == 'O'): ?>
                <span id="productPriceId">SOLD OUT</span>
              <?php else: ?>
                <span id="productPriceId">\ <?php echo number_format($productPrice); ?></span>
              <?php endif; ?>
              <span id="pointId">적립금 1% (<?=$point ?> P)</span>
              <span id="delDateId"><?=$delDate[1] ?>월 <?=$delDate[2] ?>일 배송예정</span>
              <span id="delPriceId">배송비 \<?php echo number_format($delPrice); ?></span>
              <div id="amountDiv">
                <span id="productNameId">
                  <?=$productName ?>
                </span>
                <?php if($stock <= 10) : ?>
                <span id="lastStock">
                  (<?=$stock ?>개 남음)
                </span>
                <?php endif; ?>
                <div id="momdifyAmount">
                  <button id="minusBtn" class="amountBtn">-</button>
                  <input type="text" value="1" id="amountInput" oninput="this.value = this.value.replace(/\D/g, '');">
                  <button id="plusBtn" class="amountBtn">+</button>
                </div>
                <div id="totalPriceDiv">
                \<input type="text" value="<?php echo number_format($productPrice); ?>" id="totalPrice" readonly>
                </div>
              </div>
              <span id="totalMent">TOTAL</span>
              <div id="allTotalDiv">
                \<input type="text" value="<?php echo number_format($productPrice); ?>" id="allTotal" readonly>
              </div><br>
              <div id="btnDiv">
                <?php if($soldOut == 'O'): ?>
                  <button id="buyBtn">BUY NOW</button><br>
                <?php else: ?>
                  <button id="buyBtn" onClick="buy();">BUY NOW</button><br>
                <?php endif; ?>
                <input type="checkbox" id="popup">
                <label for="popup">
                  <div id="wishBtn" onClick="addWish();">
                    <img src="../img/heart.png" alt="wishImg" width="30px" id="wishImg">
                  </div>
                </label>
                <div>
                  <div>
                    <label for="popup" id="closeLabel">
                      <img src="../img/cancel.png" alt="" width="20px">
                    </label>
                    <img src="../img/redheart.png" alt="" width="50px" id="wishImgFloat">
                    <div id="wishMentFloatDiv">
                      <span>
                        선택하신 상품을 관심상품에 담았습니다. <br>
                        지금 관심상품을 확인하시겠습니까?
                      </span>
                    </div>
                    <label for="popup" id="continueLabel">
                      <div>
                        쇼핑 계속하기
                      </div>
                    </label>
                    <div id="goWishBtn" onClick="location.href='../member/member_wishList.php'">관심상품 확인</div>
                  </div>
                  <label for="popup"></label>
                </div>
                <input type="checkbox" id="addCartLabel">
                <label for="addCartLabel">
                  <div id="addCartBtn" onClick="addCart();">ADD CART</div>
                </label>
                <div>
                  <div>
                    <label for="addCartLabel" id="closeLabel">
                      <img src="../img/cancel.png" alt="" width="20px">
                    </label>
                    <img src="../img/cart.png" alt="" width="50px" id="wishImgFloat">
                    <div id="wishMentFloatDiv">
                      <span>
                        장바구니에 상품이 정상적으로 담겼습니다.
                      </span>
                    </div>
                    <label for="addCartLabel" id="continueLabel">
                      <div>
                        쇼핑 계속하기
                      </div>
                    </label>
                    <div id="goWishBtn" onClick="location.href='../cartPage/list.php'">장바구니 이동</div>
                  </div>
                  <label for="addCartLabel"></label>
                </div>
              </div>
            </div>
        </div>
        <div id="detailImgDiv">
         <img src="data:image/<?=$contentImgType ?>;base64,<?php echo base64_encode($contentImg); ?>" alt="Content Image" width="800px;" id="detailImgId">
        </div>
    </div>
  </div>

  <form id="buyForm" method="post" action="pay.php">
    <input type="hidden" id="memberNoData" name="memberNoData">
    <input type="hidden" id="productCodeData" name="productCodeData">
    <input type="hidden" id="amountData" name="amountData">
  </form>
<script src="productDetail.js"></script>
</body>
</html>