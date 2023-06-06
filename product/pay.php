<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyGoodsStore</title>
  <link rel="stylesheet" href="pay.css">
</head>
<body>
  <?php
    session_start();
    $memberNo = isset($_SESSION["memberNo"]) ? $_SESSION["memberNo"] : 0;
    $name = isset($_SESSION["memberNo"]) ? $_SESSION["name"] : 0;
    $id = isset($_SESSION["memberNo"]) ? $_SESSION["id"] : 0;
    $memberNoData = isset($_POST["memberNoData"]) ? $_POST["memberNoData"] : 0;
    $productCode = isset($_POST["productCodeData"]) ? $_POST["productCodeData"] : 0;
    $amount = isset($_POST["amountData"]) ? $_POST["amountData"] : 0;
    $checkProduct = isset($_POST["checkProduct"]) ? $_POST["checkProduct"] : 0;
    $con = mysqli_connect("localhost", "user1", "12345", "phpfinalproject");
    $count = 0;
    $num = 0;
    $pricePlus = 0;
    $delPlus = 0;

    if ($checkProduct != 0) {
      foreach ($checkProduct as $arrProductCode) {
        $sql = "select p.*, c.amount from storeproduct p join storecart c on p.productCode = c.productCode where c.memberNo = $memberNo and c.productCode = $arrProductCode";
        $result = mysqli_query($con, $sql);
        mysqli_num_rows($result);
        while($row = mysqli_fetch_assoc($result)){
          $product[$num]['productCode'] = $row['productCode'];
          $product[$num]['productName'] = $row['productName'];
          $product[$num]['productPrice'] = $row['productPrice'];
          $product[$num]['artistName'] = $row['artistName'];
          $product[$num]['delPrice'] = $row['delPrice'];
          $product[$num]['titleImgType'] = $row['titleImgType'];
          $product[$num]['titleImg'] = $row['titleImg'];
          $product[$num]['amount'] = $row['amount'];
          $product[$num]['totalPrice'] = $row['productPrice'] * $row['amount'];
          $num++;
        }
      }
    } else if($productCode != 0) {  
      $sql = "select * from storeproduct where productCode = $productCode";
      $result = mysqli_query($con, $sql);
      mysqli_num_rows($result);
      while($row = mysqli_fetch_assoc($result)){
        $product[$num]['productCode'] = $row['productCode'];
        $product[$num]['productName'] = $row['productName'];
        $product[$num]['productPrice'] = $row['productPrice'];
        $product[$num]['artistName'] = $row['artistName'];
        $product[$num]['delPrice'] = $row['delPrice'];
        $product[$num]['titleImgType'] = $row['titleImgType'];
        $product[$num]['titleImg'] = $row['titleImg'];
        $product[$num]['amount'] = $amount;
        $product[$num]['totalPrice'] = $row['productPrice'] * $amount;
        $num++;
      }
    }

    $sql = "select * from storemember where memberNo = $memberNo";
    $result = mysqli_query($con, $sql);
    mysqli_num_rows($result);
    while($row = mysqli_fetch_assoc($result)){
      $name = $row['name'];
      $address1 = $row['address1'];
      $address2 = $row['address2'];
      $address3 = $row['address3'];
      $address4 = $row['address4'];
      $phone1 = $row['phone1'];
      $phone2 = $row['phone2'];
      $phone3 = $row['phone3'];
    }
    mysqli_close($con);
  ?>
  <script>
    const memberNo = <?php echo $memberNo ?>;
    const checkProduct = <?php echo json_encode($checkProduct)?>;
    const productCode = <?php echo $productCode ?>;
    if(memberNo <= 0 || (checkProduct == 0 && productCode == 0)){
      alert('잘못된 접근입니다.');
      location.href='../index.php';
    }
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
        <img src="../img/basket.png" alt="basketImg" width="50px" id="basketImg" onClick="moveCartPage();">
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
      <div id="subTitleDiv">
          <h1>Order</h1>
      </div>
      <span id="orderTitle">주문내역</span>
      <span id="orderSubMent">상품의 옵션 및 수량 변경은 상품상세 또는 장바구니에서 가능합니다.</span>
      <table id="orderTable" border="0">
        <tr>
          <th class="orderTh">이미지</th>
          <th class="orderTh">상품정보</th>
          <th class="orderTh">판매가</th>
          <th class="orderTh">수량</th>
          <th class="orderTh">배송비</th>
          <th class="orderTh">합계</th>
        </tr>
        <?php
          while($count < $num): 
          $pricePlus = $pricePlus + $product[$count]['totalPrice'];
          $delPlus = $delPlus + $product[$count]['delPrice'];
        ?>
        <tr>
          <td id="firstTd" class="orderTd">
            <img src="data:image/<?=$product[$count]['titleImgType'] ?>;base64,<?php echo base64_encode($product[$count]['titleImg']); ?>" alt="Title Image" width="100px;">
          </td>
          <td id="secondTd" class="orderTd">
           <div id="secondTdDiv">
              <div>
                <span id="artistNameSpan" onClick="location.href='productDetail.php?productCode=<?=$product[$count]['productCode']?>'">
                  <?=$product[$count]['artistName'] ?>
                </span>
                <span id="productNameSpan" onClick="location.href='productDetail.php?productCode=<?=$product[$count]['productCode']?>'">
                  <?=$product[$count]['productName'] ?>
                </span>
              </div>
            </div>
          </td>
          <td id="thirdTd" class="orderTd">
            \<?php echo number_format($product[$count]['productPrice']); ?>
          </td>
          <td id="fourthTd" class="orderTd">
            <?=$product[$count]['amount'] ?>
          </td>
          <td id="fifthTd" class="orderTd">
            \<?php echo number_format($product[$count]['delPrice']); ?>
          </td>
          <td id="sixthTd" class="orderTd">
            \<?php echo number_format($product[$count]['totalPrice']); ?>
          </td>
        </tr>
        <input type="hidden" name="productCodes[]" value="<?=$product[$count]['productCode']?>">
        <input type="hidden" name="amounts[]" value="<?=$product[$count]['amount']?>">
        <?php 
          $count++;
          endwhile;
        ?>
        <tr>
          <td colspan="6" id="totalTd" class="orderTd">
            <div id="totalDiv">
              <span> 
                상품합계 &nbsp; \<?php echo number_format($pricePlus); ?>
              </span>
              +
              <span>
                배송비 &nbsp; \<?php echo number_format($delPlus); ?>
              </span>
              =
              <span>
                총 합계
              </span>
              <span id="totalPriceSpan">
                \<?php echo number_format($pricePlus+$delPlus); ?>
              </span>
            </div>
          </td>
        </tr>
      </table>
      
      <div id="delInfoDiv">
        <span id="delInfoTitle">배송 정보</span>
        <table id="delInfoTable" border="0">
          <tr>
            <td class="delInfoName">받으시는 분</td>
            <td class="delInfoTd"><?=$name ?></td>
          </tr>
          <tr>
            <td id="addressName" rowspan="3">주소</td>
            <td class="delInfoTd"><?=$address1 ?></td>
          </tr>
          <tr>
            <td class="delInfoTd"><?=$address2 ?></td>
          </tr>
          <tr>
            <td class="delInfoTd"><?=$address3 ?> <?=$address4 ?></td>
          </tr>
          <tr>
            <td class="delInfoName">연락처</td>
            <td class="delInfoTd"><?=$phone1 ?>-<?=$phone2 ?>-<?=$phone3 ?></td>
          </tr>
          <tr>
            <td class="delInfoName">배송메시지</td>
            <td class="delInfoTd">
              <textarea name="delTextArea" id="delTextArea" cols="50" rows="5" placeholder="ex)부재 시 문 앞에 놓아주세요."></textarea>
            </td>
          </tr>
        </table>
      </div>
      
    <div id="btnDiv">
      <button type="button" id="payBtn" onClick="orderItem();">결제하기</button>
    </div>
    </div>

<script src="pay.js"></script>
</body>
</html>