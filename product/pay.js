function moveUserPage(){
  if(memberNo > 0){
    location.href='../member/member_myPage.php';
  } else {
    location.href='../login/login.php';
  }
}

function moveCartPage(){
  location.href='../cartPage/list.php';
}

function orderItem() {
  let selectedItems1 = [];
  let selectedItems2 = [];

  let productCodeInputs = document.querySelectorAll('input[name="productCodes[]"]');
  let amountInputs = document.querySelectorAll('input[name="amounts[]"]');

  productCodeInputs.forEach(function(input) {
    selectedItems1.push(input.value);
  });

  amountInputs.forEach(function(input) {
    selectedItems2.push(input.value);
  });

  let form = document.createElement('form');
  form.method = 'post';
  form.action = '../product/payProc.php';

  selectedItems1.forEach(function(item) {
    let input = document.createElement('input');
    input.type = 'hidden';
    input.name = 'productCodes[]';
    input.value = item;
    form.appendChild(input);
  });

  selectedItems2.forEach(function(item) {
    let input = document.createElement('input');
    input.type = 'hidden';
    input.name = 'amounts[]';
    input.value = item;
    form.appendChild(input);
  });

  document.body.appendChild(form);
  form.submit();
}
