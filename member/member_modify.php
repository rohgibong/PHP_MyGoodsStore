<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyGoodsStore</title>
  <link rel="stylesheet" href="member_modify.css">
</head>
<body>
  <?php
    session_start();
    $memberNo = isset($_SESSION["memberNo"]) ? $_SESSION["memberNo"] : 0;
    $myNo =isset($_GET["memberNo"]) ? $_GET["memberNo"] : 0;
  ?>
  <script>
    const memberNo = <?php echo $memberNo ?>;
    const myNo = <?php echo $myNo ?>;
    if(myNo <= 0 || (memberNo != myNo)){
      alert('잘못된 접근입니다.');
      location.href='../index.php';
    }
  </script>
  <?php
    $con = mysqli_connect("localhost", "user1", "12345", "phpfinalproject");
    $sql = "select * from storemember where memberNo = '$myNo';";
    $result = mysqli_query($con, $sql);
    $row_cnt = mysqli_num_rows($result);
    while($row = mysqli_fetch_assoc($result)){
      $name = $row['name'];
      $birth1 = $row['birth1'];
      $birth2 = $row['birth2'];
      $birth3 = $row['birth3'];
      $gender = $row['gender'];
      $phone1 = $row['phone1'];
      $phone2 = $row['phone2'];
      $phone3 = $row['phone3'];
      $id = $row['id'];
      $pwd = $row['pwd'];
      $address1 = $row['address1'];
      $address2 = $row['address2'];
      $address3 = $row['address3'];
      $address4 = $row['address4'];
      $email1 = $row['email1'];
      $email2 = $row['email2'];
    }
    // echo "이름 : ".$name."<br>";
    // echo "년 : ".$birth1."<br>";
    // echo "월 : ".$birth2."<br>";
    // echo "일 : ".$birth3."<br>";
    // echo "성별 : ".$gender."<br>";
    // echo "폰1 : ".$phone1."<br>";
    // echo "폰2 : ".$phone2."<br>";
    // echo "폰3 : ".$phone3."<br>";
    // echo "아이디 : ".$id."<br>";
    // echo "비번 : ".$pwd."<br>";
    // echo "주소1 : ".$address1."<br>";
    // echo "주소2 : ".$address2."<br>";
    // echo "주소3: ".$address3."<br>";
    // echo "주소4 : ".$address4."<br>";
    // echo "이멜1 : ".$email1."<br>";
    // echo "이멜2 : ".$email2."<br>";
  ?>

<div id="mainDiv">
  <div id="titleDiv">
    <div id="mainTitleDiv">
      <img src="../img/MyGoodsStoreLogoBlack.png" alt="logoImg" width="180px" id="logoImg" onClick="location.href='../index.php'">
    </div>
  </div>

  <form name="checkForm" action="member_pwCheckProc.php" method="post">
    <div id="contentDiv">
      <div id="titleMentDiv">
        <span id="titleMent">회원 정보 수정</span>
      </div>

      <!-- <div id="subTitleDiv">
        
      </div>
      
      <div id="modifyDiv">
        
      </div> -->

      <table border="1" id="modifyTable">
        <tr>
          <td>아이디</td>
          <td>
            <input type="text" value="<?=$id ?>">
          </td>
        </tr>
        <tr>
          <td>비밀번호</td>
          <td>
            <input type="password">
          </td>
        </tr>
        <tr>
          <td>비밀번호확인</td>
          <td>
            <input type="password">
          </td>
        </tr>
        <tr>
          <td>이름</td>
          <td>
            <input type="text" value="<?=$name ?>" readonly>
          </td>
        </tr>
        <tr>
          <td>생년월일</td>
          <td>
            <input type="text" value="<?=$birth1 ?>">
            <input type="text" value="<?=$birth2 ?>">
            <input type="text" value="<?=$birth3 ?>">
          </td>
        </tr>
        <tr>
          <td>성별</td>
          <td>
            <input type="radio" name="gender" id="genderMan" value="남"> 남자
            <input type="radio" name="gender" id="genderWoman" value="여"> 여자
          </td>
        </tr>
        <tr>
          <td>휴대폰</td>
          <td>

          </td>
        </tr>
        <tr>
          <td>주소</td>
          <td>
            <input type="text" id="sample6_postcode" placeholder="우편번호" name="address1" value="<?=$address1 ?>" readonly>
            <input type="button" onClick="sample6_execDaumPostcode();" value="주소찾기" id="searchAddBtn"><br>
            <input type="text" id="sample6_address" placeholder="주소" name="address2" value="<?=$address2 ?>" readonly><br>
            <input type="text" id="sample6_detailAddress" placeholder="상세주소" name="address3" value="<?=$address3 ?>">
            <input type="text" id="sample6_extraAddress" placeholder="참고항목" name="address4" value="<?=$address4 ?>" readonly>
          </td>
        </tr>
        <tr>
          <td>이메일</td>
          <td>
            <input type="text" value="<?=$email1 ?>"> @
            <input type="text" value="<?=$email2 ?>">
          </td>
        </tr>
      </table>
      

        
        <div id="btnDiv">
          <!-- <button type="button" onClick="check();" id="checkBtn">확인</button>
          <button type="button" onClick="location.href='../index.php';" id="cancelBtn">취소</button> -->
        </div>
    </div>
  </form>


</div>
</body>
</html>