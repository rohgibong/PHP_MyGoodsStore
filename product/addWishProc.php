<?php
  $memberNo = $_POST['memberNo'];
  $productCode = $_POST['productCode'];
  $regidate = date("Y-m-d H:i:s");
  $con = mysqli_connect("localhost", "user1", "12345", "phpfinalproject");
  $sql = "select count(*) from storewish where productCode = $productCode";
  $result = mysqli_query($con, $sql);
  $count = mysqli_fetch_array($result)[0];
  
  if($count <= 0){
    $sql = "insert into storewish(memberNo, productCode, regidate) values ($memberNo, $productCode, '$regidate')";
    mysqli_query($con, $sql);
  }
  mysqli_close($con);
?>