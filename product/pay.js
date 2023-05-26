function moveUserPage(){
  if(memberNo > 0){
    location.href='../member/member_pwCheck.php';
  } else {
    location.href='../login/login.php';
  }
}

function momveCartPage(){
  alert("카트");
}
