<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyGoodsStore</title>
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
  <?php
    $productCode = $_POST["productCode"];

  ?>
  상품번호 : <?=$productCode ?>
</body>
</html>