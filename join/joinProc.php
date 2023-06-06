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
  $sql = "insert into storemember(name, birth1, birth2, birth3, gender, phone1, phone2, phone3, id, pwd, address1, address2, address3, address4, email1, email2, regidate, level, point) values ('$name', '$birthYear', '$birthMonth', '$birthDay', '$gender', '$phone1', '$phone2', '$phone3', '$id', '$pwd', $address1, '$address2', '$address3', '$address4', '$email1', '$email2', '$regidate', $level, $point)";

  mysqli_query($con, $sql);

  mysqli_close($con);
?>
<script>
  alert("가입이 완료되었습니다.\n오픈 이벤트로 2000포인트가 지급되었습니다!\n로그인 페이지로 이동합니다.");
  location.href="../login/login.php";
</script>