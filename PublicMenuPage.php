
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
				<br/>
				<img id="logo" src="images/default.png"/>
				<p><i>"Restaurant Slogan"</i></p>
			</span>
		</div>

		<h2>Menu</h2>
		<ul id="menu">
			<li id="HomePage"> Home Page</li>
			<li id="MenuPage"> Menu </li>
			<li id="ContactPage"> Contact Restaurant </li>
			<li id="LoginPage"> Login/Register </li>
			
		</ul>


		<div id="MenuList">
			<h1>Restuarant Food Options</h1>
			<div id="menuList">
				<ul id="FoodOptions">
					<li> <a href="#"> <img src="images/camaronesEmpanizados.jpg"/> </a> </li>
				    <li> <a href="#"> <img src="images/fileteEmpanizado.jpg"/> </a> </li>
				    <li> <a href="#"> <img src="images/mojarraFrita.jpg"/> </a> </li>
				    <li> <a href="#"> <img src="images/coctelCamaron.jpg"/> </a> </li>
				    <li> <a href="#"> <img src="images/ensaladaRegia.jpg"/> </a> </li>
				    <li> <a href="#"> <img src="images/nuggetsPescado.jpg"/> </a> </li>
				    <li> <a href="#"> <img src="images/rebanadaPastel.jpg"/> </a> </li>
				</ul>
			</div>
			
		</div>

		<div id="MenuListSearch">
			<h1>Search Food Options</h1>
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
