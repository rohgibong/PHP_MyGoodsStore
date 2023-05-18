<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyGoodsStore</title>
  <link rel="stylesheet" href="join.css">
  <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<body>
  <?php
    session_start();
    $memberNo = isset($_SESSION["memberNo"]) ? $_SESSION["memberNo"] : 0;
  ?>
  <script>
    const memberNo = <?php echo $memberNo ?>;
    if(memberNo > 0){
      alert('이미 로그인 된 상태입니다.');
      location.href='../index.php';
    }
  </script>
  <div id="mainDiv">

    <div id="titleDiv">
      <div id="mainTitleDiv">
        <img src="../img/MyGoodsStoreLogoBlack.png" alt="logoImg" width="180px" id="logoImg" onClick="location.href='../index.php'">
      </div>
    </div>

    <form name="joinForm" action="joinProc.php" method="post">
      <div id="joinDiv">

        <h1>Join Us</h1>

        <hr id="contentHr">

        <div id="subTitleDiv">
          <div id="subTitleWrapper">
            <span class="subTitle">이름</span><br>
            <span class="subTitle">생년월일</span><br>
            <span class="subTitle">성별</span><br>
            <span class="subTitle">휴대폰</span><br>
            <span class="subTitle">아이디</span><br>
            <span class="subTitle">비밀번호</span><br>
            <span class="subTitle">비밀번호 확인</span><br>
            <span class="subTitle">주소</span><br>
            <div id="emailTitle">
              <span class="subTitle">이메일</span>
            </div><br>
          </div>
        </div>
        <div id="contentDiv">
          <input type="text" name="name" id="name"><br>
          <label id="label_name"></label>
          <input type="text" name="birthYear" id="birthYear" maxlength="4" placeholder="0000"> 년
          <input type="text" name="birthMonth" id="birthMonth" maxlength="2" placeholder="00"> 월
          <input type="text" name="birthDay" id="birthDay" maxlength="2" placeholder="00"> 일 <br>
          <label id="label_birth"></label>
          <input type="radio" name="gender" id="genderMan" value="남" checked> <label for="genderMan">남자</label> &nbsp;&nbsp;
          <input type="radio" name="gender" id="genderWoman" value="여"> <label for="genderWoman">여자</label><br>
          <input type="text" name="phone1" id="phone1" maxlength="3" placeholder="000"> &nbsp;&nbsp;-&nbsp;&nbsp;
          <input type="text" name="phone2" id="phone2" maxlength="4" placeholder="0000"> &nbsp;&nbsp;-&nbsp;&nbsp;
          <input type="text" name="phone3" id="phone3" maxlength="4" placeholder="0000"><br>
          <label id="label_phone"></label>
          <input type="text" name="id" id="id" minlength="4" maxlength="16" placeholder="아이디는 4~16글자로 입력해주세요.">
          <input type="button" onClick="idCheck();" value="아이디 중복체크" id="searchIdBtn"><br>
          <label id="label_id"></label>
          <input type="hidden" name="tempId" id="tempId" value="">
          <input type="password" name="pwd" id="pwd" minlength="6" maxlength="16" placeholder="비밀번호는 6~16글자로 입력해주세요."><br>
          <label id="label_pwd"></label>
          <input type="password" name="pwdChk" id="pwdChk" minlength="6" maxlength="16"><br>
          <label id="label_pwdChk"></label>
          <input type="text" id="sample6_postcode" placeholder="우편번호" name="address1" readonly>
			    <input type="button" onClick="sample6_execDaumPostcode();" value="주소찾기" id="searchAddBtn"><br>
          <input type="text" id="sample6_address" placeholder="주소" name="address2" readonly><br>
          <input type="text" id="sample6_detailAddress" placeholder="상세주소" name="address3">
          <input type="text" id="sample6_extraAddress" placeholder="참고항목" name="address4" readonly><br>
          <label id="label_address"></label>
          <input type="text" name="email1" id="email1" placeholder="example">@
          <input type="text" name="email2" id="email2" placeholder="xxx.com"><br>
          <label id="label_email"></label>
        </div>
        <button type="button" onClick="join();" id="joinBtn">JOIN</button>
        <button type="button" onClick="goBack();" id="cancelBtn">CANCEL</button>
      </div>


      <pre>



      <h1>이 페이지 추가할 항목</h1>

                            [에러잡기]
                            아이디 특수기호 못넣게 예외처리하기
                            아이디비번 자릿수 제한하기
                            비밀번호 한글 입력 되는지안되는지 확인해보기
                            address4(나머지주소)는 null이 될수있음!
                            email2 . 스플릿 기준으로 오른쪽이 com, net 등등이 아니면 이메일 똑디 입력하라고 멘트
                            <!-- [위에거 다 하고..]
                            생년월일도 다 select로 만들어버릴가보다..
                            이메일 select창 시간나면 만들거고 아니면 버릴거 -->

                            이정도 하면 이 페이지는 졸업아닐까?
      </pre>
    </form>

  </div>
<script src="join_.js"></script>
<script src="join_Address.js"></script>
<script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
</body>
</html>