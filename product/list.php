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
    $cateCode = isset($_GET["cateCode"]) ? $_GET["cateCode"] : 0;
  ?>
  <script>
    const cateCode = <?php echo $cateCode ?>;
    if(cateCode <= 0 || cateCode > 4){
      alert('잘못된 접근입니다.');
      location.href='../index.php';
    }
  </script>
  <?php
  //select * from storeproduct where cateNum = '$cateNum';

    // $con = mysqli_connect("localhost", "user1", "12345", "phpfinalproject");
    // $sql = "select * from storemember where memberNo = '$memberNo';";
    // $result = mysqli_query($con, $sql);
    // $row_cnt = mysqli_num_rows($result);
    // while($row = mysqli_fetch_assoc($result)){
    //   $name = $row['name'];
    //   $birth1 = $row['birth1'];
    //   $birth2 = $row['birth2'];
    //   $birth3 = $row['birth3'];
    //   $gender = $row['gender'];
    //   $phone1 = $row['phone1'];
    //   $phone2 = $row['phone2'];
    //   $phone3 = $row['phone3'];
    //   $id = $row['id'];
    //   $pwd = $row['pwd'];
    //   $address1 = $row['address1'];
    //   $address2 = $row['address2'];
    //   $address3 = $row['address3'];
    //   $address4 = $row['address4'];
    //   $email1 = $row['email1'];
    //   $email2 = $row['email2'];
    //}
  ?>
  물품리스트 / 카테고리 번호 : <?=$cateCode ?>
  
</body>
</html>