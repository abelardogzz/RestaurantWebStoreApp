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
		<script type="text/javascript" src="scripts/scriptMenu.js" ></script>
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

		<h1>Menu</h1>
		<ul id="menu">
			<li id="PrivateHomePage"> Home Page</li>
			<li id="PrivateContactPage"> Contact Us </li>
			<li id="ProfilePage"> Profile </li>
			
		</ul>


		<div id="MenuList">
			<h2>Restuarant Food Options</h2>
			<div >
				<ul id="FoodOptions">

				</ul>
			</div>
			
		</div>

		<div id="MenuListSearch">
			<h2>Search Food Options</h2>
			<div >
				<p> Plate Search : 
					<input id="FoodSearchBox" type="text"> </input>
					<input id="PrivateFoodSearchbtn" type="submit" value="Find"/>		
				</p>
				<ul id="SearchFoodOptions">

				</ul>
			</div>
		</div>
	</body>
</html>
