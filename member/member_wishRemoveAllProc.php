<?php
  $memberNo = $_GET['memberNo'];
  
  $con = mysqli_connect("localhost", "user1", "12345", "phpfinalproject");
  $sql = "delete from storewish where memberNo = $memberNo";

  mysqli_query($con, $sql);

  mysqli_close($con);
?>

<script>
  location.href="member_wishList.php";
</script>