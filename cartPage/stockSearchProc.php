<?php
  $memberNo = $_POST['memberNo'];
  $productCode = $_POST['productCode'];
  $con = mysqli_connect("localhost", "user1", "12345", "phpfinalproject");
  $sql = "select amount from storecart where memberNo = $memberNo and productCode = $productCode";
  $result = mysqli_query($con, $sql);
  while($row = mysqli_fetch_assoc($result)) {
    $amount = $row['amount'];
  }

  $sql = "select stock from storeproduct where productCode = $productCode";
  $result2 = mysqli_query($con, $sql);

  while($row = mysqli_fetch_assoc($result2)) {
    $stock = $row['stock'];
  }

  if($stock < $amount){
    echo "1";
  } else {
    echo "0";
  }
  mysqli_close($con);
?>