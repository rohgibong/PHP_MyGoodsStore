let pwd = document.changeForm.pwd;
let pwdChk = document.changeForm.pwdChk;
let label_pwd = document.getElementById("label_pwd");
let label_pwdChk = document.getElementById("label_pwdChk");

function changePw(){
  let err1, err2, errCode = 0;
  if(pwd.value == ""){
    label_pwd.innerHTML = "비밀번호를 입력해주세요.";
    label_pwd.style.color = "red";
    label_pwd.style.fontSize = "8px";
    pwd.style.borderBottom = "1px solid red";
    err1 = 1;
  } else if(pwd.value.length < 6){
    label_pwd.innerHTML = "비밀번호가 너무 짧습니다.";
    label_pwd.style.color = "red";
    label_pwd.style.fontSize = "8px";
    pwd.style.borderBottom = "1px solid red";
    pwd.focus();
    err1 = 1;
  }
  else {
    label_pwd.innerHTML = "";
    pwd.style.borderBottom = "1px solid lightgray";
    err1 = 0;
  }

  if(pwdChk.value == ""){
    label_pwdChk.innerHTML = "비밀번호확인을 입력해주세요.";
    label_pwdChk.style.color = "red";
    label_pwdChk.style.fontSize = "8px";
    pwdChk.style.borderBottom = "1px solid red";
    err2 = 1;
  } else {
    label_pwdChk.innerHTML = "";
    pwdChk.style.borderBottom = "1px solid lightgray";
    err2 = 0;
  }

  if(pwd.value != "" && pwdChk.value != ""){
    if(pwd.value != pwdChk.value){
      label_pwd.innerHTML = "비밀번호와 비밀번호확인이 다릅니다.";
      label_pwd.style.color = "red";
      label_pwd.style.fontSize = "8px";
      pwd.style.borderBottom = "1px solid red";
      err1 = 1;
      pwd.select();
    } else {
      label_pwd.innerHTML = "";
      pwd.style.borderBottom = "1px solid lightgray";
      err1 = 0;
    }
  }
  errCode = (err1 + err2);
  if(errCode != 0){
    return;
  }
  if(confirm("변경 하시겠습니까?")){
    document.changeForm.submit();
  }
}