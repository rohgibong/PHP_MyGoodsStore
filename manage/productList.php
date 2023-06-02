<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyGoodsStore</title>
  <link rel="stylesheet" href="productList.css">
</head>
<body>
  <?php
    session_start();
    $memberNo = isset($_SESSION["memberNo"]) ? $_SESSION["memberNo"] : 0;
    $pageNumber = isset($_GET["pageNumber"]) ? $_GET["pageNumber"] : 1;
  ?>
  <script>
    const memberNo = <?php echo $memberNo ?>;
    if(memberNo != 1){
      alert('잘못된 접근입니다.');
      location.href='../index.php';
    }
  </script>
  <?php
    $pageSet = 5;
    $startNum = ($pageSet * ($pageNumber-1) + 1);
    $endNum = $pageSet * $pageNumber;
    $con = mysqli_connect("localhost", "user1", "12345", "phpfinalproject");
    $sql = "select * from (select row_number() over(order by soldout desc, regiDate desc) as rowNum, p.* from storeproduct p) as subquery where rowNum >= $startNum and rowNum <= $endNum;";
    $result = mysqli_query($con, $sql);
    $row_cnt = mysqli_num_rows($result);
    $count = 0;
    $num = 0;

    if($row_cnt != 0){
      while($row = mysqli_fetch_assoc($result)){
        $num++;
        $product[$num]['rowNum'] = $row['rowNum'];
        $product[$num]['productCode'] = $row['productCode'];
        $product[$num]['productName'] = $row['productName'];
        $product[$num]['artistName'] = $row['artistName'];
        $product[$num]['stock'] = $row['stock'];
        $product[$num]['cateCode'] = $row['cateCode'];
        $product[$num]['titleImgType'] = $row['titleImgType'];
        $product[$num]['titleImg'] = $row['titleImg'];
        $product[$num]['soldOut'] = $row['soldOut'];
        $product[$num]['regiDate'] = $row['regiDate'];
      }
    } else {
      echo '<script>alert("잘못된 접근입니다.");location.href="../index.php";</script>';
    }
    $sql = "select count(*) from storeproduct;";
    $result2 = mysqli_query($con, $sql);
    $productCount = mysqli_fetch_array($result2)[0];
    if($productCount == 0){
      $pageCount = 1;
    } else {
      $pageCount = floor(($productCount-1) / $pageSet) + 1;
    }

    if($pageNumber < 1 || $pageNumber > $pageCount){
      echo '<script>alert("잘못된 접근입니다.");location.href="../index.php";</script>';
    }
    
    mysqli_close($con);
  ?>
  <div id="mainDiv">
  <div id="titleDiv">
    <div id="mainTitleDiv">
      <img src="../img/MyGoodsStoreLogoBlack.png" alt="logoImg" width="180px" id="logoImg" onClick="location.href='../index.php'">
    </div>
  </div>

  <form name="productAddForm" action="productAddProc.php" method="post">
    <div id="contentDiv">
      <div id="titleMentDiv">
        <span id="titleMent">상품 리스트</span>
      </div>
      <table id="productTable">
        <tr>
          <th>No</th>
          <th>사진</th>
          <th>상품명</th>
          <th>아티스트명</th>
          <th>카테고리</th>
          <th>수량</th>
          <th>품절여부</th>
          <th>등록일</th>
        </tr>
        <?php
          while($count < $num): 
          $count++;
        ?>
        <tr id="productTr" onClick="move(<?=$product[$count]['productCode']?>);">
          <td id="firstTd">
            <?=$product[$count]['rowNum'] ?>
          </td>
          <td id="secondTd">
            <img src="data:image/<?=$product[$count]['titleImgType'] ?>;base64,<?php echo base64_encode($product[$count]['titleImg']); ?>" alt="Main Image" width="50px;">
          </td>
          <td id="thirdTd">
            <?=$product[$count]['productName'] ?>
          </td>
          <td id="fourthTd">
            <?=$product[$count]['artistName'] ?>
          </td>
          <td id="fifthTd">
            <?php
              if($product[$count]['cateCode'] == 1){
                echo "MUSIC";
              } else if($product[$count]['cateCode'] == 2){
                echo "PHOTO";
              } else if($product[$count]['cateCode'] == 3){
                echo "FASHION";
              } else if($product[$count]['cateCode'] == 4){
                echo "CONCERT";
              }
            ?>
          </td>
          <td id="sixthTd">
            <?=$product[$count]['stock'] ?>개
          </td>
          <td id="seventhTd">
            <?=$product[$count]['soldOut'] ?>
          </td>
          <td id="eightthTd">
            <?=$product[$count]['regiDate'] ?>
          </td>
        </tr>
        <?php endwhile; ?>
      </table>
      
      <div id="pageDiv">
        <?php if($pageNumber > 1) : ?>
          <span class="arrowBtn" onClick="location.href='productList.php?pageNumber=<?=$pageNumber-1 ?>'">< 이전</span>
        <?php else : ?>
          <span class="arrowBtn" id="noName">< 이전</span>
        <?php endif ; ?>
        
        <?php for($page = 1; $page < $pageCount+1; $page++) : ?>
          <span id="pageSpan" onClick="location.href='productList.php?pageNumber=<?=$page ?>'">
            <?=$page ?>
          </span>
        <?php endfor; ?>
        
        <?php if($pageNumber < $pageCount) : ?>
          <span class="arrowBtn" onClick="location.href='productList.php?pageNumber=<?=$pageNumber+1 ?>'">다음 ></span>
        <?php else : ?>
          <span class="arrowBtn" id="noName">다음 ></span>
        <?php endif ; ?>
      </div>
        
       
      <div id="btnDiv">
        <span id="productAddBtn" onClick="productAdd();">상품추가</span>
      </div>
    </div>
  </form>

  <form name="detailForm" action="product_detail.php" method="post">
    <input type="hidden" name="productCode" id="productCode">
  </form>


</div>
  
<script src="productList.js"></script>
</body>
</html>