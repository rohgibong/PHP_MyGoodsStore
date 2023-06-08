<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyGoodsStore</title>
  <link rel="stylesheet" href="changePw.css">
</head>
<body>
  <?php
    session_start();
    $memberCode = isset($_SESSION["memberNo"]) ? $_SESSION["memberNo"] : 0;
    $memberNo = isset($_GET["memberNo"]) ? $_GET["memberNo"] : 0;
  ?>
  <script>
    const memberCode = <?php echo $memberCode ?>;
    const memberNo = <?php echo $memberNo ?>;
    if(memberCode > 0){
      alert('이미 로그인 된 상태입니다.');
      location.href='../index.php';
    }
    if(memberNo <= 0){
      alert('잘못된 접근입니다.');
      location.href='../index.php';
    }
  </script>

<div id="mainDiv">

  <div id="titleDiv">
    <div id="mainTitleDiv">
      <img src="../img/MyGoodsStoreLogoBlack.png" alt="logoImg" width="180px" id="logoImg" onClick="location.href='../index.php'">
    </div>
  </div>

  <form name="changeForm" action="changePwProc.php" method="post">
    <input type="hidden" name="memberNo" id="memberNo" value="<?=$memberNo?>">
    <div id="changeDiv">

      <h1>Change PW</h1>
      
      <div id="contentDiv">

        <div id="contentNameDiv">
          <span class="subTitleId">비밀번호</span><br><br><br>
          <span class="subTitleId">비밀번호 확인</span>
        </div>

        <div id="contentInDiv">
          <div id="content1">
            <input type="password" name="pwd" id="pwd" minlength="6" maxlength="16" placeholder="비밀번호는 6~16글자로 입력해주세요."><br>
            <label id="label_pwd"></label>
          </div>
          <div id="content2">
            <input type="password" name="pwdChk" id="pwdChk" minlength="6" maxlength="16" onkeydown="if(event.keyCode==13) changePw()"><br>
              <label id="label_pwdChk"></label>
          </div>
        </div>

      </div>

      <div id="btnDiv">
        <button type="button" onClick="changePw();" id="changeBtn">확인</button>
      </div>
      
    </div>
  </form>

</div>
<script src="changePw.js"></script>
</body>
</html>