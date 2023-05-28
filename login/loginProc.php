<?php
    $id = $_POST["id"];
    $pwd = $_POST["pwd"];
    $previousPageUrl = $_POST["previousPageUrl"];
    $previous = $_POST["previous"];
    $num = 0;
    $regidate = date("Y-m-d H:i:s");

    $con = mysqli_connect("localhost", "user1", "12345", "phpfinalproject");
    $sql = "select memberNo, name from storemember where id = '$id' and pwd = '$pwd'";

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
      $sql = "select * from storecart where memberNo = 0";
      $cartResult = mysqli_query($con, $sql);
      $row_cnt = mysqli_num_rows($cartResult);
      if($row_cnt != 0){
        while($cartRow = mysqli_fetch_assoc($cartResult)) {
          $productCode = $cartRow['productCode'];
          $amount = $cartRow['amount'];
          
          $sql = "select * from storecart where memberNo = $memberNo and productCode = $productCode";
          $cartItemResult = mysqli_query($con, $sql);
          $row_cnt = mysqli_num_rows($cartItemResult);
          if($row_cnt != 0){
            while($row = mysqli_fetch_assoc($cartItemResult)) {
              $cartAmount = $row['amount'];
            }
            $totalAmount = $amount + $cartAmount;
            if($totalAmount > 10){
              $totalAmount = 10;
            }
            $sql = "update storecart set amount = $totalAmount where memberNo = $memberNo and productCode = $productCode";
            mysqli_query($con, $sql);

            $sql = "delete from storecart where memberNo = 0 and productCode = $productCode";
            mysqli_query($con, $sql);
          } else {
            $sql = "insert into storecart (memberNo, productCode, amount, regidate) values ($memberNo, $productCode, $amount, '$regidate')";
            mysqli_query($con, $sql);
            $sql = "delete from storecart where memberNo = 0 and productCode = $productCode";
            mysqli_query($con, $sql);
          }
        }
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