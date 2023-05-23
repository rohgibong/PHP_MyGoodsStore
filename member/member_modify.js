
let birth1 = document.modifyForm.birth1;
let birth2 = document.modifyForm.birth2;
let birth3 = document.modifyForm.birth3;
let phone1 = document.modifyForm.phone1;
let phone2 = document.modifyForm.phone2;
let phone3 = document.modifyForm.phone3;
let pwd = document.modifyForm.pwd;
let pwdChk = document.modifyForm.pwdChk;
let address1 = document.modifyForm.address1;
let address2 = document.modifyForm.address2;
let address3 = document.modifyForm.address3;
let address4 = document.modifyForm.address4;
let email1 = document.modifyForm.email1;
let email2 = document.modifyForm.email2;
let label_pwd = document.getElementById("label_pwd");
let label_pwdChk = document.getElementById("label_pwdChk");
let label_birth = document.getElementById("label_birth");
let label_phone = document.getElementById("label_phone");
let label_address = document.getElementById("label_address");
let label_email = document.getElementById("label_email");

birth1.addEventListener("input", function() {
  if (birth1.value.length === 4) {
    birth2.focus();
  }
});
birth2.addEventListener("input", function() {
  if (birth2.value.length === 2) {
    birth3.focus();
  }
});
birth3.addEventListener("input", function() {
  if (birth3.value.length === 2) {
    phone1.focus();
  }
});
phone1.addEventListener("input", function() {
  if (phone1.value.length === 3) {
    phone2.focus();
  }
});
phone2.addEventListener("input", function() {
  if (phone1.value.length === 4) {
    phone3.focus();
  }
});


