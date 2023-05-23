<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyGoodsStore</title>
  <link rel="stylesheet" href="findPw.css">
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

  <form name="findForm" action="findPwProc.php" method="post">
    <div id="findDiv">

      <h1>Find ID/PW</h1>

      <div id="selectDiv">
        <div id="selectId" onClick="location.href='findId.php'">
          <span id="findIdMent">
            아이디 찾기
          </span>
        </div>
        <div id="selectPw" onClick="location.href='findPw.php'">
          <span id="findPwMent">
            비밀번호 찾기
          </span>
        </div>
      </div>

      <div id="contentDiv">
        <div id="contentNameDiv">
          <span class="subTitleId">아이디</span><br><br><br>
          <span class="subTitleId">이름</span><br><br><br>
          <span class="subTitleId">휴대폰</span>
        </div>

        <div id="contentInDiv">

          <div id="content1">
            <input type="text" name="id" id="id" minlength="4" maxlength="16"><br>
            <label id="label_id"></label>
          </div>
          <div id="content2">
            <input type="text" name="name" id="name" maxlength="5"><br>
            <label id="label_name"></label>
          </div>
          <div id="content3">
            <input type="text" name="phone1" id="phone1" maxlength="3" oninput="this.value = this.value.replace(/\D/g, '');"> &nbsp;&nbsp;-&nbsp;&nbsp;
              <input type="text" name="phone2" id="phone2" maxlength="4" oninput="this.value = this.value.replace(/\D/g, '');"> &nbsp;&nbsp;-&nbsp;&nbsp;
              <input type="text" name="phone3" id="phone3" maxlength="4" oninput="this.value = this.value.replace(/\D/g, '');" onkeydown="if(event.keyCode==13) findPw()"><br>
              <label id="label_phone"></label>
          </div>
        </div>
      </div>

      <div id="btnDiv">
        <button type="button" onClick="findPw();" id="findbtn">확인</button>
      </div>

      
    </div>
  </form>

</div>
<script src="findPw.js"></script>
</body>
</html>