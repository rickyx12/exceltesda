$(function(){
	
	//disabled kapag nag load na
	$("#salmonBellyTB").prop("disabled",true);
	$("#roastBeefTB").prop("disabled",true);
	$("#tboneSteakTB").prop("disabled",true);
	$("#ribeyeSteakTB").prop("disabled",true);
	$("#wagyuBeefTB").prop("disabled",true);
	
	$("#customerNameRow").hide();
	$("#customerNumberRow").hide();
	$("#salmonBellyRow").hide();
	$("#roastBeefRow").hide();
	$("#tboneSteakRow").hide();
	$("#ribeyeSteakRow").hide();
	$("#wagyuBeefRow").hide();
	$("#riceRow").hide();
	$("#drinksRow").hide();
	$("#seniorCitizenRow").hide();
	$("#grandTotalRow").hide();
	$("#loyaltyRow").hide();
	$("#birthdayRow").hide();
	$("#gtRow").hide();
	$("#receipt").hide();
	$("#requiredName").hide();
	
	var salmonBellyPrice = 250;
	var roastBeefPrice = 300;
	var tboneSteakPrice = 280;
	var ribeyeSteakPrice = 320;
	var wagyuBeefPrice = 350;
	var ricePrice = 20;
	var drinksPrice = 30;
	var senior = .20;
	var loyalty = .10;
	var bday = .10;
	var total = 0;
	var getDiscount = 0;

	enable_or_disable("salmonBellyCB","salmonBellyTB");
	enable_or_disable("roastBeefCB","roastBeefTB");
	enable_or_disable("tboneSteakCB","tboneSteakTB");
	enable_or_disable("ribeyeSteakCB","ribeyeSteakTB");
	enable_or_disable("wagyuBeefCB","wagyuBeefTB");
	
	$("#closeButton").click(function() {
		$("#receipt").fadeOut(2000);
		$("#orderForm").fadeIn(2000);
	});
	
	function getAddons(addonsID,addonsPrice) {
		if($("#"+addonsID).is(":checked")) {
			return addonsPrice;
		}else {
			return 0;
		}
	}
			
	function getTotal(qty,price) {
		return (qty * price);
	}
	
	function getQTY(id) {
		return $("#"+id).val();
	}
	
	function totalQTY() {
		
		var a,b,c,d,e;
		
		if(getQTY("salmonBellyTB") > 0) {
			a = parseInt(getQTY("salmonBellyTB"));
		}else {
			a = 0
		}
		if(getQTY("roastBeefTB") > 0) {
			b = parseInt(getQTY("roastBeefTB"));
		}else {
			b = 0;
		}
		if(getQTY("tboneSteakTB") > 0) {
			c = parseInt(getQTY("tboneSteakTB"));
		}else {
			c = 0;
		}
		if(getQTY("ribeyeSteakTB") > 0) {
			d = parseInt(getQTY("ribeyeSteakTB"));
		}else {
			d = 0;
		}
		if(getQTY("wagyuBeefTB") > 0){
			e = parseInt(getQTY("wagyuBeefTB"));
		}else {
			e = 0;
		}
		return (a + b + c + d + e);
	}
	
	function getDiscount(total,disc) {
		return (total * disc);
	}
	
	function show(order,price){
		
		if(getQTY(order+"TB") > 0) {
			$("#"+order+"Row").show();
			$("#"+order+"_output").html( "Php "+getTotal(getQTY(order+"TB"),price)  );
			total += parseInt(getTotal(getQTY(order+"TB"),price));
		}else { 
			$("#"+order+"Row").hide();
		}
	
	
	}
	
	function enable_or_disable(checkBox,textBox) {
	$("#"+checkBox).on("change",function(){	
		if($(this).is(":checked")) {
			$("#"+textBox).attr("placeholder","Quantity");
			$("#"+textBox).prop("disabled",false);
		}else {
			$("#"+textBox).attr("placeholder","");
			$("#"+textBox).prop("disabled",true);
			$("#"+textBox).val("");
		}	
	})
	}
	
	function addons(id,qty,price) {
		
		if(getAddons(id,price) > 0) {
		$("#"+id+"Row").show();
		$("#"+id+"_output").html("Php "+price+" x "+qty+" pcs = <b>Php "+(qty*price)+"</b>");
		total += parseInt(qty*price);
		}else {  }
		
	}
	
	function discount(id,disc,totalWithNoDiscount) {
		if(getAddons(id,disc) > 0) {
		$("#"+id+"Row").show();
		$("#"+id+"_output").html(totalWithNoDiscount * disc);
		getDiscount = (totalWithNoDiscount * disc);
		}else { }		
	}
	
	function grandTotal(totalz,disc) {
		if(totalz > 0) {
		$("#gtRow").show();
		$("#grandTotal_output").html((totalz - disc));
		}else { }
	}
	function checker(row,input,output,error) {
		if($("#"+input).val() != "") {
			$("#"+row).show();
			$("#"+output).html($("#"+input).val());
			$("#orderForm").fadeOut(2000);
			$("#receipt").fadeIn(2000);
		}else { 
			$("#"+input).css("border","1px solid red");
			$("#"+error).show();
		}
	}
	
	function number(input,row) {
		if($("#"+input).val() != "") {
			$("#"+row).show();
		}else {
			$("#"+row).hide();
		}
	}
			
	
	$("#billButton").click(function(){
		checker("customerNameRow","customerName_input","customerName_output","requiredName");
		number("customerNumber_input","customerNumberRow");
		//checker("customerNumberRow","customerNumber_input","customerNumber_output","requiredContact");
		//$("#customerName_output").html($("#customerName_input").val());
		$("#customerNumber_output").html($("#customerNumber_input").val());
		show("salmonBelly",salmonBellyPrice);
		show("roastBeef",roastBeefPrice);
		show("tboneSteak",tboneSteakPrice);
		show("ribeyeSteak",ribeyeSteakPrice);
		show("wagyuBeef",wagyuBeefPrice);
		addons("rice",totalQTY(),ricePrice);
		addons("drinks",totalQTY(),drinksPrice);
		discount("seniorCitizen",senior,total);
		discount("loyalty",loyalty,total);
		discount("birthday",bday,total);
		grandTotal(total,getDiscount);	
			total = 0; //zero kc kpg nag click aq ng sunod sunod nag iincrement sya kea nireset q sa 0
			getDiscount = 0; //zero kc kpg nag click aq ng sunod sunod nag iincrement sya kea nireset q sa 0
		
	});
	
	
	
});