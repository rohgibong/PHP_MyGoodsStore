<?php
  $productCode = $_POST['productCode'];
  $memberNo = $_POST['memberNo'];

  $con = mysqli_connect("localhost", "user1", "12345", "phpfinalproject");
  $sql = "select c.amount, p.productPrice, p.delPrice from storecart c join storeproduct p on c.productCode = p.productCode where c.memberNo = $memberNo and c.productCode = $productCode";

  $result = mysqli_query($con, $sql);
  $row_cnt = mysqli_num_rows($result);

  while($row = mysqli_fetch_assoc($result)) {
    $amount = $row['amount'];
    $productPrice = $row['productPrice'];
    $delPrice = $row['delPrice'];
  }
  echo $amount.'/'.$productPrice.'/'.$delPrice;
  mysqli_close($con);
?>
