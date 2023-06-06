<?php
  session_start();
  date_default_timezone_set("Asia/Seoul");
  $memberNo = isset($_SESSION["memberNo"]) ? $_SESSION["memberNo"] : 0;
  $productCodes = isset($_POST["productCodes"]) ? $_POST["productCodes"] : 0;
  $amounts = isset($_POST["amounts"]) ? $_POST["amounts"] : 0;
  $orderDate = date("Y-m-d H:i:s");
  $soldOut = "X";
  $boughtPrice = 0;
  $con = mysqli_connect("localhost", "user1", "12345", "phpfinalproject");
?>
<script>
  const memberNo = <?php echo $memberNo ?>;
  const productCodes = <?php echo json_encode($productCodes)?>;
  if(memberNo <= 0 || productCodes == 0){
    alert('잘못된 접근입니다.');
    location.href='../index.php';
  }
</script>
<?php
  $sql = "select point, level from storemember where memberNo = $memberNo";
  $result = mysqli_query($con, $sql);
  while($row = mysqli_fetch_assoc($result)) {
    $userPoint = $row['point'];
    $userLevel = $row['level'];
  }


  for ($i = 0; $i < count($productCodes); $i++) {
    //1.(storeproduct 테이블에서 가격, 재고 뽑아오기, 포인트 계산, 남은재고계산)
    $sql = "select productPrice, stock, delPrice from storeproduct where productCode = ".$productCodes[$i];
    $result2 = mysqli_query($con, $sql);
    while($row = mysqli_fetch_assoc($result2)) {
      $productPrice = $row['productPrice'];
      $stock = $row['stock'];
    }
    $userPoint = $userPoint + (($productPrice / 100) * $amounts[$i]);
    $stock = $stock - $amounts[$i];
    $orderPrice = $productPrice * $amounts[$i];

    //2.(storeorder테이블에 담아온거 저장)
    $sql = "insert into storeorder(memberNo, productCode, amount, orderPrice, orderDate) values ($memberNo, ".$productCodes[$i].", ".$amounts[$i].", $orderPrice, '$orderDate')";
    mysqli_query($con, $sql);

    //3.(재고 업데이트)
    if($stock <= 0){
      $soldOut = "O";
    } else {
      $soldOut = "X";
    }
    $sql = "update storeproduct set soldOut = '$soldOut', stock = $stock where productCode = ".$productCodes[$i];
    mysqli_query($con, $sql);

    //4.(storecart테이블에 담아온게 있으면 삭제)
    $sql = "select * from storecart where memberNo = $memberNo and productCode = ".$productCodes[$i]." and amount = ".$amounts[$i];
    $result3 = mysqli_query($con, $sql);
    $row_cnt = mysqli_num_rows($result3);
    
    if($row_cnt != 0){
      $sql = "delete from storecart where memberNo = $memberNo and productCode = ".$productCodes[$i]." and amount = ".$amounts[$i];
      mysqli_query($con, $sql);
    }
  }

  //5.(포인트계산)
  $sql = "update storemember set point = $userPoint where memberNo = $memberNo";
  mysqli_query($con, $sql);

  //6.(레벨계산)
  $sql = "select orderPrice from storeorder where memberNo = $memberNo";
  $result4 = mysqli_query($con, $sql);
  while($row = mysqli_fetch_assoc($result4)) {
    $boughtPrice = $boughtPrice + $row['orderPrice'];
  }

  if($boughtPrice > 1000000){
    $userLevel = 5;
  } else if($boughtPrice > 750000){
    $userLevel = 4;
  } else if($boughtPrice > 500000){
    $userLevel = 3;
  } else if($boughtPrice > 250000){
    $userLevel = 2;
  } else {
    $userLevel = 1;
  }

  //7.(레벨업데이트)
  $sql = "update storemember set level = $userLevel where memberNo = $memberNo";
  mysqli_query($con, $sql);


  mysqli_close($con);
?>

<script>
  alert("주문해주셔서 감사합니다 !\n메인페이지로 이동합니다.");
  location.href="../index.php";
</script>