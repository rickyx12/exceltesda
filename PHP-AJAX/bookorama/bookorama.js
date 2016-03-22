$(function(){
	

	
	$("#signup").click(function(){
		$("#loginbox").fadeOut(2000,function(){
			$("#signupBox_opacity").fadeIn(2000);
			$("#signupBox").fadeIn(2000);
			$("#loginbox_opacity").fadeOut(2000);
		});
		
	});
	
	$("#backLogin").click(function(){
		$("#signupBox").fadeOut(2000,function(){
			$("#loginbox").fadeIn(2000);
		});
		$("#signupBox_opacity").fadeOut(2000,function(){
			$("#loginbox_opacity").fadeIn(2000);
		});

	});
	
	$("#loginBtn").click(function(){
		
		var usernameInput = $("#username").val();
		var passwordInput = $("#password").val();
		
		$.post("login.php",{username:usernameInput,password:passwordInput},function(data){
			
			if(data == "success") {
				window.location = "home.php";
			}else {
			$("#error").html("<font color=red>"+data+"</font>");
			}
		});
		
		
	});
	

	$("#").click(function(){

	});
	
	$("#searchBtn").click(function(){
		
		var searchBox = $("#searchBox").val();
		$.post("search.php",{search:searchBox},function(data){
			$("#rightContainer").fadeIn(2000);
			$("#rightContainer").html(data);
		});
		
	});
	
	$("#dashboard").click(function(){
		$.post("showAll.php",function(data){
			$("#rightContainer").fadeIn(2000,function(){
				$("#rightContainer").html(data);
			});

		});
	});
	
	
	$("#updateNow").click(function(){
		 
		 var bookid1 = $("#bookid").val();
		 var bookName1 = $("#bookName").val();
		 var category1 = $("#category").val();
		 var author1 = $("#author").val();
		 
		$.post("editNow.php",{bookid:bookid1,bookName:bookName1,category:category1,author:author1},function(data){
			$("#rightContainer").html(data);
			$("#rightContainer").fadeOut(2000);
		});
		
	});
	
	
	$("#signupNow").click(function(){
		var user = $("#usernameSignup").val();
		var pass = $("#passwordSignup").val();
		var pass1 = $("#password1Signup").val();
		var usertype1 = $("#usertype").val();
		
		$.post("signupNow.php",{username:user,password:pass,password1:pass1,userType:usertype1},function(data){
			
			if(data == "Registered") {
				$("#signupBox").html(data);
				$("#signupBox").fadeOut(3000,function(){
					$("#loginbox").fadeIn(3000);
				});
				$("#signupBox_opacity").fadeOut(3000,function(){
					$("#loginbox_opacity").fadeIn(3000);
				});
			}else {
				$("#errmsg").html("<font color=red>ERROR</font>");
			}
		});
		
	});
	
	$("#addBookMenu").click(function(){
		$.post("addBooks.php",function(data){
			$("#rightContainer").fadeIn(2000,function(){
				$("#rightContainer").html(data);
			});
			
		});
	});
	
});