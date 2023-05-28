<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyGoodsStore</title>
  <link rel="stylesheet" href="list.css">
  <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<body>
  <?php
    session_start();
    $memberNo = isset($_SESSION["memberNo"]) ? $_SESSION["memberNo"] : 0;
    $name = isset($_SESSION["memberNo"]) ? $_SESSION["name"] : 0;
    $id = isset($_SESSION["memberNo"]) ? $_SESSION["id"] : 0;
  ?>
  <?php
    $con = mysqli_connect("localhost", "user1", "12345", "phpfinalproject");
    $sql = "select p.*, c.amount from storeproduct p join storecart c on p.productCode = c.productCode where c.memberNo = $memberNo";
    $result = mysqli_query($con, $sql);
    $row_cnt = mysqli_num_rows($result);
    $count = 0;
    $num = 0;
    $totalPrice = 0;
    $totalDelPrice = 0;
    
    if($row_cnt != 0){
      while($row = mysqli_fetch_assoc($result)){
        $num++;
        $product[$num]['productCode'] = $row['productCode'];
        $product[$num]['productName'] = $row['productName'];
        $product[$num]['detailName'] = $row['detailName'];
        $product[$num]['productPrice'] = $row['productPrice'];
        $product[$num]['artistName'] = $row['artistName'];
        $product[$num]['stock'] = $row['stock'];
        $product[$num]['cateCode'] = $row['cateCode'];
        $product[$num]['delPeriod'] = $row['delPeriod'];
        $product[$num]['delPrice'] = $row['delPrice'];
        $product[$num]['titleImgType'] = $row['titleImgType'];
        $product[$num]['mainImgType'] = $row['mainImgType'];
        $product[$num]['contentImgType'] = $row['contentImgType'];
        $product[$num]['titleImg'] = $row['titleImg'];
        $product[$num]['mainImg'] = $row['mainImg'];
        $product[$num]['contentImg'] = $row['contentImg'];
        $product[$num]['soldOut'] = $row['soldOut'];
        $product[$num]['regiDate'] = $row['regiDate'];
        $product[$num]['amount'] = $row['amount'];
      }
    }
    mysqli_close($con);
  ?>
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
      <h1>Cart</h1>
      <?php
        if($num != 0):
      ?>
      <form action="../product/pay.php" method="post" id="checkout-form">
      <table id="cartTable">
        <tr>
          <th>
            <input type="checkbox" name="checkAll" id="checkAll" checked>
          </th>
          <th>상품정보</th>
          <th>수량</th>
          <th>배송비</th> 
          <th>주문금액</th>
        </tr>
        <?php
            while($count < $num):
            $count++;
            $orderPrice = $product[$count]['productPrice'] * $product[$count]['amount'];
            $totalPrice = $totalPrice + $orderPrice;
            $totalDelPrice = $totalDelPrice + $product[$count]['delPrice'];
            $allTotal = $totalPrice + $totalDelPrice;
        ?>
        <tr>
          <td id="firstTd">
            <input type="checkbox" name="checkProduct[]" id="checkProduct" class="checkboxClass" value="<?=$product[$count]['productCode']?>" checked>
          </td>
          <td id="secondTd">
            <img src="data:image/<?=$product[$count]['titleImgType'] ?>;base64,<?php echo base64_encode($product[$count]['titleImg']); ?>" alt="Main Image" id="productImg" width="90px;">
            <div id="secondTdDiv">
              <div>
                <span id="artistNameSpan">
                  <?=$product[$count]['artistName'] ?>
                </span>
                <span id="productNameSpan" onClick="location.href='../product/productDetail.php?productCode=<?=$product[$count]['productCode']?>'">
                  <?=$product[$count]['productName'] ?>
                </span>
                <br>
                <button id="removeOneBtn" onClick="removeOne(<?=$product[$count]['productCode']?>);">삭제</button>
              </div>
            </div>
          </td>
          <td id="thirdTd">
            <button id="minusBtn" class="amountBtn" onClick="minus(<?=$product[$count]['amount']?>, <?=$product[$count]['productCode']?>, <?=$memberNo?>);">-</button>
            <input type="text" value="<?=$product[$count]['amount']?>" id="amountInput" oninput="this.value = this.value.replace(/\D/g, '');">
            <button id="plusBtn" class="amountBtn" onClick="plus(<?=$product[$count]['amount']?>, <?=$product[$count]['productCode']?>, <?=$memberNo?>);">+</button>
          </td>
          <td id="fourthTd">
            \<?php echo number_format($product[$count]['delPrice']); ?>
          </td>
          <td id="fifthTd">
            \<?php echo number_format($orderPrice); ?>
          </td>
        </tr>
        <?php 
            endwhile;
         ?>
      </table>
      </form>
      <div id="removeBtnDiv">
        <button onClick="remove();">선택상품삭제</button>
      </div>
      <div id="totalDiv">
          <div id="priceNumber">
            \ <input type="text" value="<?php echo number_format($totalPrice); ?>" id="totalPrice" readonly>
            +
            \ <input type="text" value="<?php echo number_format($totalDelPrice); ?>" id="totalDelPrice" readonly>
            =
            <span>\</span> <input type="text" value="<?php echo number_format($allTotal); ?>" id="allTotalPrice" readonly>
          </div>
          <div id="priceMent">
            <span id="ment1" class="priceMentClass">
              총 상품금액
            </span>
            <span id="ment2" class="priceMentClass">
              배송비
            </span>
            <span id="ment3" class="priceMentClass">
              결제예정금액
            </span>
          </div>
      </div>
      <div id="btnDiv">
          <button type="button" >전체상품 주문</button>
          <button type="button" onClick="selectOrder();">선택상품 주문</button>
          <button type="button" onClick="location.href='../index.php'">계속 쇼핑하기</button>
      </div>
      <?php
        else :
      ?>
      <div id="emptyDiv">
        <img src="../img/sad.png" width="50px">
        <span>앗! 장바구니가 비어 있어요!</span>
        <button onClick="location.href='../index.php'">계속 쇼핑하기</button>
      </div>
      <?php
        endif;
      ?>
    </div>
  </div>
  <script>
    let memberNo = <?php echo $memberNo ?>;
    let totalPrice = <?php echo $totalPrice ?>;
  </script>
<script src="list.js"></script>
</body>
</html>