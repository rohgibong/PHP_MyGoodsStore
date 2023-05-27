<?php
  $name = $_POST["name"];
  $phone1 = $_POST["phone1"];
  $phone2 = $_POST["phone2"];
  $phone3 = $_POST["phone3"];

  $con = mysqli_connect("localhost", "user1", "12345", "phpfinalproject");

  $sql = "select id from storemember where name = '$name' and phone1 = '$phone1' and phone2 = '$phone2' and phone3 = '$phone3'";

  $result = mysqli_query($con, $sql);
  $row_cnt = mysqli_num_rows($result);
  
  if($row_cnt == 0){
    echo "
      <script>
        alert('일치하는 회원정보가 없습니다.');
        location.href = 'findId.php';
      </script>
    ";
  } else {
    while($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
    }
    echo "
      <script>
        alert('회원님의 아이디는 [$id]입니다.');
        location.href = 'login.php';
      </script>
    ";
  }
  mysqli_close($con);

?>