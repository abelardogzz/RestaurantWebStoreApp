$(document).ready(function(){

	$("#LoginBtn").on("click",function(){
		var $username = $("#userName");
		if($username.val() == ""){
			$("#errorLabelUserName").text("UserName pls");
		}
		else{
			$("#errorLabelUserName").text("");
		}

		var $userPass = $("#userPassword");
		if($userPass.val() == ""){
			$("#errorLabelUserPass").text("password pls");
		}
		else{
			$("#errorLabelUserPass").text("");
		}

		if($username.val() != "" && $userPass.val() != ""){
			//Variable spara enviar al servicio que se toman en POST
			var jsonToSend ={
				"action" : "LOGIN",
                "username" : $username.val(),
                "userPassword": $userPass.val(),
                "rememberMe" : $("#RememberMe").is(":checked")
            };

            $.ajax({
                url : "data/applicationLayer.php",
                type: "POST",
                data: jsonToSend, //Data to send to the service
                datatype : "json",
                contentType : "application/x-www-form-urlencoded", //Forces the content type to json

                success : function(jsonResponse){
                	alert(jsonResponse.message)
                    //alert("Welcome " +jsonResponse.fName + " " + jsonResponse.lName);
                    window.location.replace("home.php");
                },
                error : function(errorMessage){
                	alert("ERROR EN LLOGIN");
                	
                    alert(errorMessage.statusText);
                   
                }

            });


		}

	});


	$("#RegistrationBtn").on("click",function(){
		window.location.replace("registerIndex.php");

	});








});