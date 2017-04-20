<?php
	
	function connectionToDataBase(){
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "restaurantDB";

		$conn = new mysqli($servername, $username, $password, $dbname);
		
		if ($conn->connect_error){
			return null;
		}
		else{
			return $conn;
		}
	}

	function attemptLogin($userName,$remember){

		$conn = connectionToDataBase();

		if ($conn != null){
			$sql = "SELECT * FROM Users WHERE username='$userName'";
		
			$result = $conn->query($sql);

			if ($result->num_rows > 0)
			{
				$row = $result->fetch_assoc();
				$conn -> close();
				session_start();
				$_SESSION["fName"] = $row["uFName"];
				$_SESSION["lName"] = $row["uLName"];
				$_SESSION["user"]  = $row["userName"];
				$_SESSION["address"] = $row["uAddress"];

				if($remember){
					setcookie("user",$userName,time()+3600*24*30,"/","",0);
				}

				$_SESSION["Activity"] = time();
				//return array("status" => "SUCCESS","passwrd" => );
				return array("status" => "SUCCESS", "fName" => $row['uFName'], "lName" => $row['uLName'], "password" => $row['uPassword']);


			}
			else{
				$conn -> close();
				return array("status" => "USERNAME NOT FOUND");
			}
		}else{
			$conn -> close();
			return array("status" => "CONNECTION WITH DB WENT WRONG");
		}
	}


	function attemptRegistration($FName,$LName,$userName,$Email,$userPassword,$Address){

		$conn = connectionToDataBase();
		if($conn != null){
			$sqlVerif = "SELECT * FROM Users WHERE username='$userName' ";
			$sqlInsert = "INSERT INTO Users(uFName, uLName, userName, uPassword, uEmail, uAddress)
					VALUES  ('$FName', '$LName', '$userName', '$userPassword','$Email','$Address')";
			//echo $sqlInsert;
			//echo $sqlVerif;

			$res = $conn->query($sqlVerif);
			
			//if ($res->num_rows > 0)
			//if(mysqli_query($conn,$sqlVerif))
			if ($res->num_rows > 0)
			{
				$conn->close();
				return array("status"=>"Username already taken.");
				 //Pre-Prepares a json file with mssg
				//header('HTTP/1.1 409 Conflict, Username already in use please select another one');
			    //die("Username already in use.");
	        	//echo json_encode($res);
			}
			else{
				//mysqli_query($conn,$sql) //True if register inserted succesfully
				if (mysqli_query($conn,$sqlInsert)){
					$conn->close();
					session_start();
					$_SESSION["fName"] = $FName;
					$_SESSION["lName"] = $LName;
					$_SESSION["user"]  = $username;
					$_SESSION["address"] = $Address;

					if($remember){
						setcookie("user",$userName,time()+3600*24*30,"/","",0);
					}

					$_SESSION["Activity"] = time();

					return array("status"=>"SUCCESS");

					//echo json_encode("New record created successfully");
				}
				else 
				{
					$conn->close();
					return array("status"=>"Something went wrong on the server.");
					//header('HTTP/1.1 500 Bad connection, something went wrong while saving your data, please try again later');
				    //die("Error: " . $sql . "\n" . mysqli_error($conn));
				}
			}
		}
		else{
			$conn -> close();
			return array("status" => "CONNECTION WITH DB WENT WRONG");
		}
	}
