	
function greet() {	
	var txtNum1,txtNum2,txtTotal;
	txtNum1 = parseInt(document.getElementById("txtNum1").value);
	txtNum2 = parseInt(document.getElementById("txtNum2").value);
	
	
	if(txtNum1 > txtNum2) {
		document.write("Number1 is the larger number");
	}else if(txtNum1 == txtNum2) {
		document.write("Number 1 is equal to Number 2");
	}
	else {
		document.write("Number 2 is the larger number");
	}
	
}