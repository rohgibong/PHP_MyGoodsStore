let subTitle1 = document.getElementById("subTitle1");
let subTitle2 = document.getElementById("subTitle2");
let subTitle3 = document.getElementById("subTitle3");
let subTitle4 = document.getElementById("subTitle4");

if(cateCode == 1){
  subTitle1.className = "changeTitle";
} else if(cateCode == 2){
  subTitle2.className = "changeTitle";
} else if(cateCode == 3){
  subTitle3.className = "changeTitle";
} else if(cateCode == 4){
  subTitle4.className = "changeTitle";
}

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