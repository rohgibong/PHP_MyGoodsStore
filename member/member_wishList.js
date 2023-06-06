function moveUserPage(){
  if(memberNo > 0){
    location.href='../member/member_myPage.php';
  } else {
    location.href='../login/login.php';
  }
}

function moveCartPage(){
  location.href='../cartPage/list.php';
}

function search(){
  let searchValue = document.getElementById("searchInput").value;
  if(searchValue == ""){
    alert("검색어를 입력해주세요.");
  } else {
    location.href="../product/list.php?searchValue="+searchValue;
  }
}

function deleteAll(){
  if(confirm("전체 상품을 삭제하시겠습니까?")){
    location.href="member_wishRemoveAllProc.php?memberNo=" + memberNo;
  }
}

function deleteOne(productCode){
  let param;
  if(confirm("선택하신 상품을 삭제하시겠습니까?")){
    param = "productCode=" + productCode + "&memberNo=" + memberNo;
  } else {
    param = "productCode=" + 0 + "&memberNo=" + memberNo;
  }
  removeProc(param);
}

function removeProc(param){
  $.ajax({
    type: "post",
    data: param,
    url: "member_wishRemoveProc.php",
    success: function(){
      location.reload();
    }
  });
}