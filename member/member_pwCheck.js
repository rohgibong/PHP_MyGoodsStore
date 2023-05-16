let pwd = document.checkForm.pwd;

function check(){
  if(pwd.value == ""){
    label_pwd.innerHTML = "비밀번호를 입력해주세요.";
    label_pwd.style.color = "red";
    label_pwd.style.fontSize = "8px";
    pwd.style.borderBottom = "1px solid red";
    return;
  } else {
    label_pwd.innerHTML = "";
    pwd.style.borderBottom = "1px solid lightgray";
  }
  document.checkForm.submit();
}