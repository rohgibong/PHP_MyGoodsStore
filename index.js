let num = document.getElementById('tempNum');
let counter = 1;
let timerId;

document.querySelectorAll('input[type="radio"]').forEach(function(radio) {
  radio.addEventListener('click', function() {
    clearInterval(timerId);
    counter = parseInt(this.id.slice(-1)) + 1;
    timerId = setInterval(function() {
      document.getElementById('radio' + counter).checked = true;
      counter++;
      if (counter > 4) {
        counter = 1;
      }
    }, 5000);
  });
});

setTimeout(function(){
  document.getElementById('radio' + counter).checked = true;
  counter++;
  if(counter > 4){
    counter = 1;
  }
  timerId = setInterval(function(){
    document.getElementById('radio' + counter).checked = true;
    counter++;
    if(counter > 4){
      counter = 1;
    }
  }, 5000);
}, 0);

function goLeft(){
  if(num.value == 1){
    counter--;
  }
  num.innerHTML = num.value++;
  counter--;
  if(counter < 1){
    counter = 4;
  }
  document.getElementById('radio' + counter).click;
  document.getElementById('radio' + counter).checked = true;
  
}

function goRight(){
  clearInterval(timerId);
  timerId = setInterval(function() {
    document.getElementById('radio' + counter).checked = true;
    counter++;
    if (counter > 4) {
      counter = 1;
    }
  }, 5000);
  document.getElementById('radio' + counter).click();
  if (counter > 4) {
    counter = 1;
  }
}

function search(){
  let searchValue = document.getElementById("searchInput").value;
  if(searchValue == ""){
    alert("검색어를 입력해주세요.");
  } else {
    location.href="./product/list.php?searchValue="+searchValue;
  }
}

function moveUserPage(){
  if(memberNo > 0){
    location.href='./member/member_myPage.php';
  } else {
    location.href='./login/login.php';
  }
}

function momveCartPage(){
  location.href='./cartPage/list.php';
}
