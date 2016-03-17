$(function() {
	
	var currentIndex;

	$("#frame").hide();
	
	$("ul li img").click(function(){
		
		var imgSrc = $(this).attr("src");
		currentIndex = $(this).parent();
		$("#main").attr("src",imgSrc);
		$("#overlay").fadeIn(2000);
		$("#frame").show(2500);
	});
	
	$("#overlay").click(function(){
		$("#overlay").fadeOut(2000);
		$("#frame").fadeOut(1500);
	});
	
	
	$("#right").click(function(){
		var nextIndex = currentIndex.next();
		var nextImg = nextIndex.children("img").attr("src");
		$("#main").attr("src",nextImg);
		currentIndex = nextIndex;
	});
	
	$("#left").click(function(){
		
		var prevIndex = currentIndex.prev();
		var prevImg = prevIndex.children("img").attr("src");
		$("#main").attr("src",prevImg);
		currentIndex = prevIndex;
		
	});
	
});