$(document).ready(function(){

    // Login Button
    //--------------------------------------------------------------
	$("#LoginBtn").on("click",function(){
		var $username = $("#userName");

		if($username.val() == ""){
			$("#errorLabelUserName").text("Username Missing");
		}
		else{
			$("#errorLabelUserName").text("");
		}

		var $userPass = $("#userPassword");
		if($userPass.val() == ""){
			$("#errorLabelUserPass").text("Password Missing");
		}
		else{
			$("#errorLabelUserPass").text("");
		}

		if($username.val() != "" && $userPass.val() != ""){

            // Variable to send to the service taken in POST
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
                    window.location.replace("PrivateHome.php");
                },
                error : function(errorMessage){
                	alert("LOGIN ERROR");
                    alert(errorMessage.statusText);  
                }
            });
		}
	});
    //--------------------------------------------------------------

    // Registration Button
    //--------------------------------------------------------------
	$("#RegistrationBtn").on("click",function(){
		window.location.replace("registerIndex.php");
	});
    //--------------------------------------------------------------

	// Redirect to Contact/information about restaurant page
    //--------------------------------------------------------------
    $("#HomePage").on("click",function(){
        window.location.replace("PublicHome.php");
    });
    //--------------------------------------------------------------

    // Redirects to Public Menu Page
    //--------------------------------------------------------------
    $("#MenuPage").on("click",function(){
        window.location.replace("PublicMenuPage.php");
    });
    //--------------------------------------------------------------

    // Redirect to Contact/information about restautant page
    //--------------------------------------------------------------
    $("#ContactPage").on("click",function(){
        window.location.replace("Contact.php");
    });
    //--------------------------------------------------------------
});