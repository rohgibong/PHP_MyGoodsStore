<?php
    $id = $_POST["id"];
    $pwd = $_POST["pwd"];
    $previousPageUrl = $_POST["previousPageUrl"];
    $previous = $_POST["previous"];

    $con = mysqli_connect("localhost", "user1", "12345", "phpfinalproject");
    $sql = "select memberNo, name from storemember where id = '$id' and pwd = '$pwd';";

    $result = mysqli_query($con, $sql);
    $row_cnt = mysqli_num_rows($result);

    if($row_cnt == 0){
      echo "
        <script>
          alert('아이디 또는 비밀번호가 일치하지 않습니다.');
          location.href = 'login.php';
        </script>
      ";
    } else {
      while($row = mysqli_fetch_assoc($result)) {
          $memberNo = $row['memberNo'];
          $name = $row['name'];
      }
      session_start();
      $_SESSION['memberNo'] = $memberNo;
      $_SESSION['name'] = $name;
      $_SESSION['id'] = $id;
      $_SESSION['pwd'] = $pwd;
      if($previous == 'joinProc.php' || $previous == 'loginProc.php' || $previous == 'findIdProc.php' || $previous == 'changePwProc.php'){
        echo "
          <script>
            alert('$name($id)님 환영합니다.');
            location.href = '../index.php';
          </script>
        ";
      } else {
        echo "
          <script>
            alert('$name($id)님 환영합니다.');
            location.href = '$previousPageUrl';
          </script>
        ";
      }
    }

    mysqli_close($con);

  ?>