/*
	function attemptHomeService ($username){
		$conn = connectionToDataBase();

		if ($conn != null){
			
			//$userPassword = $_POST['userPassword'];
			
			$conn ->set_charset('utf8mb4');
			$sql = "SELECT username, fName, lName, email, comment FROM Users U JOIN Comments C JOIN Friends F
					WHERE U.$username = '$userName' AND U.$username = F.$username AND F.$username = C.$username";

			$sql = " SELECT * FROM Comments ";
			$result = $conn->query($sql); 

			//echo $result->num_rows;
			if ($result->num_rows > 0)//Double check
			{
				$comments = array();
				// output data of each row
			    while($row = $result->fetch_assoc()) 
			    {
			    	$response = array('fName' => $row['fname'], 'lName' => $row['lname'], 'username' => $row['username'], 'comment' => $row['comment'], 'email' => $row['email']);   
			    	array_push($comments, $response);
			    	//echo ($response);
				}

			    //echo json_encode($response);
			    //echo json_encode($comments);
			    $conn->close();
			    return array("status" =>  "SUCCESS", "comments" => $comments);
			}

			}else{
				$conn -> close();
				return array("status" => "CONNECTION WITH DB WENT WRONG");
			}	
	}
*/
	function attemptMenuService(){
		$conn = connectionToDataBase();

		if ($conn != null){
			
			//$userPassword = $_POST['userPassword'];
			
			$conn ->set_charset('utf8mb4');

			$sql = " SELECT * FROM Menu ";
			$result = $conn->query($sql); 

			//echo $result->num_rows;
			if ($result->num_rows > 0)//Double check
			{
				$plates = array();
				// output data of each row
			    while($row = $result->fetch_assoc()) 
			    {
			    	//INSERT INTO Menu(mName, mDescription, mPrice)
			    	$response = array('Name' => $row['mName'], 
			    					'description' => $row['mDescription'], 
			    					'price' => $row['mPrice']);   
			    	array_push($plates, $response);
			    	//echo ($response);
				}

			    //echo json_encode($response);
			    //echo json_encode($plates);
			    $conn->close();
			    return array("status" =>  "SUCCESS", "plates" => $plates);
			}

			}else{
				$conn -> close();
				return array("status" => "CONNECTION WITH DB WENT WRONG");
			}		
	}


	function attemptProfileService($username){
		$conn = connectionToDataBase();

		if ($conn != null){
			$conn ->set_charset('utf8mb4');
			//$userName = $_POST['username'];
			//$userPassword = $_POST['userPassword'];
			//PROFILE EXAMPLE 
			$sql = " SELECT * FROM Users WHERE username = '$username' ";
			$result = $conn->query($sql); 

			//echo $result->num_rows;
			if ($result->num_rows > 0)//Double check
			{
				
				// output data of each row
			    while($row = $result->fetch_assoc()) 
			    {
			    	$response = array('fName' => $row['uFName'],
		    	 					'lName' => $row['uLName'],
		    	 					'username' => $row['userName'], 
		    	 					'email' => $row['uEmail'], 
		    	 					'address' => $row['uAddress'] );   
			    	//array_push($comments, $response);
			    	

				}
				//echo ($response['fName']);
			    //echo json_encode($response);
			    $conn-> close();
			    return array("status" => "SUCCESS","profile" => $response);

			    //echo json_encode($result->fetch_assoc());
			}
			else
			{
				$conn -> close();
				return array("status" => "USERNAME NOT FOUND");
		    	//header('HTTP/1.1 406 User not found'); //Pre-Prepares a json file with mssg
		        //die("Wrong credentials provided!"); 
			}
		}else{
				$conn -> close();
				return array("status" => "CONNECTION WITH DB WENT WRONG");
		}
	}


	function attemptLogout(){
		unset($_SESSION["fName"]);
		unset($_SESSION["lName"]);
		unset($_SESSION["user"]);
		unset($_SESSION["email"]);
		unset($_SESSION["Activity"]);
		session_destroy();
		return array("status" => "SUCCESS");
	}


