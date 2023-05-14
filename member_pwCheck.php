<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyGoodsStore</title>
  <link rel="stylesheet" href="member_pwCheck.css">
</head>
<body>
  <?php
    session_start();
    $memberNo = isset($_SESSION["memberNo"]) ? $_SESSION["memberNo"] : 0;
    $name = isset($_SESSION["memberNo"]) ? $_SESSION["name"] : 0;
    $id = isset($_SESSION["memberNo"]) ? $_SESSION["id"] : 0;
  ?>
  <script>
    const memberNo = <?php echo $memberNo ?>;
    if(memberNo <= 0){
      alert('잘못된 접근입니다.');
      location.href='index.php';
    }
  </script>

<div id="mainDiv">
  <div id="topDiv"></div>
  <div id="titleDiv">
    <div id="mainTitleDiv">
      <img src="./img/MyGoodsStoreLogoBlack.png" alt="logoImg" width="180px" id="logoImg" onClick="location.href='index.php'">
    </div>
    <div id="searchDiv">
      <input type="text" name="searchInput" id="searchInput">  
      <!-- placeholder="찾고 싶은 상품을 검색해보세요!" -->
      <button type="button" id="searchBtn" onClick="search();">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 20">
          <path d="M21.71 20.29l-5.01-5.01C17.54 13.68 18 11.91 18 10c0-4.41-3.59-8-8-8S2 5.59 2 10s3.59 8 8 8c1.91 0 3.68-.46 5.28-1.3l5.01 5.01c.39.39 1.02.39 1.41 0l1.41-1.41c.38-.38.39-1.01 0-1.4zM4 10c0-3.31 2.69-6 6-6s6 2.69 6 6-2.69 6-6 6-6-2.69-6-6z"/>
        </svg>
      </button>
    </div>
  </div>

  <div id="contentDiv">
    <h1>회원정보 확인</h1>

    <div id="subTitleDiv">
      <span id="subTitleSpan"><?=$name ?>(<?=$id ?>)</span>님의 정보를 안전하게 보호하기 위해 비밀번호를 다시 한번 확인합니다.
    </div>

    <div id="mentDiv">
      <span id="idTitle">ID</span><br><br>
      <span id="pwdTitle">PASSWORD</span>
    </div>

    <div id="inputDiv">
      <input type="text" name="id" id="id" value="<?=$id ?>" readonly><br>
      <input type="password" name="pwd" id="pwd"><br>
    </div>
    <label id="label_pwd"></label>

    <div id="btnDiv">
      <button type="button">확인</button>
    </div>

  </div>


</div>
  
</body>
</html>