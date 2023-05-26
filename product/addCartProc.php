<?php
  $memberNo = $_POST['memberNo'];
  $productCode = $_POST['productCode'];
  $amount = $_POST['amount'];
  $regidate = date("Y-m-d H:i:s");
  $con = mysqli_connect("localhost", "user1", "12345", "phpfinalproject");
  $sql = "select amount from storecart where memberNo = $memberNo and productCode = $productCode";
  $result = mysqli_query($con, $sql);
  $row_cnt = mysqli_num_rows($result);
  
  if($row_cnt == 0){
    $sql = "insert into storecart (memberNo, productCode, amount, regidate) values ($memberNo, $productCode, $amount, '$regidate')";
    mysqli_query($con, $sql);
  } else {
    while($row = mysqli_fetch_assoc($result)) {
      $amountvalue = $row['amount'];
    }
    $totalAmount = $amount + $amountvalue;
    if($totalAmount > 10){
      $totalAmount = 10;
    }
    $sql = "update storecart set amount = $totalAmount where memberNo = $memberNo and productCode = $productCode";
    mysqli_query($con, $sql);
  }
  mysqli_close($con);
?>