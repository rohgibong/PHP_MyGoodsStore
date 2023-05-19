<?php
  date_default_timezone_set("Asia/Seoul"); //한국시간으로 조정

  $productName = $_POST["productName"];
  $detailName = $_POST["detailName"];
  $productPrice = $_POST["productPrice"];
  $artistName = $_POST["artistName"];
  $stock = $_POST["stock"];
  $cateCode = $_POST["cateCode"];
  $delPeriod = $_POST["delPeriod"];
  $delPrice = $_POST["delPrice"];
  $titleImgType = explode("/", $_FILES["titleImg"]["type"])[1];
  $mainImgType = explode("/", $_FILES["mainImg"]["type"])[1];
  $contentImgType = explode("/", $_FILES["contentImg"]["type"])[1];
  $titleImgData = $_FILES["titleImg"]["tmp_name"];
  $mainImgData = $_FILES["mainImg"]["tmp_name"];
  $contentImgData = $_FILES["contentImg"]["tmp_name"];
  $soldOut = $_POST["soldOut"];
  $regidate = date("Y-m-d H:i:s");

  // $titleImg = file_get_contents($titleImgData);
  // $titleImg = mysqli_real_escape_string($con, $titleImg);

  // $mainImg = file_get_contents($mainImgData);
  // $mainImg = mysqli_real_escape_string($con, $mainImg);

  // $contentImg = file_get_contents($contentImgData);
  // $contentImg = mysqli_real_escape_string($con, $contentImg);
  
  $titleImg = addslashes(file_get_contents($titleImgData));
  $mainImg = addslashes(file_get_contents($mainImgData));
  $contentImg = addslashes(file_get_contents($contentImgData));


  $con = mysqli_connect("localhost", "user1", "12345", "phpfinalproject");
  $sql = "insert into storeproduct(productName, detailName, productPrice, artistName, stock, cateCode, delPeriod, delPrice, titleImg, mainImg, contentImg, titleImgType, mainImgType, contentImgType, soldOut, regidate) values ('$productName', '$detailName', $productPrice, '$artistName', $stock, $cateCode, $delPeriod, $delPrice, '$titleImg', '$mainImg', '$contentImg', '$titleImgType', '$mainImgType', '$contentImgType', '$soldOut', '$regidate')";

  mysqli_query($con, $sql);

  mysqli_close($con);

?>
<script>
  alert("물품 등록성공");
  location.href="productList.php";
</script>
