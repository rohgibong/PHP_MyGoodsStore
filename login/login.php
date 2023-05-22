<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyGoodsStore</title>
  <link rel="stylesheet" href="login.css">
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

    <form name="loginForm" action="loginProc.php" method="post">
      <div id="loginDiv">

        <h1>Login</h1>

        <div id="mentDiv">
          <span id="idTitle">ID</span><br><br>
          <span id="pwdTitle">PASSWORD</span>
        </div>

        <div id="inputDiv">
          <input type="text" name="id" id="id" onkeydown="if(event.keyCode==13) login()"><br>
          <input type="password" name="pwd" id="pwd" onkeydown="if(event.keyCode==13) login()"><br>
        </div>
        <label id="label_id"></label>
        <label id="label_pwd"></label>

        <div id="findDiv">
          <a href="findId.php" id="fintIdPw">
            아이디/비밀번호 찾기
          </a>
        </div>

        <div id="btnDiv">
          <button type="button" onClick="login();" id="loginBtn" >LOGIN</button>
          <button type="button" onClick="location.href='../join/join.php'" id="joinBtn">JOIN US</button>
        </div>
      </div>
    </form>
    
  </div>
  <script src="login.js"></script>
</body>
</html>