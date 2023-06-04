<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyGoodsStore</title>
  <link rel="stylesheet" href="member_orderDetail.css">
</head>
<body>
<?php
  session_start();
  $memberNo = isset($_SESSION["memberNo"]) ? $_SESSION["memberNo"] : 0;
  $name = isset($_SESSION["memberNo"]) ? $_SESSION["name"] : 0;
  $id = isset($_SESSION["memberNo"]) ? $_SESSION["id"] : 0;
  $orderNo = isset($_GET["orderNo"]) ? $_GET["orderNo"] : 0;
?>
<script>
  const memberNo = <?php echo $memberNo ?>;
  const orderNo = <?php echo $orderNo ?>;
  if(memberNo <= 0 ){
    location.href='../login/login.php';
  }
  if(orderNo <= 0 ){
    alert('잘못된 접근입니다.');
    location.href='../index.php';
  }
</script>
<?php
  $con = mysqli_connect("localhost", "user1", "12345", "phpfinalproject");
  $sql = "select * from storemember where memberNo = $memberNo;";
  $result = mysqli_query($con, $sql);
  $row_cnt = mysqli_num_rows($result);
  if($row_cnt != 0){
    while($row = mysqli_fetch_assoc($result)){
       $name = $row['name'];
       $point = $row['point'];
       $level = $row['level'];
    }
  }
  $sql = "select p.*, o.memberNo, o.amount, o.orderPrice, o.orderDate from storeproduct p join storeorder o on p.productCode = o.productCode where memberNo = $memberNo and o.orderNo = $orderNo order by o.orderDate desc";
  $result2 = mysqli_query($con, $sql);
  $row_cnt = mysqli_num_rows($result2);
  $count = 0;
  $num = 0;
  if($row_cnt != 0){
    while($row = mysqli_fetch_assoc($result2)){
      $productCode = $row['productCode'];
      $productName = $row['productName'];
      $productPrice = $row['productPrice'];
      $delPrice = $row['delPrice'];
      $titleImgType = $row['titleImgType'];
      $titleImg = $row['titleImg'];
      $orderMemberNo = $row['memberNo'];
      $amount = $row['amount'];
      $orderPrice = $row['orderPrice'];
      $orderDate = $row['orderDate'];
      $num++;
    }
  }

  if($orderMemberNo != $memberNo){
    echo "<script>alert('잘못된 접근입니다.'); location.href='../index.php';</script>";
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
      
    </div>

  </div>
<script src="member_orderDetail.js"></script>
</body>
</html>