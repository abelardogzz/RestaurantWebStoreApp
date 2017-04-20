
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
			<li id="HomePage"> Home Page</li>
			<li id="MenuPage"> Menu </li>
			<li id="ContactPage"> Contact Restaurant </li>
			<li id="LoginPage"> Login/Registration </li>
			
		</ul>


		<div id="MenuList">
			<h2>Restaurant Food Options</h2>
			<br/>
			<div id="menuList">
				<ul id="FoodOptions">
				</ul>
			</div>
		</div>

		<div id="MenuListSearch">
			<h2>Search Food Options</h2>
			<div >
				<p> Plate Search : 
					<input id="FoodSearchBox" type="text"> </input>
					<input id="PublicFoodSearchbtn" type="submit" value="Find"/>		
				</p>
				<ul id="SearchFoodOptions">

				</ul>
			</div>
		</div>

	</body>
</html>
