
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
  if (birth3.value.length === 3) {
    phone1.focus();
  }
});
phone1.addEventListener("input", function() {
  if (phone1.value.length === 4) {
    phone2.focus();
  }
});

function modify(){
  document.modifyForm.submit();
}

function deleteMember(){
  if(confirm('ㄹㅇ?')){
    alert('회원탈퇴');
  } else {
    alert('회원탈퇴안함');
  }
  //document.modifyForm.submit();
}