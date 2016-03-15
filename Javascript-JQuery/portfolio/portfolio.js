function getEmployeeName() {
	var name = document.getElementById("employeeName").value;
	//alert(name);
	return name;
}

function getEmployeeType() {
	var empType = document.getElementById("empType");
	var x;
	
	switch(empType.selectedIndex){
		case 0: 
		x = 3000;
		break;
		case 1:
		x = 1500;
		break;
		default:
		x = "ERROR";
	}
	return x;
}


function getPosition() {
	var clerk = document.getElementById("clerk");
	var supervisor = document.getElementById("supervisor");
	var manager = document.getElementById("manager")
	var position;
	
	if(clerk.checked == true) {
		position = "Clerk";
	}else if(supervisor.checked == true) {
		position = "Supervisor";
	}else if(manager.checked == true){
		position = "Manager";
	}else {
		position = "";
	}
	return position;
}

function getRate() {
	var clerk = document.getElementById("clerk");
	var supervisor = document.getElementById("supervisor");
	var manager = document.getElementById("manager");

	var clerkRate = 450;
	var supervisorRate = 600;
	var managerRate = 700;
	
	if(clerk.checked == true) {
		rate = clerkRate;
	}else if(supervisor.checked == true) {
		rate = supervisorRate;
	}else if(manager.checked == true){
		rate = managerRate;
	}else {
		rate = 0;
	}
	//alert(rate);
	return rate;
}

function getGross() {
	var daysWork = document.getElementById("daysWork").value;
	var x;
	
	(daysWork > 0) ? x = ((getRate() * daysWork)) : x=0;
	
	return x;
	
}

function getOvertimeRate() {
	//alert(getRate() / 8);
	return (getRate() / 8);
}

function getOvertimePay() {
	
	var overTime = parseInt(document.getElementById("overTime").value);
	//alert( getOvertimeRate() * overTime );
	var x;
	(overTime > 0) ? x = ( getOvertimeRate() * overTime ) : x = 0;
	return x;
	
}

function getSSS(gross) {
	return (((gross * 0.5) / 100)*10);
}

function getTax(gross) {
	return ((((gross * 0.10) / 100)*10)*10);
}

function compute() {
	//alert(getPosition());
	document.getElementById("result_employeeName").innerHTML = getEmployeeName();
	document.getElementById("result_daysWork").innerHTML = document.getElementById("daysWork").value+" days";
	document.getElementById("result_empType").innerHTML = document.getElementById("empType").value;
	document.getElementById("result_position").innerHTML = getPosition();
	document.getElementById("result_grossPay").innerHTML = "Php "+getGross();
	document.getElementById("result_overtime").innerHTML = getOvertimeRate()+"/hrs x "+document.getElementById("overTime").value+" hrs = Php "+getOvertimePay()+"";
	
	if(document.getElementById("mySSS").checked == true){ //has SSS
	document.getElementById("result_sss").innerHTML = "Php "+getSSS(getGross());
	}else { //no SSS
	document.getElementById("result_sss").innerHTML = 0;
	}
	if(document.getElementById("myTax").checked == true) { //has TAX
	document.getElementById("result_tax").innerHTML = "Php "+getTax(getGross());
	}else {	//no TAX
	document.getElementById("result_tax").innerHTML = 0;
	}
	document.getElementById("result_bonus").innerHTML = "Php "+getEmployeeType();
	document.getElementById("result_netPay").innerHTML = "Php "+((getGross() + getOvertimePay() + getEmployeeType()) - (getSSS(getGross()) + getTax(getGross())));
	
}