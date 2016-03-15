
function getElapsedTime() {
	
	var dayOfCall = parseInt(document.getElementById("dayOfCall").value);
	var startTime = document.getElementById("startTime").value;
	var endTime = document.getElementById("endTime").value;
	var elapseTime;
	
	var startTime_hr = startTime.substring(0,2);
	var endTime_hr = endTime.substring(0,2);
	
	var startTime_min = parseInt(startTime.substring(2,4));
	var endTime_min = parseInt(endTime.substring(2,4));
	
	var elapsedTime_hour = 0;
	var elapsedTime_min = 0;
	
	elapsedTime_hr =  (endTime_hr - startTime_hr);
	elapsedTime_min = (endTime_min - startTime_min);
	
	
	if(endTime_hr == startTime_hr) { //if same hour
		elapseTime = elapsedTime_min;
	}else if(endTime_min == 00 && startTime_min == 00) { //if both has exact time
		elapseTime = elapsedTime_hr*60;
	}
	else {
		elapseTime = elapsedTime_min+60;
	}
	//document.write(elapseTime);
	return elapseTime;
	
}



//
function getElapsedTime_sunday(startTimez,endTimez) {
	
	
	var dayOfCall = parseInt(document.getElementById("dayOfCall").value);
	var startTime = startTimez
	var endTime = endTimez;
	var elapseTime;
	
	var startTime_hr = startTime.substring(0,2);
	var endTime_hr = endTime.substring(0,2);
	
	var startTime_min = parseInt(startTime.substring(2,4));
	var endTime_min = parseInt(endTime.substring(2,4));
	
	var elapsedTime_hour = 0;
	var elapsedTime_min = 0;
	
	elapsedTime_hr =  (endTime_hr - startTime_hr);
	elapsedTime_min = (endTime_min - startTime_min);
	
	
	if(endTime_hr == startTime_hr) { //if same hour
		elapseTime = elapsedTime_min;
	}else if(endTime_min == 00 && startTime_min == 0) { //if both has exact time
		elapseTime = elapsedTime_hr
	}
	else {
		elapseTime = elapsedTime_min+60;
	}
	
	//document.write(elapseTime);
	return elapseTime;
	
}






function weekdays(elapseTime) {
	
	var startTime = parseInt(document.getElementById("startTime").value);
	var endTime = parseInt(document.getElementById("endTime").value);	
	var useTime = elapseTime; //e2 ung elapsed time
	var regularRate = 5;
	var regularMins = 3;
	var totalBill;
	
	var excessMins;
	var excessAmount;
	
	if( startTime >= 0 && endTime <= 600 ) {
		//alert("AM");

		if(useTime <= 3) { //regular rates
			totalBill = 5;
			alert("Total Bill:"+totalBill+".........Elapsed Time:"+elapseTime);
		}else { //when exceeds
			excessMins = (useTime - regularMins);
			excessAmount = (excessMins * 0.50);
			totalBill = (regularRate + excessAmount);
			alert("Total Bill:"+totalBill+"........Elapsed Time:"+elapseTime);
		}
		
	}else if( startTime >= 1800 && endTime <= 2359 ) {
		//alert("PM");
		if(useTime <= 3) { //regular rates
			totalBill = 5;
			alert("Total Bill:"+totalBill+".............Elapsed Time"+elapseTime);
		}else { //when exceeds
			excessMins = (useTime - regularMins);
			excessAmount = (excessMins * 0.50);
			totalBill = (regularRate + excessAmount);
			alert("Total Bill:"+totalBill+".........Elapsed Time"+elapseTime);
		}				
	}
	else {
		//alert("error weekdays");
		if(useTime <= 3) { //regular rates
			totalBill = 5;
			alert("Total Bill:"+totalBill+"...........Elapsed Time"+elapseTime);
		}else { //when exceeds
			excessMins = (useTime - regularMins);
			excessAmount = (excessMins * 1);
			totalBill = (regularRate + excessAmount);
			alert("Total Bill:"+totalBill+".......Elapsed Time"+elapseTime);
		}						
		
		
	}
	
}

function weekends(elapseTime) {
	var regularRate = 4;
	var regularMins = 3;
	var useTime = elapseTime; //e2 ung elapse time
	var totalBill;
	var excessMins;
	var excessAmount;
	
	if(useTime <= 3) {
		alert("Total Bill:"+regularRate+"..........Elapsed Time"+elapseTime);
	}else {
		excessMins = (useTime - regularMins);
		excessAmount = (excessMins * 0.50);
		alert( "Total Bill:"+(excessAmount + regularRate)+"........Elapsed Time"+elapseTime );
	}
	
}

function sunday(elapseTime) {
	
	var startTime = parseInt(document.getElementById("startTime").value);
	var endTime = parseInt(document.getElementById("endTime").value);
	
	var regularRate = 4;
	var regularMins = 3;
	var useTime = elapseTime; //e2 ung elapse time q
	var totalBill;
	var excessMins;
	var excessAmount;
	
	
	if(startTime >= 1200 && endTime <= 1300) {
		totalBill = "FREE CALL";
		alert("TOTAL BILL:"+totalBill+"............Elapsed Time"+elapseTime);
	}else {
		//alert("ERROR");		
		//weekends(elapseTime);
	
		if(startTime >= 1200 && startTime <= 1300 && endTime >= 1300) {
			//alert("Sunday Start time OK");
			//alert("Total Bill......................Elapsed Time:"+elapsedTimeOFFSET);
			weekends(getElapsedTime_sunday("1300",endTime+""));
		}else if(endTime >= 1200 && endTime <= 1300 && startTime <= 1159) {
			//alert("Saturday End Time OK");
			weekends(getElapsedTime_sunday(startTime+"","1200"));
		}else {
			weekends(elapseTime);
		}
	
	
	}
	
}



function calculate() {
	
	var dayOfCall = parseInt(document.getElementById("dayOfCall").value);
	
	if(dayOfCall >= 1 && dayOfCall <= 5) {
		//alert("Weekdays");
		weekdays(getElapsedTime());
	}else if(dayOfCall == 6) {
		//alert("Saturday");
		weekends(getElapsedTime());
	}else if(dayOfCall == 7 ) {
		//alert("Sunday");
		sunday(getElapsedTime());
	}else {
		alert("WOW");
	}
	
}