/*
	function attemptPostComment($username,$fName,$lName,$email,$comment){
		$conn = connectionToDataBase();

		if($conn != null){
			$sqlInsert = "INSERT INTO Comments(username, comment, fname, lname, email)
		VALUES  ('$username', '$comment', '$fName','$lName', '$email')";
			
			//mysqli_query($conn,$sql) //True if register inserted succesfully
		//$conn ->set_charset('utf8mb4');
			if (mysqli_query($conn,$sqlInsert)){
				$comm = "<li> 
							$fName $lName <br/>
							<b>User Name: </b> $username <br/>
							Email: $email <br/>
							Comment: $comment
							  </li> ";
				//echo HolaDL.$comm;
				$conn->close();
				return array("status"=>"SUCCESS", "comment" => $comm);

				//echo json_encode("New record created successfully");
			}
			else 
			{
				$conn->close();
				return array("status"=>"Something went wrong on the server.");
				//header('HTTP/1.1 500 Bad connection, something went wrong while saving your data, please try again later');
			    //die("Error: " . $sql . "\n" . mysqli_error($conn));
			}
			
		}
		else{
			$conn -> close();
			return array("status" => "CONNECTION WITH DB WENT WRONG");
		}
	}
*/
/*	function attemptFriendSearch($friend2find){
		$conn = connectionToDataBase();

		if($conn != null){
			$conn ->set_charset('utf8mb4');
			$sqlUsername = " SELECT fName, lName, username,gender,email,country FROM Users WHERE username = '$friend2find' ";
			$sqlEmail = " SELECT fName, lName, username,gender,email,country FROM Users WHERE email = '$friend2find' ";
			$result = $conn->query($sqlUsername); 
			$result2 = $conn->query($sqlEmail); 

			//echo $result->num_rows;
			if ($result->num_rows > 0 || $result2->num_rows > 0)//Double check
			{
				if ($result->num_rows > 0){
					// output data of each row
				    while($row = $result->fetch_assoc()) 
				    {
				    	$response = array('fName' => $row['fName'],
			    	 					'lName' => $row['lName'],
			    	 					'username' => $row['username'], 
			    	 					'gender' => $row['gender'], 
			    	 					'email' => $row['email'], 
			    	 					'country' => $row['country'] );   
				    	//array_push($comments, $response);
					}
				}else{
					while($row = $result2->fetch_assoc()) 
				    {
				    	$response = array('fName' => $row['fName'],
			    	 					'lName' => $row['lName'],
			    	 					'username' => $row['username'], 
			    	 					'gender' => $row['gender'], 
			    	 					'email' => $row['email'], 
			    	 					'country' => $row['country'] );   
				    	//array_push($comments, $response);
					}
				}
			    $conn-> close();
			    return array("status" => "SUCCESS","friend" => $response);

			    //echo json_encode($result->fetch_assoc());
			}
			else
			{
				$conn -> close();
				return array("status" => "USERNAME or EMAIL NOT FOUND");
			}

		}
		else{
			$conn -> close();
			return array("status" => "CONNECTION WITH DB WENT WRONG");
		}
	}*/

	function attemptFoodSearch($food2find){
		$conn = connectionToDataBase();

		if($conn != null){
			$conn ->set_charset('utf8mb4');
			$sqlPlate = " SELECT mName, mDescription, mPrice FROM Menu WHERE mName = '$food2find' ";
			
			$result = $conn->query($sqlPlate); 

			//echo $result->num_rows;
			if ($result->num_rows > 0 )//Double check
			{
				if ($result->num_rows > 0){
					// output data of each row
				    while($row = $result->fetch_assoc()) //CICLO POSIBLEMENTE INNECESARIO JEJEJE
				    {
				    	$response = array('name' => $row['mName'],
			    	 					'description' => $row['mDescription'], 
			    	 					'price' => $row['mPrice'],
			    	 					'status' => "FOUND");   
				    	//array_push($comments, $response);
					}
				}
			    $conn-> close();
			    return array("status" => "SUCCESS","food" => $response);

			    //echo json_encode($result->fetch_assoc());
			}
			else
			{
				$conn -> close();
				return array("status" => "PLATE NOT FOUND");
			}

		}
		else{
			$conn -> close();
			return array("status" => "CONNECTION WITH DB WENT WRONG");
		}
	}
