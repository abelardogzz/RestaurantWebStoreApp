 
<!DOCTYPE html>
<html>
	<head>
		<title>
			Miramar
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
			<div class = "images">
				<img id="logo" src="images/miramar.png"/>
			</div>
		</span>
	</div>

	<h1>Login</h1>
		<ul id="menu">
			<li id="HomePage"> Home Page</li>
			<li id="MenuPage"> Menu </li>
			<li id="ContactPage"> Contact Restaurant </li>
			<li id="LoginPage"> Login/Register </li>
			
		</ul>
		<div style="text-align: center;">
			<fieldset>
				
				<p>Username</p>
				<input id="userName" class="formElement" type="text" value= 

				/>
				<br/>
				<span id="errorLabelUserName"> </span>
				<br/>

				<p>Password</p>
				<input id="userPassword" class="formElement" type="password"/>
				<br/>
				<span id="errorLabelUserPass"> </span>
				<p>
				<br/>

				<input id="RememberMe" type="checkbox" name="rememberme" value="1" />Remember Me</p>
				<br/>
				
				<input id="LoginBtn" type="submit" value="Login"/>	
				<input id="RegistrationBtn" type="submit" value="Register"/>	
			</fieldset>
		</div>
		<span id="idWrongCredentials" class="idWrongCredentials">
			Wrong Credentials
		</span>
		
	
	</body>	
</html>