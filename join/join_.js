let name = document.joinForm.name;
let birthYear = document.joinForm.birthYear;
let birthMonth = document.joinForm.birthMonth;
let birthDay = document.joinForm.birthDay;
let gender = document.joinForm.gender;
let phone1 = document.joinForm.phone1;
let phone2 = document.joinForm.phone2;
let phone3 = document.joinForm.phone3;
let id = document.joinForm.id;
let tempId = document.joinForm.tempId;
let pwd = document.joinForm.pwd;
let pwdChk = document.joinForm.pwdChk;
let address1 = document.joinForm.address1;
let address2 = document.joinForm.address2;
let address3 = document.joinForm.address3;
let address4 = document.joinForm.address4;
let email1 = document.joinForm.email1;
let email2 = document.joinForm.email2;
let label_name = document.getElementById("label_name");
let label_birth = document.getElementById("label_birth");
let label_phone = document.getElementById("label_phone");
let label_id = document.getElementById("label_id");
let label_address = document.getElementById("label_address");
let label_email = document.getElementById("label_email");

birthYear.addEventListener("input", function() {
  if (birthYear.value.length === 4) {
    birthMonth.focus();
  }
});
birthMonth.addEventListener("input", function() {
  if (birthMonth.value.length === 2) {
    birthDay.focus();
  }
});
phone1.addEventListener("input", function() {
  if (phone1.value.length === 3) {
    phone2.focus();
  }
});
phone2.addEventListener("input", function() {
  if (phone2.value.length === 4) {
    phone3.focus();
  }
});
phone3.addEventListener("input", function() {
  if (phone3.value.length === 4) {
    id.focus();
  }
});

function idCheck(){
  if(id.value == ""){
    label_id.innerHTML = "아이디를 입력해주세요.";
    label_id.style.color = "red";
    label_id.style.fontSize = "8px";
    id.style.borderBottom = "1px solid red";
    id.focus();
    return;
  }
  if(id.value.length < 4){
    label_id.innerHTML = "아이디가 너무 짧습니다.";
    label_id.style.color = "red";
    label_id.style.fontSize = "8px";
    id.style.borderBottom = "1px solid red";
    id.select();
    return;
  }
  label_id.innerHTML = "잠시만 기다려주세요...";
  label_id.style.color = "black";
  label_id.style.fontSize = "8px";
  let param = "id=" + id.value;
  $.ajax({
		type: "post",
		data: param,
		url: "join_idCheck.php",
		success : function(result){
      console.log(result);
			if(result > 0){
        label_id.innerHTML = "이미 사용중인 아이디입니다.";
        label_id.style.color = "red";
        label_id.style.fontSize = "8px";
        id.style.borderBottom = "1px solid red";
        tempId.value = "";
			} else{
        label_id.innerHTML = "사용 가능한 아이디입니다.";
        label_id.style.color = "blue";
        label_id.style.fontSize = "8px";
        id.style.borderBottom = "1px solid lightgray";
        tempId.value = id.value;
			}
		}
	});
}

