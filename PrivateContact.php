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
		//header("location: Loginindex.php");
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
				<br/>
				<img id="logo" src="images/default.png"/>
				<p><i>"Restaurant Slogan"</i></p>
			</span>
		</div>

		<h2>Contact</h2>
		<ul id="menu">
			<li id="PrivateHomePage"> Home Page</li>
			<li id="PrivateMenuPage"> Menu </li>
			<li id="PrivateContactPage"> Contact Restaurant </li>
			<li id="ProfilePage"> Profile </li>
			
		</ul>


		<div id="ContactSpace">
			<h1>Restuarant Contact Information</h1>
			<div  style="text-align: center;">
				<p>
					Name </br>
					Address </br>
					Telephone</br>
					Service Hours</br>
				</p>
			</div>
			
		</div>



	</body>

	

</html>
