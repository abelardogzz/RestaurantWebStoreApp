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
		//header("location: LoginIndex.php");
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Miramar Home</title>
		<meta charset="UTF-8" />
		<link href="CSS/style.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="scripts/jquery.js" ></script>
		<script type="text/javascript" src="scripts/scriptHome.js" ></script>
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

		<h1>Home Page</h1>
		<ul id="menu">
			<li id="PrivateMenuPage"> Menu </li>
			<li id="PrivateContactPage"> Contact Us </li>
			<li id="ProfilePage"> Profile </li>
		</ul>


		<div id="PromotionsSpace">
			<h2>PROMOTIONS SPACE</h2>
			<ul id="PromoList">
				
			</ul>
		</div>




	</body>

	

</html>
