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
		<script type="text/javascript" src="scripts/scriptHome.js" ></script>
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

		<h2>Home Page</h2>
		<ul id="menu">
			<li> Home Page</li>
			<li id=""> Menu </li>
			<li> About Restaurant </li>
			<li id=""> Login </li>
			<li> Registration </li>
			<li> copyright</li>
			
		</ul>


		<div id="PromotionsSpace">
			<h1>PROMOTIONS SPACE</h1>
			<ul id="PromoList">
				
			</ul>
		</div>

		<div>
			<h4>Add a comment</h4>
			<input id="CommentBox" type="text"> </input>
			<input id="AddCommbtn" type="submit" value="Add Comment"/>
		</div>


	</body>

	

</html>
