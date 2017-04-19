$(document).ready(function(){

	$("#CancelBtn").on("click",function(){
		window.location.replace("LoginIndex.php");
	});

	$("#RegistrationBtn").on("click",function(){
		var logged = true;
		var $userfirstname = $("#userFirstName");
		if($userfirstname.val() == ""){
			$("#errorLabelUserFirstName").text("User First Name pls");
			logged = false;
		}
		else{
			$("#errorLabelUserFirstName").text("");
		}
		var $userlastname = $("#userLastName");
		if($userlastname.val() == ""){
			$("#errorLabelUserLastName").text("User Last Name pls");
			logged = false;
		}
		else{
			$("#errorLabelUserLastName").text("");
		}

		var $username = $("#userName");
		if($username.val() == ""){
			$("#errorLabelUserName").text("User Name pls"); 
			logged = false;
		}
		else{
			$("#errorLabelUserName").text("");
		}

		var $userEmail = $("#userEmail");
		if($userEmail.val() == ""){
			$("#errorLabelUserEmail").text("Email pls");
			logged = false;
		}
		else{
			$("#errorLabelUserEmail").text("");
		}

		var $userPass = $("#userPassword");
		if($userPass.val() == ""){
			$("#errorLabelUserPass").text("Password pls");
			logged = false;
		}
		else{
			$("#errorLabelUserPass").text("");
		}

		var $userPassCon = $("#userPasswordConfirmation");
		if($userPass.val() != $userPassCon.val()){
			$("#errorLabelUserPassConfi").text("password dont match");
			logged = false;
		}
		else if($userPassCon.val() == ""){
			$("#errorLabelUserPassConfi").text("PassWord confirmation needed");
			logged = false;
		}
		else{
			$("#errorLabelUserPassConfi").text("");
		}

		var $userAddress= $("#addressBox");
		if ($userAddress.val() == ""){
			$("#errorLabelAddress").text("Address pls");
			logged = false;
		}
		else{
			$("#errorLabelAddress").text("");	
		}
		

		
		if(logged){
			//window.location.replace("home.html");
			var jsonToSend ={
				"action" : "REGISTER",
                "firstName" : $userfirstname.val(),
                "lastName" : $userlastname.val(),
                "username" : $username.val(),
                "email" : $userEmail.val(),
                "userPassword": $userPass.val(),
                "address" : $userAddress.val()
            };

            $.ajax({
                url : "data/applicationLayer.php",
                type: "POST",
                data: jsonToSend, //Data to send to the service
                datatype : "json",
                contentType : "application/x-www-form-urlencoded", //Forces the content type to json

                success : function(jsonResponse){
                    alert("You are Registered!");
                    alert(jsonResponse.message);
                    //alert(jsonResponse);
                    //alert(jsonResponse.fName + " " + jsonResponse.lName);
                    window.location.replace("PrivateHome.php");
                },
                error : function(errorMessage){
                    alert("ERROR ");
                    console.log(errorMessage);
                    //alert(errorMessage.responseText);
                    alert(errorMessage.statusText);
                }

            });





		}
	});











});