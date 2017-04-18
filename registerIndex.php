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
			<img id="logo" src="images/jammer_logo.png"  />
			<p>Connecting and sharing with people since 2017</p>
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
				<p>Country</p>
				<select id="CountrySelect">
					<option value="0"> Select a country... </option>
					<option value="1"> Mexico </option>
					<option value="2"> USA </option>
                   	<option value="3"> Australia  </option>
                  	<option value="4"> Egypt  </option>
                  	<option value="5"> South Korea </option>
                  	<option value="6">  Canada</option>
                  	<option value="7"> Netherlands </option>
                  	<option value="8"> Spain </option>
                  	<option value="9"> France </option>
                  	<option value="10"> Guatemala </option>
                  	<option value="11"> Argentina </option>
                  	<option value="12"> Italy  </option>
                  	<option value="13"> Lithuania </option>
                  	<option value="14"> Brazil </option>
                  	<option value="15"> Colombia </option>
                  
				</select>
				<span id="errorLabelCountry"></span>
				<br/>
				<p>Gender</p>
				<input id="genderMasculine" type="radio" name="gender" value="M"/> Masculine
				<br/>
				<input id="genderFeminine" type="radio" name="gender" value="F"/> Feminine
				<br/> 
				<span id="errorLabelUserGender"></span>
				<br/>

				<input id="RegistrationBtn" type="submit" value="Register"/>
				<input id="CancelBtn" type="submit" value="Cancel"/>
			</fieldset>
		</div>
		<span id="idWrongCredentials" class="idWrongCredentials">
			Wrong Credentials or missing information
		</span>

		
	</body>	
</html>