$(function() {
	$("#send").click(function() {
		
		
		if($("#msg").val() == "") {
			alert("Pls Enter a Message");
		}else {
		var msg = $("#msg").val();
		var prevMsg = $("#chatbox").html();
		$("#chatbox").html(prevMsg+"<br><b>Me:</b>"+msg);
		var height = $("#chatbox").prop("scrollHeight");
		$("#chatbox").scrollTop(height);
		$("#msg").val("");
		}
	
	});
	
	$("#msg").keypress(function(event) {
		
			if(event.which == 13) {
			$("#send").click();
			}
	}
	);
	
	$("#clear").click(function() {
		$("#chatbox").html($("#chatbox").val(""));
	});
	
	
});