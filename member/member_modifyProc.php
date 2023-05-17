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
    $memberNo = $_POST["memberNo"];
    $birth1 = $_POST["birth1"];
    $birth2 = $_POST["birth2"];
    $birth3 = $_POST["birth3"];
    $phone1 = $_POST["phone1"];
    $phone2 = $_POST["phone2"];
    $phone3 = $_POST["phone3"];
    $pwd = $_POST["pwd"];
    $address1 = $_POST["address1"];
    $address2 = $_POST["address2"];
    $address3 = $_POST["address3"];
    $address4 = $_POST["address4"];
    $email1 = $_POST["email1"];
    $email2 = $_POST["email2"];

    $con = mysqli_connect("localhost", "user1", "12345", "phpfinalproject");
    $sql = "update storemember set birth1 = '$birth1', birth2 = '$birth2', birth3 = '$birth3', phone1 = '$phone1', phone2 = '$phone2', phone3 = '$phone3', pwd = '$pwd', address1 = $address1, address2 = '$address2', address3 = '$address3', address4 = '$address4', email1 = '$email1', email2 = '$email2' where memberNo = $memberNo";

    mysqli_query($con, $sql);

    mysqli_close($con);


    echo "멤버번호 : ".$memberNo."<br>";
    echo "년 : ".$birth1."<br>";
    echo "월 : ".$birth2."<br>";
    echo "일 : ".$birth3."<br>";
    echo "폰1 : ".$phone1."<br>";
    echo "폰2 : ".$phone2."<br>";
    echo "폰3 : ".$phone3."<br>";
    echo "비번 : ".$pwd."<br>";
    echo "주소1 : ".$address1."<br>";
    echo "주소2 : ".$address2."<br>";
    echo "주소3: ".$address3."<br>";
    echo "주소4 : ".$address4."<br>";
    echo "이멜1 : ".$email1."<br>";
    echo "이멜2 : ".$email2."<br>";



  ?>
  <script>
    alert("수정이 완료되었습니다.");
    location.href="member_modify.php?memberNo=<?=$memberNo ?>";
  </script>
</body>
</html>