<?php
	session_start();
	if (isset($_SESSION["Activity"]) && (time() - $_SESSION["Activity"] < 1800)){
		$userfName = $_SESSION["fName"] ;
		$userlName = $_SESSION["lName"] ;
		//echo $userfName. $userlName;
	}
	else{
		unset($_SESSION["fName"]);
		unset($_SESSION["lName"]);
		unset($_SESSION["Activity"]);
		session_destroy();
		header("location: Loginindex.php");
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Welcome</title>
		<meta charset="UTF-8" />
		<link href="CSS/style.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="scripts/jquery.js" ></script>
		<script type="text/javascript" src="scripts/scriptProfile.js" ></script>
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

		<h1> Profile </h1>
		<ul id="menu">
			<li id="PrivateHomePage"> Home Page</li>
			<li id="PrivateMenuPage"> Menu </li>
			<li id="PrivateContactPage"> Contact Restaurant </li>
			
		</ul>


		<div id="Profile">
			<h2>User Profile Information</h2>
			<div style="text-align: center;">
				<p id="UserProfile">

				</p>
			</div>
			

		</div>
		<div >
			<h2>User Orders Information</h2>
					<input id="LoadOrdersHistorybtn" type="submit" value="Load Orders History"/>		
				<ul id="OrdersHistory">

				</ul>
			</div>

		<div>
			<input id="Logoutbtn" type="submit" value="Logout"/>
		</div>

	</body>

	

</html>
