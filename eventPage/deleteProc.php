<?php
  $eventNo = $_GET['eventNo'];
  

  $con = mysqli_connect("localhost", "user1", "12345", "phpfinalproject");
  $sql = "delete from storeevent where eventNo = $eventNo";

  mysqli_query($con, $sql);

  mysqli_close($con);
?>
<script>
  alert("삭제되었습니다.");
  location.href="list.php";
</script>