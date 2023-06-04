function deleteAll(){
  if(confirm("전체 상품을 삭제하시겠습니까?")){
    location.href="member_wishRemoveAllProc.php?memberNo=" + memberNo;
  }
}

function deleteOne(productCode){
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
    url: "member_wishRemoveProc.php",
    success: function(){
      location.reload();
    }
  });
}