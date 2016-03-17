

function compute(flavorPrice1,scoop1) {

	var flavorPrice = flavorPrice1;
	var scoop = scoop1;
	var scoopTaken;
	var marshMallow_toppings = 5;
	var mnm_toppings = 8;

	if(marshMallow.checked == true && mnm.checked == false) {
		scoopTaken = ((scoop * flavorPrice)+marshMallow_toppings);
	}else if(mnm.checked == true && marshMallow.checked == false) {
		scoopTaken = ((scoop * flavorPrice)+mnm_toppings);
	}else if(marshMallow.checked == true && mnm.checked == true) {
		scoopTaken = scoopTaken = ((scoop * flavorPrice)+ (marshMallow_toppings+mnm_toppings));
	}
	else {
		scoopTaken = (scoop * flavorPrice);
	}
		return scoopTaken;
	
	}

function iceCream() {
	
	var rockyRoad = document.getElementById("rockyRoad");
	var rockyRoadPrice = 10;
	
	var doubleDutch = document.getElementById("doubleDutch");
	var doubleDutchPrice = 15;
	
	var cookiesNcream = document.getElementById("cookiesNcream");
	var cookiesNcreamPrice = 20;
	
	var scoop = parseInt(document.getElementById("scoop").value);
	
	var marshMallow = document.getElementById("marshMallow");
	var mnm = document.getElementById("mnm");

	
	
	if(rockyRoad.checked == true) {
		alert("Bill:"+compute(rockyRoadPrice,scoop));
	}else if(doubleDutch.checked == true) {
		alert("Bill:"+compute(doubleDutchPrice,scoop));
	}else if(cookiesNcream.checked == true) {
		alert("Bill:"+compute(cookiesNcreamPrice,scoop));
	}else {
		alert("ERROR");
	}
	
	}