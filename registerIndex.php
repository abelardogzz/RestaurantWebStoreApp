<?php
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			Miramar
		</title>
		<meta charset="UTF-8" />
		<link href="CSS/style.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="scripts/jquery.js"></script>
    	<script type="text/javascript" src="scripts/scriptRegister.js"></script>
	</head>	
	<body>
	<div style="text-align: center;">
		<span>
			<h1>Restaurant Store Application</h1>
			<div class = "images">
				<img id="logo" src="images/miramar.png"/>
			</div>
		</span>
	</div>
	<h1>Register</h1>
		<ul id="menu">
			<li id="HomePage"> Home Page</li>
			<li id="MenuPage"> Menu </li>
			<li id="ContactPage"> Contact Us </li>
			<li id="LoginPage"> Login/Registration </li>
			
		</ul>
          
		<div style="text-align: center;">          
			<fieldset>
				<p>First Name</p>
				<input id="userFirstName" class="formElement" type="text">
				<br/>
				<span id="errorLabelUserFirstName"></span>
				<br/>
				<br/>

              	<p>Last Name</p>
				<input id="userLastName" class="formElement" type="text" />
				<br/>
				<span id="errorLabelUserLastName"></span>
				<br/>
				<br/>

               <p>Username</p>
				<input id="userName" class="formElement" type="text" />
				<br/>
				<span id="errorLabelUserName"></span>
				<br/>
				<br/>

				<p>Email</p>
				<input id="userEmail" class="formElement" type="text"/>
				<br/>
				<span id="errorLabelUserEmail"></span>
				<br/>
				<br/>

				<p>Password</p>
				<input id="userPassword" class="formElement" type="password"/>
				<br/>
				<span id="errorLabelUserPass"></span>
				<br/>
				<br/>

				<p>Password Confirmation</p>
				<input id="userPasswordConfirmation" class="formElement" type="password"/>
				<br/>
				<span id="errorLabelUserPassConfi"></span>
				<br/>
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