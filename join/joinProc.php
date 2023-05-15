<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyGoodsStore</title>
</head>
<body>
  <?php
    date_default_timezone_set("Asia/Seoul"); //한국시간으로 조정

    $name = $_POST["name"];
    $birthYear = $_POST["birthYear"];
    $birthMonth = $_POST["birthMonth"];
    $birthDay = $_POST["birthDay"];
    $gender = $_POST["gender"];
    $phone1 = $_POST["phone1"];
    $phone2 = $_POST["phone2"];
    $phone3 = $_POST["phone3"];
    $id = $_POST["id"];
    $pwd = $_POST["pwd"];
    $address1 = $_POST["address1"];
    $address2 = $_POST["address2"];
    $address3 = $_POST["address3"];
    $address4 = $_POST["address4"];
    $email1 = $_POST["email1"];
    $email2 = $_POST["email2"];
    $regidate = date("Y-m-d H:i:s");
    $level = 1;
    $point = 2000;

    $con = mysqli_connect("localhost", "user1", "12345", "phpfinalproject");
    $sql = "insert into storemember(name, birth1, birth2, birth3, gender, phone1, phone2, phone3, id, pwd, address1, address2, address3, address4, email1, email2, regidate, level, point) values ('$name', $birthYear, $birthMonth, $birthDay, '$gender', $phone1, $phone2, $phone3, '$id', '$pwd', $address1, '$address2', '$address3', '$address4', '$email1', '$email2', '$regidate', $level, $point)";

    mysqli_query($con, $sql);

    mysqli_close($con);

 
    // echo "이름 : ".$name;
    // echo "년 : ".$birthYear;
    // echo "월 : ".$birthMonth;
    // echo "일 : ".$birthDay;
    // echo "성별 : ".$gender;
    // echo "폰1 : ".$phone1;
    // echo "폰2 : ".$phone2;
    // echo "폰3 : ".$phone3;
    // echo "아이디 : ".$id;
    // echo "비번 : ".$pwd;
    // echo "주소1 : ".$address1;
    // echo "주소2 : ".$address2;
    // echo "주소3: ".$address3;
    // echo "주소4 : ".$address4;
    // echo "이멜1 : ".$email1;
    // echo "이멜2 : ".$email2;



  ?>
  <script>
    alert("가입이 완료되었습니다.\n로그인 페이지로 이동합니다.");
    location.href="../login/login.php";
  </script>
</body>
</html>