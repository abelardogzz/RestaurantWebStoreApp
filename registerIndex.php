<?php


?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			Registration The Jammer
		</title>
		<meta charset="UTF-8" />
		<link href="CSS/style.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="scripts/jquery.js"></script>
    	<script type="text/javascript" src="scripts/scriptRegister.js"></script>
	</head>	
	<body>
	<div style="text-align: center;">
		<span>
			<h1>The Jammer</h1>
			<br/>
			<img id="logo" src="images/default.png"  />
			<p>Slogan**</p>
		</span>
	</div>
	<h1>Register</h1>
          
		<div>          
			<fieldset>
				<p>First Name</p>
				<input id="userFirstName" class="formElement" type="text">
				<span id="errorLabelUserFirstName"></span>
				<br/>
              	<p>Last Name</p>
				<input id="userLastName" class="formElement" type="text" />
				<span id="errorLabelUserLastName"></span>
				<br/>
               <p>Username</p>
				<input id="userName" class="formElement" type="text" />
				<span id="errorLabelUserName"></span>
				<br/>
				<p>Email</p>
				<input id="userEmail" class="formElement" type="text"/>
				<span id="errorLabelUserEmail"></span>
				<br/>
				<p>Password</p>
				<input id="userPassword" class="formElement" type="password"/>
				<span id="errorLabelUserPass"></span>
				<br/>
				<p>Password Confirmation</p>
				<input id="userPasswordConfirmation" class="formElement" type="password"/>
				<span id="errorLabelUserPassConfi"></span>
				<br/>
				<p>Address</p>
				<input id="addressBox" class="formElement" type="textbox"/>
				<span id="errorLabelAddress"></span>
				<br/><br/>
				

				<input id="RegistrationBtn" type="submit" value="Register"/>
				<input id="CancelBtn" type="submit" value="Cancel"/>
			</fieldset>
		</div>
		<span id="idWrongCredentials" class="idWrongCredentials">
			Wrong Credentials or missing information
		</span>

		
	</body>	
</html>