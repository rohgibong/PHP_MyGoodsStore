<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyGoodsStore</title>
  <link rel="stylesheet" href="update.css">
</head>
<body>
  <?php
    session_start();
    $memberNo = isset($_SESSION["memberNo"]) ? $_SESSION["memberNo"] : 0;
    $name = isset($_SESSION["memberNo"]) ? $_SESSION["name"] : 0;
    $id = isset($_SESSION["memberNo"]) ? $_SESSION["id"] : 0;
    $eventNo = isset($_GET["eventNo"]) ? $_GET["eventNo"] : 0;
  ?>
  <script>
    const memberNo = <?php echo $memberNo ?>;
    const eventNo = <?php echo $eventNo ?>;
    if(memberNo != 1 || eventNo == 0){
      alert('잘못된 접근입니다.');
      location.href='../index.php';
    }
  </script>
  <?php
    $con = mysqli_connect("localhost", "user1", "12345", "phpfinalproject");
    $sql = "select * from storeevent where eventNo = $eventNo";
    $result = mysqli_query($con, $sql);
    $row_cnt = mysqli_num_rows($result);
    if($row_cnt != 0){
      while($row = mysqli_fetch_assoc($result)){
        $eventNo = $row['eventNo'];
        $eventMemberNo = $row['memberNo'];
        $title = $row['title'];
        $content = $row['content'];
        $hits = $row['hits'];
        $startDate = $row['startDate'];
        $endDate = $row['endDate'];
        $regiDate = $row['regiDate'];
      }
    }

    mysqli_close($con);
  ?>
  <div id="mainDiv">
    <div id="topDiv">
      <div id="topDivMent">
        <?php if($memberNo == 1 ): ?>
            <a href="../manage/productList.php" id="productListBtn">상품관리</a>
            <span id="adminMent">[관리자]</span><span id="myName"><?=$name ?>(<?=$id?>)님</span>
            <a href="../login/logoutProc.php" id="logoutBtn">LOGOUT</a>
          <?php elseif($memberNo > 1): ?>
            <span id="myName"><?=$name ?>(<?=$id?>)님</span>
            <a href="../login/logoutProc.php" id="logoutBtn" class="btnClass">LOGOUT</a>
          <?php else: ?>
            <a href="../login/login.php" id="loginBtn" class="btnClass">LOGIN</a> 
            <a href="../join/join.php" id="joinBtn" class="btnClass">JOIN</a>
        <?php endif; ?>
      </div>
    </div>

    <div id="titleDiv">
      <div id="mainTitleDiv">
        <img src="../img/MyGoodsStoreLogoBlack.png" alt="logoImg" width="180px" id="logoImg" onClick="location.href='../index.php'">
      </div>
      <div id="usercartDiv">
        <img src="../img/user.png" alt="userImg" width="35px" id="userImg" onClick="moveUserPage();">
        <img src="../img/basket.png" alt="basketImg" width="50px" id="basketImg" onClick="moveCartPage();">
      </div>
      <div id="searchDiv">
        <input type="text" name="searchInput" id="searchInput" onkeydown="if(event.keyCode==13) search()">  
        <!-- placeholder="찾고 싶은 상품을 검색해보세요!" -->
        <button type="button" id="searchBtn" onClick="search();">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 20">
            <path d="M21.71 20.29l-5.01-5.01C17.54 13.68 18 11.91 18 10c0-4.41-3.59-8-8-8S2 5.59 2 10s3.59 8 8 8c1.91 0 3.68-.46 5.28-1.3l5.01 5.01c.39.39 1.02.39 1.41 0l1.41-1.41c.38-.38.39-1.01 0-1.4zM4 10c0-3.31 2.69-6 6-6s6 2.69 6 6-2.69 6-6 6-6-2.69-6-6z"/>
          </svg>
        </button>
      </div>
    </div>

    <div id="contentDiv">
        <h2>이벤트 수정</h2>
        <hr>
        <form name="eventForm" action="updateEventProc.php" method="post">
          <input type="hidden" id="eventNo" name="eventNo" value="<?=$eventNo ?>">
          <input type="text" id="titleInput" name="titleInput" placeholder="T i t l e" value="<?=$title ?>">
          <br>
          <label for="startDate" class="dateMent">시작일 : </label>
          <input type="date" id="startDate" name="startDate" class="dateInput" value="<?=$startDate ?>">
          <label for="endDate" class="dateMent">종료일 : </label>
          <input type="date" id="endDate" name="endDate" class="dateInput" value="<?=$endDate ?>">
          <br>
          <textarea name="contentInput" id="contentInput" cols="95" rows="15"><?=$content ?></textarea>
          <br>
          <div id="btnDiv">
            <button type="button" onClick="location.href='eventDetail.php?eventNo=<?=$eventNo ?>';">취소하기</button>
            <button type="button" onClick="updateEvent();">수정하기</button>
          </div>
        </form>
        
    </div>
    

  </div>
<script src="update.js"></script>
</body>
</html>