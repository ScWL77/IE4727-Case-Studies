var jj_quantity= document.getElementById("jj_quantity");
var cal_quantity= document.getElementById("cal_quantity");
var cal_single= document.getElementById("cal_single");
var cal_double= document.getElementById("cal_double");
var ic_quantity= document.getElementById("ic_quantity");
var ic_single= document.getElementById("ic_single");
var ic_double= document.getElementById("ic_double");

jj_quantity.addEventListener("change",updatePrice, false);
cal_quantity.addEventListener("change",updatePrice, false);
cal_single.addEventListener("change",updatePrice, false);
cal_double.addEventListener("change",updatePrice, false);
ic_quantity.addEventListener("change",updatePrice, false);
ic_single.addEventListener("change",updatePrice, false);
ic_double.addEventListener("change",updatePrice, false);
