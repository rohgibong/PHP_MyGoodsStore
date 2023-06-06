let titleInput = document.eventForm.titleInput;
let contentInput = document.eventForm.contentInput;
let startDate = document.eventForm.startDate;
let endDate = document.eventForm.endDate;

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

function updateEvent(){
  if(titleInput.value == ""){
    alert("제목을 입력해주세요!");
    titleInput.focus();
    return;
  }
  if(startDate.value == ""){
    alert("시작일을 입력해주세요!");
    return;
  }
  if(endDate.value == ""){
    alert("종료일을 입력해주세요!");
    return;
  }
  if(contentInput.value == ""){
    alert("내용을 입력해주세요!");
    contentInput.focus();
    return;
  }
  if(confirm("수정 하시겠습니까?")){
    document.eventForm.submit();
  }
}