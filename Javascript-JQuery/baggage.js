
function calculateBaggage() {
	var weight = parseInt(document.getElementById("weight").value);
	var baggageCost;
	var excess = 0;
	var excessAmount = 0;
	
	if(weight <= 10) {
		baggageCost = 50;
		excessAmount = 0;
	}else {
		baggageCost = 50;
		excess = (weight - 10);
		excessAmount = (excess * 7.50);
	}	
		alert("Baggage Cost:"+(baggageCost + excessAmount));
}