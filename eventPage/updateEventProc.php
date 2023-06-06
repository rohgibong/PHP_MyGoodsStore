<?php
  $eventNo = $_POST["eventNo"];
  $title = $_POST["titleInput"];
  $content = $_POST["contentInput"];
  $startDate = $_POST["startDate"];
  $endDate = $_POST["endDate"];

  $con = mysqli_connect("localhost", "user1", "12345", "phpfinalproject");
  $sql = "update storeevent set title = '$title', content = '$content', startDate = '$startDate', endDate = '$endDate' where eventNo = $eventNo ";
  
  mysqli_query($con, $sql);

  mysqli_close($con);
?>
<script>
  alert("수정되었습니다.");
  location.href="eventDetail.php?eventNo="+<?=$eventNo ?>;
</script>