<?php
  date_default_timezone_set("Asia/Seoul");

  $memberNo = $_POST["memberNo"];
  $title = $_POST["titleInput"];
  $content = $_POST["contentInput"];
  $startDate = $_POST["startDate"];
  $endDate = $_POST["endDate"];
  $regiDate = date("Y-m-d H:i:s");
  $hits = 0;


  $con = mysqli_connect("localhost", "user1", "12345", "phpfinalproject");
  $sql = "insert into storeevent(memberNo, title, content, hits, startDate, endDate, regiDate) values ($memberNo, '$title', '$content', $hits, '$startDate', '$endDate', '$regiDate')";
  
  mysqli_query($con, $sql);

  mysqli_close($con);
?>
<script>
  alert("등록되었습니다.");
  location.href="list.php";
</script>