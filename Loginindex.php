 
<!DOCTYPE html>
<html>
	<head>
		<title>
			Login The Jammer
		</title>
		<meta charset="UTF-8" />
		<link href="CSS/style.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="scripts/jquery.js"></script>
    <script type="text/javascript" src="scripts/scriptLogin.js"></script>
	</head>	
	<body>
	<div style="text-align: center;">
		<span >
			<h1>Restaurant Store Application</h1>
			<br/>
			<img id="logo" src="images/default.png"/>
			<p>*Slogan*</p>
		</span>
	</div>

	<h1>Login</h1>
		
		<div style="text-align: center;">
			<fieldset>
				
				<p>Username</p>
				<input id="userName" class="formElement" type="text" value= <?php if (isset($_COOKIE["user"])){ echo $_COOKIE["user"];} else {echo "";} ?> />
				<br/>
				<span id="errorLabelUserName"> </span>
				<p>Password</p>
				<input id="userPassword" class="formElement" type="password"/>
				<br/>
				<span id="errorLabelUserPass"> </span>
				<p>

				<input id="RememberMe" type="checkbox" name="rememberme" value="1" />Remember Me</p>

				<input id="LoginBtn" type="submit" value="Login"/>	
				<input id="RegistrationBtn" type="submit" value="Register"/>	
			</fieldset>
		</div>
		<span id="idWrongCredentials" class="idWrongCredentials">
			Wrong Credentials
		</span>
		
	
	</body>	
</html>