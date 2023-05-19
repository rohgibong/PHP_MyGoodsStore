<?php
  $id = $_POST["id"];
  $pwd = $_POST["pwd"];
  $con = mysqli_connect("localhost", "user1", "12345", "phpfinalproject");
  $sql = "select memberNo from storemember where id = '$id' and pwd = '$pwd';";
  $result = mysqli_query($con, $sql);
  $row_cnt = mysqli_num_rows($result);

  if($row_cnt == 0){
    echo "
      <script>
        alert('비밀번호가 일치하지 않습니다.');
        location.href = 'member_pwCheck.php';
      </script>
    ";
  } else {
    while($row = mysqli_fetch_assoc($result)) {
        $memberNo = $row['memberNo'];
    }
    echo "
      <script>
        location.href='member_modify.php';
      </script>
    ";
  }

  mysqli_close($con);

?>