
function testSwitch() {
	
	var month = parseInt(document.getElementById("nums").value);
	
	switch(month) {
		case 1:
		case 2:
		case 3: alert("Winter");
		break;
		case 4:
		case 5:
		case 6: alert("Spring");
		break;
		case 7:
		case 8:
		case 9: alert("Summer");
		break;
		case 10:
		case 11:
		case 12: alert("Fall");
		break;
		default: alert("ERROR");
		
	}
	
}

function testRadio() {
	
	var male = document.getElementById("rdMale");
	var female = document.getElementById("rdFemale");
	
	if(male.checked == true) {
		alert("MALE");
	}else if(female.checked == true) {
		alert("FEMALE");
	}else {
		alert("ERROR");
	}
	
}


function testCheckBox() {
	var status = document.getElementById("chkStatus");
	
	if(status.checked == true) {
		alert("checkedbox is on");
	}else {
		alert("checkbox is off");
	}
	
}

function testListBox() {
	var color = document.getElementById("colors");
	
	switch(color.selectedIndex) {
		case 0: alert("Red");
		break;
		case 1: alert("Blue");
		break;
		case 2: alert("Green");
		break;
		case 3: alert("Yellow");
		break;
		default: alert("ERROR");
	}
}