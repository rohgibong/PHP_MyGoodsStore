<?php
  $id = $_POST['id'];
  $con = mysqli_connect("localhost", "user1", "12345", "phpfinalproject");
  $sql = "select count(*) from storemember where id = '$id'";
  $result = mysqli_query($con, $sql);
  $count = mysqli_fetch_array($result)[0];

  if($count > 0){
    echo "1";
  } else {
    echo "0";
  }
  mysqli_close($con);
?>