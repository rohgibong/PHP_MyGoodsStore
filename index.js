function search(){
  alert("검색");
}

function moveUserPage(){
  if(memberNo > 0){
    location.href='member_pwCheck.php';
  } else {
    location.href='login.php';
  }
}

function momveCartPage(){
  alert("카트");
}