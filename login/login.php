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
          <input type="text" name="id" id="id"><br>
          <input type="password" name="pwd" id="pwd"><br>
        </div>
        <label id="label_id"></label>
        <label id="label_pwd"></label>

        <div id="btnDiv">
          <button type="button" onClick="login();" id="loginBtn">LOGIN</button>
          <button type="button" onClick="location.href='../join/join.php'" id="joinBtn">JOIN US</button>
        </div>
      </div>
    </form>
    <script src="login.js"></script>

  </div>
</body>
</html>