function join(){
  let err1, err2, err3, err4, err5, err6, err7, err8, errCode = 0;
  if(name.value == ""){
    label_name.innerHTML = "이름을 입력해주세요.";
    label_name.style.color = "red";
    label_name.style.fontSize = "8px";
    name.style.borderBottom = "1px solid red";
    err1 = 1;
  } else if(name.value.length < 2 || name.value.length > 5){
    label_name.innerHTML = "올바른 이름을 입력해주세요.";
    label_name.style.color = "red";
    label_name.style.fontSize = "8px";
    name.style.borderBottom = "1px solid red";
    name.focus();
    err1 = 1;
  } else {
    label_name.innerHTML = "";
    name.style.borderBottom = "1px solid lightgray";
    err1 = 0;
  }
  if(birthYear.value == "" || birthMonth.value == ""  || birthDay.value == ""){
    label_birth.innerHTML = "생년월일을 입력해주세요.";
    label_birth.style.color = "red";
    label_birth.style.fontSize = "8px";
    
    if(birthYear.value == ""){
      birthYear.style.borderBottom = "1px solid red";
    } else {
      birthYear.style.borderBottom = "1px solid lightgray";
    }
    if(birthMonth.value == ""){
      birthMonth.style.borderBottom = "1px solid red";
    } else {
      birthMonth.style.borderBottom = "1px solid lightgray";
    }
    if(birthDay.value == ""){
      birthDay.style.borderBottom = "1px solid red";
    } else {
      birthDay.style.borderBottom = "1px solid lightgray";
    }
    err2 = 1;
  }
  else {
    label_birth.innerHTML = "";
    birthMonth.style.borderBottom = "1px solid lightgray";
    birthDay.style.borderBottom = "1px solid lightgray";
    err2 = 0;
    if(birthYear.value.length != 4){
      label_birth.innerHTML = "생년월일을 정확히 입력해주세요.";
      label_birth.style.color = "red";
      label_birth.style.fontSize = "8px";
      birthYear.style.borderBottom = "1px solid red";
      err2 = 1;
    } else {
      birthYear.style.borderBottom = "1px solid lightgray";
      err2 = 0;
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
    err3 = 1;
  } else {
    label_phone.innerHTML = "";
    phone1.style.borderBottom = "1px solid lightgray";
    phone2.style.borderBottom = "1px solid lightgray";
    phone3.style.borderBottom = "1px solid lightgray";
    err3 = 0;
  }

  if((phone1.value != "" && phone2.value != "" && phone3.value != "") && (phone1.value.length != 3 || phone2.value.length != 4 || phone3.value.length != 4)){
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
  } else {
    label_phone.innerHTML = "";
    phone1.style.borderBottom = "1px solid lightgray";
    phone2.style.borderBottom = "1px solid lightgray";
    phone3.style.borderBottom = "1px solid lightgray";
    err3 = 0;
  }

  if((phone1.value != "") && (phone1.value.length == 3) && (phone1.value != "010" || phone1.value != "011" || phone1.value != "016" || phone1.value != "017" || phone1.value != "018" || phone1.value != "019")){
    label_phone.innerHTML = "휴대폰 번호를 정확히 입력해주세요.";
    label_phone.style.color = "red";
    label_phone.style.fontSize = "8px";
    phone1.style.borderBottom = "1px solid red";
    err3 = 1;
  } else {
    label_phone.innerHTML = "";
    phone1.style.borderBottom = "1px solid lightgray";
    err3 = 0;
  }

  if(id.value == ""){
    label_id.innerHTML = "아이디를 입력해주세요.";
    label_id.style.color = "red";
    label_id.style.fontSize = "8px";
    id.style.borderBottom = "1px solid red";
    err4 = 1;
  } else if(tempId.value == ""){
    label_id.innerHTML = "아이디 확인을 해주세요.";
    label_id.style.color = "red";
    label_id.style.fontSize = "8px";
    id.style.borderBottom = "1px solid red";
    err4 = 1;
  } else if(id.value != tempId.value){
    label_id.innerHTML = "아이디 확인을 해주세요.";
    label_id.style.color = "red";
    label_id.style.fontSize = "8px";
    id.style.borderBottom = "1px solid red";
    err4 = 1;
  } else {
    label_id.innerHTML = "";
    id.style.borderBottom = "1px solid lightgray";
    err4 = 0;
  }

  if(pwd.value == ""){
    label_pwd.innerHTML = "비밀번호를 입력해주세요.";
    label_pwd.style.color = "red";
    label_pwd.style.fontSize = "8px";
    pwd.style.borderBottom = "1px solid red";
    err5 = 1;
  } else if(pwd.value.length < 4){
    label_pwd.innerHTML = "비밀번호가 너무 짧습니다.";
    label_pwd.style.color = "red";
    label_pwd.style.fontSize = "8px";
    pwd.style.borderBottom = "1px solid red";
    pwd.focus();
    err5 = 1;
  }
  else {
    label_pwd.innerHTML = "";
    pwd.style.borderBottom = "1px solid lightgray";
    err5 = 0;
  }

  if(pwdChk.value == ""){
    label_pwdChk.innerHTML = "비밀번호확인을 입력해주세요.";
    label_pwdChk.style.color = "red";
    label_pwdChk.style.fontSize = "8px";
    pwdChk.style.borderBottom = "1px solid red";
    err6 = 1;
  } else {
    label_pwdChk.innerHTML = "";
    pwdChk.style.borderBottom = "1px solid lightgray";
    err6 = 0;
  }

  if(pwd.value != "" && pwdChk.value != ""){
    if(pwd.value != pwdChk.value){
      label_pwd.innerHTML = "비밀번호와 비밀번호확인이 다릅니다.";
      label_pwd.style.color = "red";
      label_pwd.style.fontSize = "8px";
      pwd.style.borderBottom = "1px solid red";
      err5 = 1;
      pwd.select();
    } else {
      label_pwd.innerHTML = "";
      pwd.style.borderBottom = "1px solid lightgray";
      err5 = 0;
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
    err7 = 1;
  } else {
    label_address.innerHTML = "";
    address1.style.borderBottom = "1px solid lightgray";
    address2.style.borderBottom = "1px solid lightgray";
    address3.style.borderBottom = "1px solid lightgray";
    err7 = 0;
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
    err8 = 1;
  } else {
    label_email.innerHTML = "";
    email1.style.borderBottom = "1px solid lightgray";
    email2.style.borderBottom = "1px solid lightgray";
    err8 = 0;
  }

  errCode = (err1 + err2 + err3 + err4 + err5 + err6 + err7 + err8);
  if(errCode != 0){
    return;
  }
   document.joinForm.submit();
}

function goBack(){
  window.history.back();
}