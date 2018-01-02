var num1 = "";
var num2 = "";
var temp = "";
var symbol = "";
var num = "";
function changeText(clicked_id) {
	temp = document.getElementById(clicked_id).value;
	document.getElementById('result').value += temp;
}
function calculate(clicked_symbol) {
	symbol = document.getElementById(clicked_symbol).value;
	if(num1 == "" && num2 == "") {
		num1 = document.getElementById('result').value;
		document.getElementById('result').value = "";
		console.log("Num1: "+num1);
	}else if (num1 != "" && num2 == ""){
		num2 = document.getElementById('result').value;
		document.getElementById('result').value = "";
		console.log("Num2: "+num2);
	}
}
function equals() {
	var num = document.getElementById('result').value;
  if(symbol == '+')
    console.log("Total: "+(parseInt(num1) + parseInt(num2)));
	if(symbol == '-')
    console.log("Total: "+(parseInt(num1) - parseInt(num2)));
	if(symbol == '*')
		console.log("Total: "+(parseInt(num1) * parseInt(num2)));
	if(symbol == '/')
		console.log("Total: "+(parseInt(num1) / parseInt(num2)));		}
var num = 0;
var num2 = 0; //Default 0
var total = 0;
function calculate2(clicked_cal) {
	var cal = document.getElementById(clicked_cal).value; //e.g. '+'
	if(cal == '+') {
		var valueNum = document.getElementById('result').value;
		document.getElementById('result').value = "";
		var num = parseInt(valueNum);
		num2 += num;
	}else if(cal == '-') {
		var valueNum = document.getElementById('result').value;
		document.getElementById('result').value = "";
		var num = parseInt(valueNum);
		if(num2 != 0)
			console.log(num2 - num);
		else
		num2 -= num;
	}else if(cal == '*') {
		var valueNum = document.getElementById('result').value;
		document.getElementById('result').value = "";
		num = parseInt(valueNum);
		if(num2 != 0)
			console.log(num2 * num);
		else
			num2 = num;
			num = "";
	}else if(cal == '/') {
		var valueNum = document.getElementById('result').value;
		document.getElementById('result').value = "";
		num = parseInt(valueNum);
		if(num2 != 0) {
			total = num2 / num;
			num2 = "";
			num = "";
		}
		else
			num2 = num;
			num = "";
	}
}
