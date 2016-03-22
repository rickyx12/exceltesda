	$.ajaxPrefilter(function( options, originalOptions, jqXHR ) {
    options.async = true;
	});

$(function(){
	

	
	$("#signup").click(function(){
		$("#signupBox").fadeIn(2000);
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
	
	
	$("#searchBtn").click(function(){
		
		var searchBox = $("#searchBox").val();
		$.post("search.php",{search:searchBox},function(data){
			$("#rightContainer").html(data);
		});
		
	});
	
	$("#dashboard").click(function(){
		$.post("showAll.php",function(data){
			$("#rightContainer").html(data);
		});
	});
	
	
	$("#updateNow").click(function(){
		 
		 var bookid1 = $("#bookid").val();
		 var bookName1 = $("#bookName").val();
		 var category1 = $("#category").val();
		 var author1 = $("#author").val();
		 
		$.post("editNow.php",{bookid:bookid1,bookName:bookName1,category:category1,author:author1},function(data){
			$("#rightContainer").html(data);
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
				$("#signupBox").fadeOut(3000);
			}else {
				$("#errmsg").html("<font color=red>ERROR</font>");
			}
		});
		
	});
	
	$("#addBook").click(function(){
		$.post("addBooks.php",function(data){
			$("#rightContainer").html(data);
		});
	});
	
	$("#insertBook").click(function(){
		var bookName1 = $("#bookName").val();
		var category1 = $("#category").val();
		var author1 = $("#author").val();
		
		
		$.ajax({
		type: "POST",
		url: "addBooks1.php",
		data: {bookName:bookName1,category:category1,author:author1},
		success:function(x){
			$("#rightContainer").html(x);
		},
		async:false
		});
		
		/*
		$.post("addBooks1.php",{bookName:bookName1,category:category1,author:author1},function(data){
			$("#rightContainer").html(data);
			$.ajaxSetup({async: false});
		});
		*/
		});
	
});