let name = document.findForm.name;
let phone1 = document.findForm.phone1;
let phone2 = document.findForm.phone2;
let phone3 = document.findForm.phone3;
let label_name = document.getElementById("label_name");
let label_phone = document.getElementById("label_phone");

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

function findId(){
  let err1, err2, err3, err4, errCode = 0;
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
      err3 = 1;
    } else {
      label_phone.innerHTML = "";
      phone1.style.borderBottom = "1px solid lightgray";
      phone2.style.borderBottom = "1px solid lightgray";
      phone3.style.borderBottom = "1px solid lightgray";
      err3 = 0;
    }
    
    if(err3 == 0){
      if(phone1.value == "010" || phone1.value == "011" || phone1.value == "016" || phone1.value == "017" || phone1.value == "018" || phone1.value == "019"){
        label_phone.innerHTML = "";
        phone1.style.borderBottom = "1px solid lightgray";
        err4 = 0;
      } else {
        label_phone.innerHTML = "휴대폰 번호를 정확히 입력해주세요.";
        label_phone.style.color = "red";
        label_phone.style.fontSize = "8px";
        phone1.style.borderBottom = "1px solid red";
        err4 = 1;
      }
    }
  }
  errCode = (err1 + err2 + err3 + err4);
  if(errCode != 0){
    return;
  }
  document.findForm.submit();
}