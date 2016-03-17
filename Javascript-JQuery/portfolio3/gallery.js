$(function(){
	 
	 var currentIndex=0;
	 var counter;
	 
	$("ul li img").click(function(){
		
		var imgSrc = $(this).attr("src");
		currentIndex = $(this).parent();	
		$("#bigPhotoIMG").attr("src",imgSrc);	
		//currentIndex = $("ul").index();
		//alert(currentIndex.index());
		counter = currentIndex.index();
		counter1 = counter;
		
	
	});
	
	$("#right").click(function(){
		if(currentIndex.next().length < 1){
			//alert(currentIndex.index());
		}else {
			nextIndex = currentIndex.next();
			var nextImg = nextIndex.children("img").attr("src");
			$("#bigPhotoIMG").attr("src",nextImg);
			currentIndex = nextIndex;
			
			if(currentIndex.index() == 0) {
				$("#photo1").attr("class","thumbnail1");
				$("#photo2").attr("class","thumbnail");
				$("#photo3").attr("class","thumbnail");
				$("#photo4").attr("class","thumbnail");
				$("#caption").html("Tatlong Bata");
			
			}if(currentIndex.index() == 1) {
				$("#photo1").attr("class","thumbnail");
				$("#photo2").attr("class","thumbnail1");
				$("#photo3").attr("class","thumbnail");
				$("#photo4").attr("class","thumbnail");
				$("#caption").html("Dalawang Bata");
			}if(currentIndex.index() == 2 ) {
				$("#photo1").attr("class","thumbnail");
				$("#photo2").attr("class","thumbnail");
				$("#photo3").attr("class","thumbnail1");
				$("#photo4").attr("class","thumbnail");
				$("#caption").html("Isang Bata");
			}if(currentIndex.index() == 3 ) {
				$("#photo1").attr("class","thumbnail");
				$("#photo2").attr("class","thumbnail");
				$("#photo3").attr("class","thumbnail");
				$("#photo4").attr("class","thumbnail1");
				$("#caption").html("Apat na Bata");
			}
			
			
			
		}
		
		
	});
	
	/*
	$("#right").click(function(){
		alert("Asas");
		//$(".thumbnail").eq(counter).attr("class","thumbnail1");
	});
	*/
	$("#photo1").click(function(){
		$("#photo1").attr("class","thumbnail1");;
		$("#photo2").attr("class","thumbnail");;
		$("#photo3").attr("class","thumbnail");;
		$("#photo4").attr("class","thumbnail");;
		$("#caption").html("Tatlong Bata");
	});
	
		$("#photo2").click(function(){
		$("#photo1").attr("class","thumbnail");;
		$("#photo2").attr("class","thumbnail1");;
		$("#photo3").attr("class","thumbnail");;
		$("#photo4").attr("class","thumbnail");;
		$("#caption").html("Dalawang Bata");
	});
	
		$("#photo3").click(function(){
		$("#photo1").attr("class","thumbnail");;
		$("#photo2").attr("class","thumbnail");;
		$("#photo3").attr("class","thumbnail1");;
		$("#photo4").attr("class","thumbnail");;
		$("#caption").html("Isang Bata");
	});
	
		$("#photo4").click(function(){
		$("#photo1").attr("class","thumbnail");;
		$("#photo2").attr("class","thumbnail");;
		$("#photo3").attr("class","thumbnail");;
		$("#photo4").attr("class","thumbnail1");;
		$("#caption").html("Apat na Bata");
	});
	
	
	$("#left").click(function(){
		
		if(currentIndex.prev().length < 1) {
			//alert("currentIndex.index");
		}else {
		var prevIndex = currentIndex.prev();
		var prevImg = prevIndex.children("img").attr("src");
		$("#bigPhotoIMG").attr("src",prevImg);
		currentIndex = prevIndex;
		//alert(currentIndex.next().length);


			if(currentIndex.index() == 0) {
				$("#photo1").attr("class","thumbnail1");
				$("#photo2").attr("class","thumbnail");
				$("#photo3").attr("class","thumbnail");
				$("#photo4").attr("class","thumbnail");
				$("#caption").html("Tatlong Bata");
					
			}if(currentIndex.index() == 1) {
				$("#photo1").attr("class","thumbnail");
				$("#photo2").attr("class","thumbnail1");
				$("#photo3").attr("class","thumbnail");
				$("#photo4").attr("class","thumbnail");
				$("#caption").html("Dalawang Bata");
			}if(currentIndex.index() == 2 ) {
				$("#photo1").attr("class","thumbnail");
				$("#photo2").attr("class","thumbnail");
				$("#photo3").attr("class","thumbnail1");
				$("#photo4").attr("class","thumbnail");
				$("#caption").html("Isang Bata");
			}if(currentIndex.index() == 3 ) {
				$("#photo1").attr("class","thumbnail");
				$("#photo2").attr("class","thumbnail");
				$("#photo3").attr("class","thumbnail");
				$("#photo4").attr("class","thumbnail1");
				$("#caption").html("Apat na Bata");
			}
		
		
		}
		
		
	});
		
	
});