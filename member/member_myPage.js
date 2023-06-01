function moveUserPage(){
  if(memberNo > 0){
    location.href='../member/member_myPage.php';
  } else {
    location.href='../login/login.php';
  }
}

function momveCartPage(){
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