function modify(){
  let err1, err2, err3, err4, err5, err6, err7, err8, errCode = 0;
  if(birth1.value == "" || birth2.value == ""  || birth3.value == ""){
    label_birth.innerHTML = "생년월일을 입력해주세요.";
    label_birth.style.color = "red";
    label_birth.style.fontSize = "8px";
    
    if(birth1.value == ""){
      birth1.style.borderBottom = "1px solid red";
    } else {
      birth1.style.borderBottom = "1px solid lightgray";
    }
    if(birth2.value == ""){
      birth2.style.borderBottom = "1px solid red";
    } else {
      birth2.style.borderBottom = "1px solid lightgray";
    }
    if(birth3.value == ""){
      birth3.style.borderBottom = "1px solid red";
    } else {
      birth3.style.borderBottom = "1px solid lightgray";
    }
    err1 = 1;
  }
  else {
    label_birth.innerHTML = "";
    birth2.style.borderBottom = "1px solid lightgray";
    birth3.style.borderBottom = "1px solid lightgray";
    err1 = 0;
    if(birth1.value.length != 4){
      label_birth.innerHTML = "생년월일을 정확히 입력해주세요.";
      label_birth.style.color = "red";
      label_birth.style.fontSize = "8px";
      birth1.style.borderBottom = "1px solid red";
      err1 = 1;
    } else {
      birth1.style.borderBottom = "1px solid lightgray";
      err1 = 0;
    }
  }

  if(phone1.value == "" || phone2.value == "" || phone3.value == ""){
    label_phone.innerHTML = "휴대폰 번호를 입력해주세요.";
    label_phone.style.color = "red";
    label_phone.style.fontSize = "8px";
    if(phone1.value == ""){
      phone1.style.borderBottom = "1px solid red";
    } else {
      phone1.style.borderBottom = "1px solid lightgray";
    }
    if(phone2.value == ""){
      phone2.style.borderBottom = "1px solid red";
    } else {
      phone2.style.borderBottom = "1px solid lightgray";
    }
    if(phone3.value == ""){
      phone3.style.borderBottom = "1px solid red";
    } else {
      phone3.style.borderBottom = "1px solid lightgray";
    }
    err2 = 1;
  } else {
    label_phone.innerHTML = "";
    phone1.style.borderBottom = "1px solid lightgray";
    phone2.style.borderBottom = "1px solid lightgray";
    phone3.style.borderBottom = "1px solid lightgray";
    err2 = 0;
  }

  if(err2 == 0){
    if(phone1.value.length != 3 || phone2.value.length != 4 || phone3.value.length != 4){
      label_phone.innerHTML = "휴대폰 번호를 정확히 입력해주세요.";
      label_phone.style.color = "red";
      label_phone.style.fontSize = "8px";
      if(phone1.value.length != 3){
        phone1.style.borderBottom = "1px solid red";
      } else {
        phone1.style.borderBottom = "1px solid lightgray";
      }
      if(phone2.value.length != 4){
        phone2.style.borderBottom = "1px solid red";
      } else {
        phone2.style.borderBottom = "1px solid lightgray";
      }
      if(phone3.value.length != 4){
        phone3.style.borderBottom = "1px solid red";
      } else {
        phone3.style.borderBottom = "1px solid lightgray";
      }
      err7 = 1;
    } else {
      label_phone.innerHTML = "";
      phone1.style.borderBottom = "1px solid lightgray";
      phone2.style.borderBottom = "1px solid lightgray";
      phone3.style.borderBottom = "1px solid lightgray";
      err7 = 0;
    }
    
    if(err7 == 0){
      if(phone1.value == "010" || phone1.value == "011" || phone1.value == "016" || phone1.value == "017" || phone1.value == "018" || phone1.value == "019"){
        label_phone.innerHTML = "";
        phone1.style.borderBottom = "1px solid lightgray";
        err8 = 0;
      } else {
        label_phone.innerHTML = "휴대폰 번호를 정확히 입력해주세요.";
        label_phone.style.color = "red";
        label_phone.style.fontSize = "8px";
        phone1.style.borderBottom = "1px solid red";
        err8 = 1;
      }
    }
  }
  

  if(pwd.value == ""){
    label_pwd.innerHTML = "비밀번호를 입력해주세요.";
    label_pwd.style.color = "red";
    label_pwd.style.fontSize = "8px";
    pwd.style.borderBottom = "1px solid red";
    err3 = 1;
  } else if(pwd.value.length < 6){
    label_pwd.innerHTML = "비밀번호가 너무 짧습니다.";
    label_pwd.style.color = "red";
    label_pwd.style.fontSize = "8px";
    pwd.style.borderBottom = "1px solid red";
    pwd.focus();
    err3 = 1;
  }
  else {
    label_pwd.innerHTML = "";
    pwd.style.borderBottom = "1px solid lightgray";
    err3 = 0;
  }

  if(pwdChk.value == ""){
    label_pwdChk.innerHTML = "비밀번호확인을 입력해주세요.";
    label_pwdChk.style.color = "red";
    label_pwdChk.style.fontSize = "8px";
    pwdChk.style.borderBottom = "1px solid red";
    err4 = 1;
  } else {
    label_pwdChk.innerHTML = "";
    pwdChk.style.borderBottom = "1px solid lightgray";
    err4 = 0;
  }

  if(pwd.value != "" && pwdChk.value != ""){
    if(pwd.value != pwdChk.value){
      label_pwd.innerHTML = "비밀번호와 비밀번호확인이 다릅니다.";
      label_pwd.style.color = "red";
      label_pwd.style.fontSize = "8px";
      pwd.style.borderBottom = "1px solid red";
      err3 = 1;
      pwd.select();
    } else {
      label_pwd.innerHTML = "";
      pwd.style.borderBottom = "1px solid lightgray";
      err3 = 0;
    }
  }

  if(address1.value == "" || address2.value == "" || address3.value == ""){
    label_address.innerHTML = "주소를 입력해주세요.";
    label_address.style.color = "red";
    label_address.style.fontSize = "8px";

    if(address1.value == "" || address2.value == ""){
      address1.style.borderBottom = "1px solid red";
      address2.style.borderBottom = "1px solid red";
    } else {
      address1.style.borderBottom = "1px solid lightgray";
      address2.style.borderBottom = "1px solid lightgray";
    }
    if(address3.value == ""){
      address3.style.borderBottom = "1px solid red";
    } else {
      address3.style.borderBottom = "1px solid lightgray";
    }
    err5 = 1;
  } else {
    label_address.innerHTML = "";
    address1.style.borderBottom = "1px solid lightgray";
    address2.style.borderBottom = "1px solid lightgray";
    address3.style.borderBottom = "1px solid lightgray";
    err5 = 0;
  }

  if(email1.value == "" || email2.value == ""){
    label_email.innerHTML = "이메일을 입력해주세요.";
    label_email.style.color = "red";
    label_email.style.fontSize = "8px";
    if(email1.value == ""){
      email1.style.borderBottom = "1px solid red";
    } else {
      email1.style.borderBottom = "1px solid lightgray";
    }
    if(email2.value == ""){
      email2.style.borderBottom = "1px solid red";
    } else {
      email2.style.borderBottom = "1px solid lightgray";
    }
    err6 = 1;
  } else {
    label_email.innerHTML = "";
    email1.style.borderBottom = "1px solid lightgray";
    email2.style.borderBottom = "1px solid lightgray";
    err6 = 0;
  }

  errCode = (err1 + err2 + err3 + err4 + err5 + err6 + err7 + err8);
  if(errCode != 0){
    return;
  }
  if(confirm('수정 하시겠습니까?')){
    document.modifyForm.submit();
  }
}

function deleteMember(){
  if(confirm('정말로 탈퇴를 하시겠습니까?\n탈퇴 후에는 모든 정보와 접근 권한이 삭제됩니다.')){
    document.deleteForm.submit();
  }
}