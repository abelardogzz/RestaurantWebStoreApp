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
		<script type="text/javascript" src="scripts/scriptContact.js" ></script>
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

		<h1>Contact</h1>
		<ul id="menu">
			<li id="PrivateHomePage"> Home Page</li>
			<li id="PrivateMenuPage"> Menu </li>
			<li id="ProfilePage"> Profile </li>
			
		</ul>


		<div id="ContactSpace">
			<h2>Contact Information</h2>
			<div  style="text-align: center;">
				<p>
					<h3> Name </h3>
					Miramar Mariscos & Grill
					</br>
					</br>
					<h3> Address </h3>
					Hidalgo 135 Ote, Monterrey, NL
					</br>
					</br>
					<h3> Telephone </h3>
					(81) 83 45 51 79
					</br>
					</br>
					<h3> Service Hours </h3>
					8:00 am -- 8:00 pm
					</br>
				</p>
			</div>
		</div>
	</body>
</html>