/*
	function attemptNewFriendRequest($username,$newfriend){
		$conn = connectionToDataBase();

		if($conn != null){
			$sqlInsert = "INSERT INTO Friends(username, friend,request, friendship)
					VALUES  ('$username', '$newfriend',FALSE,TRUE),
							('$newfriend', '$username',TRUE,FALSE)";
	
			if (mysqli_query($conn,$sqlInsert)){
				
				//echo HolaDL.$comm;
				$conn->close();
				return array("status"=>"SUCCESS");

				//echo json_encode("New record created successfully");
			}
			else 
			{
				$conn->close();
				return array("status"=>"Something went wrong on the server.");
				//header('HTTP/1.1 500 Bad connection, something went wrong while saving your data, please try again later');
			    //die("Error: " . $sql . "\n" . mysqli_error($conn));
			}

		}
		else{
			$conn -> close();
			return array("status" => "CONNECTION WITH DB WENT WRONG");
		}
	}

	function attemptLoadFriendRequests($username){
		$conn = connectionToDataBase();

		if($conn != null){
			$conn ->set_charset('utf8mb4');
			//$userName = $_POST['username'];
			//$userPassword = $_POST['userPassword'];
			//PROFILE EXAMPLE 
			$sqlUsername = " SELECT username,friend FROM Friends WHERE username = '$username' AND request = TRUE ";
			
			$result = $conn->query($sqlUsername); 

			//echo $result->num_rows;
			if ($result->num_rows > 0)//Double check
			{	
				$row = $result->fetch_assoc();
				$friend2find = $row['friend'];
				$sqlFriend = " SELECT fName, lName, username,gender,email,country FROM Users WHERE username = '$friend2find' ";
				$result = $conn->query($sqlFriend); 
				// output data of each row
			    while($row = $result->fetch_assoc()) 
			    {
			    	$response = array('fName' => $row['fName'],
		    	 					'lName' => $row['lName'],
		    	 					'username' => $row['username'], 
		    	 					'gender' => $row['gender'], 
		    	 					'email' => $row['email'], 
		    	 					'country' => $row['country'] );   
			    	//array_push($comments, $response);
				}
				

			    $conn-> close();
			    return array("status" => "SUCCESS","friend" => $response);

			    //echo json_encode($result->fetch_assoc());
			}
			else
			{
				$conn -> close();
				return array("status" => "REQUEST NOT FOUND");
			}

		}
		else{
			$conn -> close();
			return array("status" => "CONNECTION WITH DB WENT WRONG");
		}
	}


	function attmptAcceptFriendRequest($username,$newfriend){
		$conn = connectionToDataBase();

		if($conn != null){
			
			$sqlAcceptRequest = "UPDATE Friends SET friendship = TRUE 
						WHERE username = '$username' AND friend = '$newfriend'";
			$sqlUpdateRequest = "UPDATE Friends SET request = FALSE 
						WHERE username = '$username' AND friend = '$newfriend'";
	
			if (mysqli_query($conn,$sqlAcceptRequest) && mysqli_query($conn,$sqlUpdateRequest)){
				
				//echo HolaDL.$comm;
				$conn->close();
				return array("status"=>"SUCCESS");

				//echo json_encode("New record created successfully");
			}
			else 
			{
				$conn->close();
				return array("status"=>"Something went wrong on the server.");
				//header('HTTP/1.1 500 Bad connection, something went wrong while saving your data, please try again later');
			    //die("Error: " . $sql . "\n" . mysqli_error($conn));
			}

		}
		else{
			$conn -> close();
			return array("status" => "CONNECTION WITH DB WENT WRONG");
		}
	}


	function attmptRejectFriendRequest($username,$newfriend){
		$conn = connectionToDataBase();

		if($conn != null){
			
			$sqlRejectRequest = "DELETE FROM Friends 
						WHERE username = '$username' AND friend = '$newfriend' " ;
			$sqlDeleteRequest = "DELETE FROM Friends 
						WHERE username = '$newfriend' AND friend = '$username' " ;
	
			if (mysqli_query($conn,$sqlRejectRequest) && mysqli_query($conn,$sqlDeleteRequest)){
				
				//echo HolaDL.$comm;
				$conn->close();
				return array("status"=>"SUCCESS");

				//echo json_encode("New record created successfully");
			}
			else 
			{
				$conn->close();
				return array("status"=>"Something went wrong on the server.");
				//header('HTTP/1.1 500 Bad connection, something went wrong while saving your data, please try again later');
			    //die("Error: " . $sql . "\n" . mysqli_error($conn));
			}

		}
		else{
			$conn -> close();
			return array("status" => "CONNECTION WITH DB WENT WRONG");
		}
	}


	function attemptLoadFriendList($username){
		$conn = connectionToDataBase();

		if ($conn != null){
			
			//$userPassword = $_POST['userPassword'];
			
			$conn ->set_charset('utf8mb4');
			$sql = "SELECT username, fName, lName, email, comment FROM Users U JOIN Comments C JOIN Friends F
					WHERE U.$username = '$userName' AND U.$username = F.$username AND F.$username = C.$username";

			$sql = " SELECT * FROM Friends WHERE username = '$username' ";
			//echo $sql;
			$result = $conn->query($sql); 

			//echo $result->num_rows;
			if ($result->num_rows > 0)//Double check
			{
				$friends = array();
				// output data of each row
			    while($row = $result->fetch_assoc()) 
			    {
			    	//$response = array('fName' => $row['fname'], 'lName' => $row['lname'], 'username' => $row['username'], 'comment' => $row['comment'], 'email' => $row['email']);  
			    	$response = array('userFriend' => $row['friend']);
			    	array_push($friends, $response);
			    	//echo ($response);
				}

			    //echo json_encode($response);
			    //echo json_encode($plates);
			    $conn->close();
			    return array("status" =>  "SUCCESS", "friendships" => $friends);
			}
		}else{
			$conn -> close();
			return array("status" => "CONNECTION WITH DB WENT WRONG");
		}
	}
*/

	function attemptLoadUserOrders($username){
		$conn = connectionToDataBase();

		if ($conn != null){
			
			//$userPassword = $_POST['userPassword'];
			
			$conn ->set_charset('utf8mb4');

			$sql = " SELECT orderID, oTotalPrice, GROUP_CONCAT(oiMenuItem) as items
						FROM orders JOIN orderitems 
						WHERE oUserName = '$username' AND oiID = orderID GROUP BY orderID ";
			//echo $sql;
			$result = $conn->query($sql); 

			//echo $result->num_rows;
			if ($result->num_rows > 0)//Double check
			{
				$orders = array();
				// output data of each row
			    while($row = $result->fetch_assoc()) 
			    {
			    	//$response = array('fName' => $row['fname'], 'lName' => $row['lname'], 'username' => $row['username'], 'comment' => $row['comment'], 'email' => $row['email']);  
			    	//$response = array('userFriend' => $row['friend']);
			    	$response = array('orderID' => $row['orderID'],
			    						'totalprice'=> $row['oTotalPrice'],
			    						'plates' => $row['items']);
			    	array_push($orders, $response);
			    	//echo ($response);
				}

			    //echo json_encode($response);
			    //echo json_encode($plates);
			    $conn->close();
			    return array("status" =>  "SUCCESS", "orders" => $orders);
			}
		}else{
			$conn -> close();
			return array("status" => "CONNECTION WITH DB WENT WRONG");
		}
	}

	function attemptPlaceOrder($username,$address,$totalpayment,$plates){
		$conn = connectionToDataBase();

		if ($conn != null){
			$conn ->set_charset('utf8mb4');

			

			//Insert of order
			$sqlInsert = "INSERT INTO Orders(oUserName, oTotalPrice, oAddress, oToGo) 
						  VALUES  ('$username', '$totalpayment', '$address', TRUE)";
			if (mysqli_query($conn,$sqlInsert)){
				$sqlLast = "SELECT orderID FROM Orders ORDER BY orderID DESC LIMIT 1 ";
				//Get the last order number for managment
				$result = $conn->query($sqlLast); 
				$row = $result->fetch_assoc();
				$OrderNumber = $row['orderID'];
				$names = array_map(create_function('$o', 'return $o->id;'), $plates);
				for ($i=0; $i < count($plates); $i++) {
					$obj = $plates[$i]['name'];
					$sqlInsert = "INSERT INTO OrderItems(oiID, oiMenuItem) 
									VALUES ('$OrderNumber', '$obj')";
					mysqli_query($conn,$sqlInsert);					
				}
			}
				$conn->close();
			    return array("status" =>  "SUCCESS");

		}else{
			$conn -> close();
			return array("status" => "CONNECTION WITH DB WENT WRONG");
		}
	}




?>