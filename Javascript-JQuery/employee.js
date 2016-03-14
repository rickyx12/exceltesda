
function season() {
	var season = parseInt(document.getElementById("season").value);
	
	if( season >= 1 && season <= 3 ) {
		alert("Winter");
	}else if( season >=4 && season <=6) {
		alert("Spring");
	}else if( season >=7 && season <= 9) {
		alert("Summer");
	}else if(season >= 10 && season <= 12) {
		alert("Fall");
	}else {
		alert("Invalid Month");
	}
	

	
}