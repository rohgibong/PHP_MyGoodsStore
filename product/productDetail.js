let current = 1;
let wishBtn = document.getElementById("wishBtn");
let wishImg = document.getElementById("wishImg");

$('#plusBtn').click(function(){
  current++;
  if(current > 10){
		current=10;
		alert("최대 수량은 10개입니다.");
	}
  $('#amountInput').val(current);
  let totalPrice = current * productPrice;
  $('#totalPrice').val(totalPrice.toLocaleString());
  $('#allTotal').val(totalPrice.toLocaleString());
});

$('#minusBtn').click(function(){
  current--;
  if(current < 1){
		current=1;
		alert("최소 수량은 1개입니다.");
	}
  $('#amountInput').val(current);
  let totalPrice = current * productPrice;
  $('#totalPrice').val(totalPrice.toLocaleString());
  $('#allTotal').val(totalPrice.toLocaleString());
});

$(document).ready(function() {
  $('#amountInput').on('input', function() {
    if($(this).val() <= 0){
      alert("최소 수량은 1개입니다.");
      let amount = 1;
      $('#amountInput').val(amount);
      current = amount;
      let totalPrice = amount * productPrice;
      $('#totalPrice').val(totalPrice.toLocaleString());
      $('#allTotal').val(totalPrice.toLocaleString());
    } else if($(this).val() > 10){
      alert("최대 수량은 10개입니다.");
      let amount = 10;
      $('#amountInput').val(amount);
      current = amount;
      let totalPrice = amount * productPrice;
      $('#totalPrice').val(totalPrice.toLocaleString());
      $('#allTotal').val(totalPrice.toLocaleString());
    } else {
      let amount = $(this).val();
      $('#amountInput').val(amount);
      current = amount;
      let totalPrice = amount * productPrice;
      $('#totalPrice').val(totalPrice.toLocaleString());
      $('#allTotal').val(totalPrice.toLocaleString());
    }
  });
});

wishBtn.addEventListener("mouseover", function() {
  wishImg.src = "../img/redheart.png";
});

wishBtn.addEventListener("mouseout", function() {
  wishImg.src = "../img/heart.png";
});