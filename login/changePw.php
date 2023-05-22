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

  <form name="changeForm" action="changePwProc.php" method="post">
    <div id="changeDiv">

      <h1>Change PW</h1>
      
      <div id="contentDiv">
      <span>
        비밀번호를 변경해주세요
      </span>





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