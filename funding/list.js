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
