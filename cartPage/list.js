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

function search(){
  let searchValue = document.getElementById("searchInput").value;
  if(searchValue == ""){
    alert("검색어를 입력해주세요.");
  } else {
    location.href="../product/list.php?searchValue="+searchValue;
  }
}

function plus(amount, productCode, memberNo){
  if(amount == 10){
    alert("최대 수량은 10개입니다.");
    return;
  } else {
    amount++;
    let param = "amount=" + amount + "&productCode=" + productCode + "&memberNo=" + memberNo;
    $.ajax({
      type: "post",
      data: param,
      url: "updateAmountProc.php",
      success: function(){
        location.reload();
      }
    });
  }
}

function minus(amount, productCode, memberNo){
  if(amount == 1){
    alert("최소 수량은 1개입니다.");
    return;
  } else {
    amount--;
    let param = "amount=" + amount + "&productCode=" + productCode + "&memberNo=" + memberNo;
    $.ajax({
      type: "post",
      data: param,
      url: "updateAmountProc.php",
      success: function(){
        location.reload();
      }
    });
  }
}

$(document).ready(function(){
	$("#checkAll").click(function(){
    if($("#checkAll").prop("checked")){
      $("input[name='checkProduct\\[\\]']").prop("checked", true);
    } else {
      $("input[name='checkProduct\\[\\]']").prop("checked", false);
    }
    priceCal();
  });
  
	$(".checkboxClass").change(function(){
		if($(".checkboxClass:checked").length == $(".checkboxClass").length){
			$("#checkAll").prop("checked", true);
		} else{
			$("#checkAll").prop("checked", false);
		}
    priceCal();
	});
});
async function priceCal(){
  let price = 0;
  let delPrice = 0;
  let totalPrice = 0;
  let temp = "";

  let object = document.getElementsByName("checkProduct[]");
  for(i = 0; i < object.length; i++){
    if(object[i].checked){
      let param = "productCode=" + object[i].value + "&memberNo=" + memberNo;
      await $.ajax({
        type: "post",
        data: param,
        url: "calPriceProc.php",
        success: function(result){
          temp = result.split("/");
          temp[0] = +temp[0];
          temp[1] = +temp[1];
          temp[2] = +temp[2];
          price = price + (temp[0] * temp[1]);
          delPrice = delPrice + temp[2];
          totalPrice = price + delPrice;
        }
      });
    }
  }
  $('#totalPrice').val(price.toLocaleString());
  $('#totalDelPrice').val(delPrice.toLocaleString());
  $('#allTotalPrice').val(totalPrice.toLocaleString());
}

function remove(){
  let count = 0;
  let object = document.getElementsByName("checkProduct[]");
  if(confirm("선택하신 상품을 삭제하시겠습니까?")){
    for(i = 0; i < object.length; i++){
      if(object[i].checked){
        let param = "productCode=" + object[i].value + "&memberNo=" + memberNo;
        removeProc(param);
        count++;
      }
    }
    if(count == 0){
      alert("선택한 상품이 없습니다.");
    }
  }
}

function removeOne(productCode){
  let param;
  if(confirm("선택하신 상품을 삭제하시겠습니까?")){
    param = "productCode=" + productCode + "&memberNo=" + memberNo;
  } else {
    param = "productCode=" + 0 + "&memberNo=" + memberNo;
  }
  removeProc(param);
}

function removeProc(param){
  $.ajax({
    type: "post",
    data: param,
    url: "removeProc.php",
    success: function(){
      location.reload();
    }
  });
}

function order(value){
  let object = document.getElementsByName("checkProduct[]");
  let hasInsufficientStock = false;
  
  let checkStock = function(i) {
    if(object[i].checked){
      let param = "productCode=" + object[i].value + "&memberNo=" + memberNo;
      $.ajax({
        type: "post",
        data: param,
        url: "stockSearchProc.php",
        success: function(result){
          result = +result;
          if(result > 0){
            alert("재고수량이 부족한 상품이 있습니다.\n수량을 수정해주세요.");
            hasInsufficientStock = true;
          }
          if (i === object.length - 1) {
            continueOrder();
          }
        }
      });
    } else if (i === object.length - 1) {
      continueOrder();
    }
  }
  let continueOrder = function() {
    if (hasInsufficientStock) {
      return;
    }

    let selectedItems;
    if (value == 1) {
      selectedItems = Array.from(document.querySelectorAll('input[name="checkProduct[]"]'))
        .map(function(checkbox) {
          return checkbox.value;
        });
    } else if (value == 2) {
      selectedItems = Array.from(document.querySelectorAll('input[name="checkProduct[]"]:checked'))
        .map(function(checkbox) {
          return checkbox.value;
        });
    }

    if (selectedItems.length > 0) {
      let form = document.createElement('form');
      form.method = 'post';
      form.action = '../product/pay.php';

      selectedItems.forEach(function(item) {
        let input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'checkProduct[]';
        input.value = item;
        form.appendChild(input);
      });

      document.body.appendChild(form);
      form.submit();
    } else {
      alert('상품을 선택하세요.');
    }
  };

  for (let i = 0; i < object.length; i++) {
    checkStock(i);
  }
}