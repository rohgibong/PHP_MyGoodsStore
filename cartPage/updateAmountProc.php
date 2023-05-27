<?php
  $amount = $_POST['amount'];
  $productCode = $_POST['productCode'];
  $memberNo = $_POST['memberNo'];

  $con = mysqli_connect("localhost", "user1", "12345", "phpfinalproject");
  $sql = "update storecart set amount = $amount where productCode = $productCode and memberNo = $memberNo";
  mysqli_query($con, $sql);
  
  mysqli_close($con);
?>