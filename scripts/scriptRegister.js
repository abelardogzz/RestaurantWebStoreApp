$(document).ready(function(){

	// Cancel Button
	//--------------------------------------------------------------
	$("#CancelBtn").on("click",function(){
		window.location.replace("LoginIndex.php");
	});
	//--------------------------------------------------------------

	// Register Button
	//--------------------------------------------------------------
	$("#RegistrationBtn").on("click",function(){
		var logged = true;
		var $userfirstname = $("#userFirstName");
		var $userlastname = $("#userLastName");
		var $username = $("#userName");
		var $userEmail = $("#userEmail");
		var $userPass = $("#userPassword");
		var $userPassCon = $("#userPasswordConfirmation");
		var $userAddress= $("#addressBox");

		if($userfirstname.val() == ""){
			$("#errorLabelUserFirstName").text("First Name Missing");
			logged = false;
		}
		else{
			$("#errorLabelUserFirstName").text("");
		}

		if($userlastname.val() == ""){
			$("#errorLabelUserLastName").text("Last Name Missing");
			logged = false;
		}
		else{
			$("#errorLabelUserLastName").text("");
		}

		if($username.val() == ""){
			$("#errorLabelUserName").text("Username Missing"); 
			logged = false;
		}
		else{
			$("#errorLabelUserName").text("");
		}

		if($userEmail.val() == ""){
			$("#errorLabelUserEmail").text("Email Missing");
			logged = false;
		}
		else{
			$("#errorLabelUserEmail").text("");
		}

		if($userPass.val() == ""){
			$("#errorLabelUserPass").text("Password Missing");
			logged = false;
		}
		else{
			$("#errorLabelUserPass").text("");
		}

		if($userPass.val() != $userPassCon.val()){
			$("#errorLabelUserPassConfi").text("Passwords don't match");
			logged = false;
		}
		else if($userPassCon.val() == ""){
			$("#errorLabelUserPassConfi").text("Please Confirm Password");
			logged = false;
		}
		else{
			$("#errorLabelUserPassConfi").text("");
		}

		if ($userAddress.val() == ""){
			$("#errorLabelAddress").text("Address Missing");
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
                    alert("Registration Complete. Welcome!");
                    //alert(jsonResponse.message);
                    window.location.replace("PrivateHome.php");
                },
                error : function(errorMessage){
                    alert("ERROR");
                    console.log(errorMessage);
                    //alert(errorMessage.responseText);
                    alert(errorMessage.statusText);
                }
            });
		}
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