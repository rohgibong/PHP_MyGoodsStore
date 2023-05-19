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
  ?>
  <script>
    const memberNo = <?php echo $memberNo ?>;
    if(memberNo <= 0){
      alert('잘못된 접근입니다.');
      location.href='../index.php';
    }
  </script>
  <?php
    $con = mysqli_connect("localhost", "user1", "12345", "phpfinalproject");
    $sql = "select * from storemember where memberNo = '$memberNo';";
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
    mysqli_close($con);
  ?>

<div id="mainDiv">
  <div id="titleDiv">
    <div id="mainTitleDiv">
      <img src="../img/MyGoodsStoreLogoBlack.png" alt="logoImg" width="180px" id="logoImg" onClick="location.href='../index.php'">
    </div>
  </div>

  <form name="modifyForm" action="member_modifyProc.php" method="post">
    <div id="contentDiv">
      <div id="titleMentDiv">
        <span id="titleMent">회원 정보 수정</span>
      </div>
      <input type="hidden" value="<?=$memberNo ?>" name="memberNo">
      
      <table id="modifyTable">
        <tr>
          <td class="titleTd">아이디</td>
          <td class="contentTd">
            <input type="text" value="<?=$id ?>" name="id" id="id" readonly>
          </td>
        </tr>
        <tr>
          <td class="titleTd">비밀번호</td>
          <td class="contentTd">
            <input type="password" name="pwd" id="pwd" minlength="6" maxlength="16" placeholder="비밀번호는 6~16글자로 입력해주세요.">
            <label id="label_pwd"></label>
          </td>
        </tr>
        <tr>
          <td class="titleTd">비밀번호확인</td>
          <td class="contentTd">
            <input type="password" name="pwdChk" id="pwdChk" minlength="6" maxlength="16" onkeydown="if(event.keyCode==13) modify()">
            <label id="label_pwdChk"></label>
          </td>
        </tr>
        <tr>
          <td class="titleTd">이름</td>
          <td class="contentTd">
            <input type="text" value="<?=$name ?>" name="name" id="name" readonly>
          </td>
        </tr>
        <tr>
          <td class="titleTd">생년월일</td>
          <td class="contentTd">
            <input type="text" value="<?=$birth1 ?>" name="birth1" id="birth1" maxlength="4" placeholder="0000"> 년
            <input type="text" value="<?=$birth2 ?>" name="birth2" id="birth2" maxlength="2" placeholder="00"> 월
            <input type="text" value="<?=$birth3 ?>" name="birth3" id="birth3" maxlength="2" placeholder="00"> 일
            <label id="label_birth"></label>
          </td>
        </tr>
        <tr>
          <td class="titleTd">성별</td>
          <td class="contentTd">
            <?php if($gender == '남'): ?>
              <input type="radio" id="genderMan" value="남" checked disabled> 남자
              <input type="radio" id="genderWoman" value="여" disabled> 여자
              <?php else: ?>
                <input type="radio" id="genderMan" value="남" disabled> 남자
                <input type="radio" id="genderWoman" value="여" checked disabled> 여자
                <?php endif; ?>
            <input type="hidden" name="gender" value="<?=$gender ?>" readonly>
          </td>
        </tr>
        <tr>
          <td class="titleTd">휴대폰</td>
          <td class="contentTd">
            <input type="text" value="<?=$phone1 ?>" name="phone1" id="phone1" maxlength="3" placeholder="000"> -
            <input type="text" value="<?=$phone2 ?>" name="phone2" id="phone2" maxlength="4" placeholder="0000"> -
            <input type="text" value="<?=$phone3 ?>" name="phone3" id="phone3" maxlength="4" placeholder="0000">
            <label id="label_phone"></label>
          </td>
        </tr>
        <tr>
          <td class="titleTd">주소</td>
          <td class="contentTd">
            <input type="text" id="sample6_postcode" placeholder="우편번호" name="address1" value="<?=$address1 ?>" readonly>
            <input type="button" onClick="sample6_execDaumPostcode();" value="주소찾기" id="searchAddBtn"><br>
            <input type="text" id="sample6_address" placeholder="주소" name="address2" value="<?=$address2 ?>" readonly><br>
            <input type="text" id="sample6_detailAddress" placeholder="상세주소" name="address3" value="<?=$address3 ?>">
            <input type="text" id="sample6_extraAddress" placeholder="참고항목" name="address4" value="<?=$address4 ?>" readonly>
            <label id="label_address"></label>
          </td>
        </tr>
        <tr>
          <td class="titleTd" id="lastTd">이메일</td>
          <td class="contentTd" id="lastTd">
            <input type="text" value="<?=$email1 ?>" name="email1" id="email1"> @
            <input type="text" value="<?=$email2 ?>" name="email2" id="email2" placeholder="xxx.com">
            <label id="label_email"></label>
          </td>
        </tr>
      </table>
      

        
        <div id="btnDiv">
         <button type="button" onClick="modify();" id="modifyBtn">확인</button>
          
          <button type="button" onClick="location.href='../index.php';" id="cancelBtn">취소</button>
        </div>
        <span id="deleteMemberBtn" onClick="deleteMember();">회원탈퇴</span>
    </div>
  </form>

  <form name="deleteForm" action="member_deleteProc.php" method="post">
    <input type="hidden" value="<?=$memberNo ?>" name="memberNo">
  </form>


</div>
<script src="member_modify.js"></script>
<script src="../join/join_Address.js"></script>
<script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
</body>
</html>