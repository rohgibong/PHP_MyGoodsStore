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
  ?>
  <script>
    const memberNo = <?php echo $memberNo ?>;
    if(memberNo != 1){
      alert('잘못된 접근입니다.');
      location.href='../index.php';
    }
  </script>
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
      
      
        
        
      <span id="productAddBtn" onClick="productAdd();">상품추가</span>
    </div>
  </form>


</div>
  
<script src="productList.js"></script>
</body>
</html>