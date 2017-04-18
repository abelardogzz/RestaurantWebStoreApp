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
		<title>Home</title>
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
				<p><i>"Connecting and sharing with people since 2017"</i></p>
			</span>
		</div>

		<h2>HOME</h2>
		<ul id="menu">
			<li> HOME</li>
			<li id="ProfilePage"> Profile </li>
			<li> About Site</li>
			<li id="FriendsPage"> Friends</li>
			<li> Contact</li>
			<li> copyright</li>
			
		</ul>

		<div>
			<h3>Welcome <?php echo $userfName." ".$userlName; ?>  </h3>
		</div>

		<div id="CommentsFeed">
			<h1>Comments</h1>
			<ul id="CommentList">
				
			</ul>
		</div>

		<div>
			<h4>Add a comment</h4>
			<input id="CommentBox" type="text"> </input>
			<input id="AddCommbtn" type="submit" value="Add Comment"/>
		</div>

		<div>
			<input id="Logoutbtn" type="submit" value="Logout"/>
		</div>

	</body>

	

</html>
