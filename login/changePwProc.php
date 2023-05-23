<?php
  $memberNo = $_POST["memberNo"];
  $pwd = $_POST["pwd"];

  $con = mysqli_connect("localhost", "user1", "12345", "phpfinalproject");
  $sql = "update storemember set pwd = '$pwd' where memberNo = $memberNo";

  mysqli_query($con, $sql);

  mysqli_close($con); 

?>
<script>
  alert("변경이 완료되었습니다. 변경한 비밀번호로 로그인해주세요.");
  location.href="login.php";
</script>