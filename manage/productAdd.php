<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyGoodsStore</title>
  <link rel="stylesheet" href="productAdd.css">
</head>
<body>
  <?php
    session_start();
    $memberNo = isset($_SESSION["memberNo"]) ? $_SESSION["memberNo"] : 0;
  ?>
  <script>
    const memberNo = <?php echo $memberNo ?>;
    if(memberNo != 1){
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

  <form name="productAddForm" action="productAddProc.php" method="post" enctype="multipart/form-data">
    <div id="contentDiv">
      <div id="titleMentDiv">
        <span id="titleMent">상품 등록</span>
      </div>
      
      <table id="addTable">
        <tr>
          <td class="titleTd">
            상품명
          </td>
          <td class="contentTd">
            <input type="text" name="productName" id="productName" placeholder="간략한 상품명"><br>
            <input type="text" name="detailName" id="detailName" placeholder="상세한 상품명">
          </td>
        </tr>
        <tr>
          <td class="titleTd">
            상품가격
          </td>
          <td class="contentTd">
            <input type="text" name="productPrice" id="productPrice" maxlength="6" placeholder="0" oninput="this.value = this.value.replace(/\D/g, '');"> 원
          </td>
        </tr>
        <tr>
          <td class="titleTd">
            아티스트명
          </td>
          <td class="contentTd">
            <input type="text" name="artistName" id="artistName" placeholder="15글자 이내" maxlength="15">
          </td>
        </tr>
        <tr>
          <td class="titleTd">
            수량
          </td>
          <td class="contentTd">
            <input type="text" name="stock" id="stock" maxlength="5" placeholder="0" oninput="this.value = this.value.replace(/\D/g, '');"> 개
          </td>
        </tr>
        <tr>
          <td class="titleTd">
            카테고리
          </td>
          <td class="contentTd">
            <select name="cateCode" id="cateCode">
              <option value="1">MUSIC</option>
              <option value="2">PHOTO</option>
              <option value="3">FASHION</option>
              <option value="4">CONCERT</option>
            </select>
          </td>
        </tr>
        <tr>
          <td class="titleTd">
            배송기간
          </td>
          <td class="contentTd">
            <input type="text" name="delPeriod" id="delPeriod" maxlength="2" placeholder="0" oninput="this.value = this.value.replace(/\D/g, '');"> 일
          </td>
        </tr>
        <tr>
          <td class="titleTd">
            배송비
          </td>
          <td class="contentTd">
            <input type="text" name="delPrice" id="delPrice" maxlength="5"  placeholder="0" oninput="this.value = this.value.replace(/\D/g, '');"> 원
          </td>
        </tr>
        <tr>
          <td class="titleTd">
            상품 이미지
          </td>
          <td class="contentTd">
            <span id="mentId">배너 이미지 :</span> <input type="file" name="titleImg" id="titleImg"><br>
            <span id="mentId">메인 이미지 :</span> <input type="file" name="mainImg" id="mainImg"><br>
            <span id="mentId">설명 이미지 :</span> <input type="file" name="contentImg" id="contentImg">
          </td>
        </tr>
        <tr>
          <td class="titleTd" id="lastTd">
            품절여부
          </td>
          <td class="contentTd" id="lastTd">
            <select name="soldOut" id="soldOut">
              <option value="O">O</option>
              <option value="X" selected>X</option>
            </select>
          </td>
        </tr>
      </table>
      
        
      <div id="btnDiv">
        <button type="button" onClick="add();" id="addBtn">등록</button>
        
        <button type="button" onClick="location.href='productList.php'" id="cancelBtn">취소</button>
      </div>
    </div>
  </form>


</div>
<script src="productAdd.js"></script>
</body>
</html>