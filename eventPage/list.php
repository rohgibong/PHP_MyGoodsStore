<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyGoodsStore</title>
  <link rel="stylesheet" href="list.css">
</head>
<body>
  <?php
    session_start();
    $memberNo = isset($_SESSION["memberNo"]) ? $_SESSION["memberNo"] : 0;
    $name = isset($_SESSION["memberNo"]) ? $_SESSION["name"] : 0;
    $id = isset($_SESSION["memberNo"]) ? $_SESSION["id"] : 0;
    $pageNumber = isset($_GET["pageNumber"]) ? $_GET["pageNumber"] : 1;
  ?>
  <script>
    const memberNo = <?php echo $memberNo ?>;
  </script>
  <?php
    $pageSet = 5;
    $startNum = ($pageSet * ($pageNumber-1) + 1);
    $endNum = $pageSet * $pageNumber;
    $con = mysqli_connect("localhost", "user1", "12345", "phpfinalproject");
    $sql = "select * from (select row_number() over(order by regiDate desc) as rowNum, e.* from storeevent e) as subquery where rowNum >= $startNum and rowNum <= $endNum;";
    $result = mysqli_query($con, $sql);
    $row_cnt = mysqli_num_rows($result);
    $count = 0;
    $num = 0;
    if($row_cnt != 0){
      while($row = mysqli_fetch_assoc($result)){
        $content[$num]['eventNo'] = $row['eventNo'];
        $content[$num]['memberNo'] = $row['memberNo'];
        $content[$num]['title'] = $row['title'];
        $content[$num]['content'] = $row['content'];
        $content[$num]['hits'] = $row['hits'];
        $content[$num]['startDate'] = $row['startDate'];
        $content[$num]['endDate'] = $row['endDate'];
        $content[$num]['regiDate'] = $row['regiDate'];
        $num++;
      }
    }
    $sql = "select count(*) from storeevent;";
    $result2 = mysqli_query($con, $sql);
    $eventCount = mysqli_fetch_array($result2)[0];
    if($eventCount == 0){
      $pageCount = 1;
    } else {
      $pageCount = floor(($eventCount-1) / $pageSet) + 1;
    }

    if($pageNumber < 1 || $pageNumber > $pageCount){
      echo '<script>alert("잘못된 접근입니다.");location.href="../index.php";</script>';
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

      <div id="sideDiv">
        <div class="subTitle" onClick="location.href='../product/list.php?cateCode=1'">
            MUSIC
        </div>
        <div class="subTitle" onClick="location.href='../product/list.php?cateCode=2'">
            PHOTO
        </div>
        <div class="subTitle" onClick="location.href='../product/list.php?cateCode=3'">
            FASHION
        </div>
        <div class="subTitle" onClick="location.href='../product/list.php?cateCode=4'">
            CONCERT
        </div>
        <!-- <div class="subTitle" onClick="location.href='../funding/list.php'">
            FUNDING
        </div> -->
        <div class="changeTitle" onClick="location.href='list.php'">
            EVENT
        </div>
      </div>

      <div id="eventDiv">
        <span id="eventTableMent">진행중인 이벤트</span>
        <div id="eventPlace">
          <table id="eventTable" border="0">
          <?php if($num == 0): ?>
            <tr>
              <td id="emtpyTd">
                진행중인 이벤트가 없습니다.
              </td>
            </tr>
          <?php else : ?>
            <tr>
              <th>No</th>
              <th>Title</th>
              <th>이벤트 기간</th>
            </tr>
          <?php while($count < $num): ?>
            <tr>
              <td class="tdClass" id="NoId"><?=$count+1 ?></td>
              <td class="tdClass" id="titleId">
                <span id="titleSpan" onClick="location.href='eventDetail.php?eventNo=<?=$content[$count]['eventNo'] ?>'">
                  <?=$content[$count]['title'] ?>
                </span>
              </td>
              <td class="tdClass" id="dateId"><?=$content[$count]['startDate'] ?> ~ <?=$content[$count]['endDate'] ?></td>
            </tr>
            <?php
              $count++;
              endwhile;
            ?>
          <?php endif; ?>
          </table>
        </div>

        <div id="writeDiv">
          <?php if ($memberNo == 1) : ?>
          <button onClick="location.href='addEvent.php'">등록하기</button>
          <?php endif; ?>
        </div>
        <div id="pageDiv">
          <?php if($pageNumber > 1) : ?>
            <span class="arrowBtn" onClick="location.href='list.php?pageNumber=<?=$pageNumber-1 ?>'">< 이전</span>
          <?php else : ?>
            <span class="arrowBtn" id="noName">< 이전</span>
          <?php endif ; ?>
          
          <?php for($page = 1; $page < $pageCount+1; $page++) : ?>
            <span id="pageSpan" onClick="location.href='list.php?pageNumber=<?=$page ?>'">
              <?=$page ?>
            </span>
          <?php endfor; ?>
          
          <?php if($pageNumber < $pageCount) : ?>
            <span class="arrowBtn" onClick="location.href='list.php?pageNumber=<?=$pageNumber+1 ?>'">다음 ></span>
          <?php else : ?>
            <span class="arrowBtn" id="noName">다음 ></span>
          <?php endif ; ?>
        </div>
      </div>
    </div>

  </div>
<script src="list.js"></script>
</body>
</html>