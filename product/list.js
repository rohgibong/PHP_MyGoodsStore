let subTitle1 = document.getElementById("subTitle1");
let subTitle2 = document.getElementById("subTitle2");
let subTitle3 = document.getElementById("subTitle3");
let subTitle4 = document.getElementById("subTitle4");

if(cateCode == 1){
  subTitle1.className = "changeTitle";
} else if(cateCode == 2){
  subTitle2.className = "changeTitle";
} else if(cateCode == 3){
  subTitle3.className = "changeTitle";
} else if(cateCode == 4){
  subTitle4.className = "changeTitle";
}