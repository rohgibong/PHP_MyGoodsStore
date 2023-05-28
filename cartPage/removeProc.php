<?php
  $productCode = $_POST['productCode'];
  $memberNo = $_POST['memberNo'];
  
  $con = mysqli_connect("localhost", "user1", "12345", "phpfinalproject");
  $sql = "delete from storecart where memberNo = $memberNo and productCode = $productCode";

  mysqli_query($con, $sql);

  mysqli_close($con);
?>