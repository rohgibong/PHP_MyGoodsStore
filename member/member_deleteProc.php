<?php
  $memberNo = $_POST["memberNo"];

  $con = mysqli_connect("localhost", "user1", "12345", "phpfinalproject");

  $sql = "delete from storemember where memberNo = $memberNo";

  mysqli_query($con, $sql);

  mysqli_close($con);

  session_start();
  session_destroy();

?>

<script>
  alert("회원 탈퇴가 완료되었습니다.\n그동안 저희 서비스를 이용해 주셔서 감사합니다.");
  location.href="../index.php";
</script>