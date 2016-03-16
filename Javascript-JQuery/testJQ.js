$(function() {
	$("#btn1").click(function() {
	});
	
	
		$("#box2").hide();
	
	$("#box1").animate({
		"borderRadius":"100px",
		"left":"821px"
	},2000,function(){
		$("#box2").show(function(){
			$("box2").animate();
		});
	})	
	
	
		$("#box2").animate({
		"borderRadius":"100px",
		"right":"821px"
	},2000,function(){
		$("#box1").animate();
	})	
		
});