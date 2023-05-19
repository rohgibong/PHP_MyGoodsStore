let productName = document.productAddForm.productName;
let detailName = document.productAddForm.detailName;
let productPrice = document.productAddForm.productPrice;
let artistName = document.productAddForm.artistName;
let stock = document.productAddForm.stock;
let cateCode = document.productAddForm.cateCode;
let delPeriod = document.productAddForm.delPeriod;
let delPrice = document.productAddForm.delPrice;
let titleImg = document.productAddForm.titleImg;
let mainImg = document.productAddForm.mainImg;
let contentImg = document.productAddForm.contentImg;
let soldOut = document.productAddForm.soldOut;

function add(){
  if(productName.value == ""){
    alert("상품명을 입력해주세요.");
    productName.focus();
    return;
  }
  if(detailName.value == ""){
    alert("상품명을 입력해주세요.");
    detailName.focus();
    return;
  }
  if(productPrice.value == ""){
    alert("상품가격을 입력해주세요.");
    productPrice.focus();
    return;
  }
  if(productPrice.value <= 0){
    alert("상품가격을 정확하게 입력해주세요.");
    productPrice.focus();
    productPrice.select();
    return;
  }
  if(artistName.value == ""){
    alert("아티스트명을 입력해주세요.");
    artistName.focus();
    return;
  }
  if(stock.value == ""){
    alert("상품수량을 입력해주세요.");
    stock.focus();
    return;
  }
  if(stock.value <= 0){
    alert("상품수량을 정확하게 입력해주세요.");
    stock.focus();
    stock.select();
    return;
  }
  if(delPeriod.value == ""){
    alert("배송기간을 입력해주세요.");
    delPeriod.focus();
    return;
  }
  if(delPeriod.value <= 0){
    alert("배송기간을 정확하게 입력해주세요.");
    delPeriod.focus();
    delPeriod.select();
    return;
  }
  if(delPrice.value == ""){
    alert("배송비를 입력해주세요.");
    delPrice.focus();
    return;
  }
  if(titleImg.value == ""){
    alert("배너이미지를 등록해주세요.");
    titleImg.focus();
    return;
  }
  if(mainImg.value == ""){
    alert("메인이미지를 등록해주세요.");
    mainImg.focus();
    return;
  }
  if(contentImg.value == ""){
    alert("설명이미지를 등록해주세요.");
    contentImg.focus();
    return;
  }
  if(confirm("등록 하시겠습니까?")){
    document.productAddForm.submit();
  }
}
function goBack(){
  
}