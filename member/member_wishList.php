<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyGoodsStore</title>
  <link rel="stylesheet" href="member_wishList.css">
  <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<body>
<?php
  session_start();
  $memberNo = isset($_SESSION["memberNo"]) ? $_SESSION["memberNo"] : 0;
  $name = isset($_SESSION["memberNo"]) ? $_SESSION["name"] : 0;
  $id = isset($_SESSION["memberNo"]) ? $_SESSION["id"] : 0;
  $pageNumber = isset($_GET["pageNumber"]) ? $_GET["pageNumber"] : 1;
?>
<script>
  const memberNo = <?php echo $memberNo ?>;
  if(memberNo <= 0){
    location.href='../login/login.php';
  }
</script>
<?php
  $pageSet = 12;
  $startNum = ($pageSet * ($pageNumber-1) + 1);
  $endNum = $pageSet * $pageNumber;
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
  $sql = "select * from (select row_number() over (order by w.regidate desc) as rowNum, p.* from storeproduct p, storewish w where p.productCode = w.productCode and w.memberNo = $memberNo) as subquery where rowNum >= $startNum and rowNum <= $endNum;";
  $result2 = mysqli_query($con, $sql);
  $row_cnt = mysqli_num_rows($result2);
  $count = 0;
  $num= 0;
  if($row_cnt != 0){
    while($row = mysqli_fetch_assoc($result2)){
      $wish[$num]['productCode'] = $row['productCode'];
      $wish[$num]['productName'] = $row['productName'];
      $wish[$num]['productPrice'] = $row['productPrice'];
      $wish[$num]['artistName'] = $row['artistName'];
      $wish[$num]['titleImgType'] = $row['titleImgType'];
      $wish[$num]['titleImg'] = $row['titleImg'];
      $num++;
    }
  }
  $sql = "select count(*) from storewish where memberNo = $memberNo;";
  $result3 = mysqli_query($con, $sql);
  $productCount = mysqli_fetch_array($result3)[0];
  if($productCount == 0){
    $pageCount = 1;
  } else {
    $pageCount = floor(($productCount-1) / $pageSet) + 1;
  }
  if($pageNumber < 1 || $pageNumber > $pageCount){
    echo '<script>alert("잘못된 접근입니다.");location.href="../index.php";</script>';
  }
  $sql = "select count(*) from storeorder where memberNo = $memberNo;";
  $result4 = mysqli_query($con, $sql);
  $orderCount = mysqli_fetch_array($result4)[0];
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
      <div id="contentTopDiv">
        <div id="imgDiv">
          <img src="../img/myPageUser.png" alt="" width="150px">
        </div>
        <div id="infoDiv">
          <span id="nameSpan">
            <?=$name ?>님 &nbsp;
            <?php if($level == 1): ?>
              BRONZE
            <?php elseif($level == 2): ?>
              SILVER
            <?php elseif($level == 3): ?>
              GOLD
            <?php elseif($level == 4): ?>
              PLATINUM
            <?php elseif($level == 5): ?>
              DIAMOND
            <?php endif; ?>
          </span>
          <div>
            <span id="countSpan" onClick="location.href='member_orderPage.php'">
              주문내역 <br>
              <span><?=$orderCount ?></span>
            </span>
            <span id="pointSpan">
              포인트 <br>
              <span><?=$point ?> P</span>
            </span>
            <span id="couponSpan">
              쿠폰 <br>
              <span>0</span>
            </span>
          </div>
        </div>
      </div>
      <div id="wishListDiv">
        <div id="wishListTitle">
          위시리스트
          <div>
            <span onClick="location.href='../index.php'">HOME</span>
            >
            <span onClick="location.href='member_myPage.php'">MY PAGE</span>
            >
            <span onClick="location.href='member_wishList.php'">WISH</span>
            <br>
            <br>
            <?php if($num != 0) : ?>
            <button type="button" id="deleteAllBtn" onClick="deleteAll();">전체상품 삭제</button>
            <?php endif; ?>
          </div>
        </div>
        <table id="wishTable">
          <?php if($num > 0):?>
            <?php
              while($count < $num):
              if ($count % 6 == 0) echo '<tr>';
            ?>
            <td class="wishItemsTd">
              <img src="data:image/<?=$wish[$count]['titleImgType'] ?>;base64,<?php echo base64_encode($wish[$count]['titleImg']); ?>" alt="Title Image" id="productImg" width="130px;">
              <div id="wishItemsDiv" onClick="location.href='../product/productDetail.php?productCode=<?=$wish[$count]['productCode'] ?>'">
                <div id="nameDiv">
                  <span id="wishSpan1"><?=$wish[$count]['artistName']?></span>
                  <span id="wishSpan2"><?=$wish[$count]['productName']?></span>
                </div>
                <div id="priceDiv">
                  <span id="wishSpan3">\<?php echo number_format($wish[$count]['productPrice']); ?></span>
                </div>
              </div>
              <div id="deleteDiv">
                <button type="button" id="deleteBtn" onClick="deleteOne('<?=$wish[$count]['productCode'] ?>');">삭제</button>
              </div>
            </td>
            <?php
              $count++;
              if ($count % 6 == 0 || $count == $num):
                while($count % 6 != 0):
            ?>
            <td class="emptywishItemsTd"></td>
            <?php
                $count++;
                endwhile;
                echo '</tr>';
              endif;
              endwhile;
            ?>
          <?php else: ?>
          <tr>
            <td id="noWishTd">
              위시리스트 내역이 없습니다.
            </td>
          </tr>
          <?php endif; ?>
        </table>
        <div id="pageDiv">
        <?php if($pageNumber > 1) : ?>
          <span class="arrowBtn" onClick="location.href='member_wishList.php?pageNumber=<?=$pageNumber-1 ?>'">< 이전</span>
        <?php else : ?>
          <span class="arrowBtn" id="noName">< 이전</span>
        <?php endif ; ?>
        
        <?php for($page = 1; $page < $pageCount+1; $page++) : ?>
          <span id="pageSpan" onClick="location.href='member_wishList.php?pageNumber=<?=$page ?>'">
            <?=$page ?>
          </span>
        <?php endfor; ?>
        
        <?php if($pageNumber < $pageCount) : ?>
          <span class="arrowBtn" onClick="location.href='member_wishList.php?pageNumber=<?=$pageNumber+1 ?>'">다음 ></span>
        <?php else : ?>
          <span class="arrowBtn" id="noName">다음 ></span>
        <?php endif ; ?>
      </div>
      </div>

  </div>
<script src="member_wishList.js"></script>
</body>
</html>