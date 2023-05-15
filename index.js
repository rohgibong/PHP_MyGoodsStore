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



function search(){
  alert("검색");
}

function moveUserPage(){
  if(memberNo > 0){
    location.href='./member/member_pwCheck.php';
  } else {
    location.href='./login/login.php';
  }
}

function momveCartPage(){
  alert("카트");
}
