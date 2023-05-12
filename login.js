let id = document.loginForm.id;
let pwd = document.loginForm.pwd;

function login(){
  let errCounter = 0;
  let id = document.getElementById("id");
  let pwd = document.getElementById("pwd");
  let label_id = document.getElementById("label_id");
  let label_pwd = document.getElementById("label_pwd");
  

  if(id.value == ""){
    label_id.innerHTML = "아이디를 입력해주세요.";
    label_id.style.color = "red";
    label_id.style.fontSize = "8px";
    id.style.borderBottom = "1px solid red";
    errCounter++;
  } else {
    label_id.innerHTML = "";
    id.style.borderBottom = "1px solid lightgray";
  }
  if(pwd.value == ""){
    label_pwd.innerHTML = "비밀번호를 입력해주세요.";
    label_pwd.style.color = "red";
    label_pwd.style.fontSize = "8px";
    pwd.style.borderBottom = "1px solid red";
    errCounter++;
  } else {
    label_pwd.innerHTML = "";
    pwd.style.borderBottom = "1px solid lightgray";
  }
  
  if(errCounter > 0){
    return;
  } else {
    document.loginForm.submit();
  }

}