<?php

header('Content-type: application/json');
require_once __DIR__ . '/dataLayer.php';

$action = $_POST["action"];

switch($action){
	case "LOGIN" : loginFunction();
					break;
	case "REGISTER" : RegistrationFunction();
					break;
	case "LOADHOME" : HomeService();
					break;

	case "LOADMENU" : MenuService();
					break;

	case "LOADPROFILE" : ProfileSerivce();
					break;
	case "LOGOUT" : LogoutService();
					break;

	//case "COMMENTING" : PostComment();
	//				break;

	case "SEARCHFRIEND" : SearchFriend();
					break;
	case "SEARCHFOOD" : SearchFood();
					break;

	case "SENDFRIENDREQUEST" : SendFriendRequest();
					break;
	case "LOADFRIENDREQUESTS" : LoadFriendRequests();
					break;
	case "ACCEPTFRIENDREQUEST" : AcceptFriendRequest();
					break;
	case "REJECTFRIENDREQUEST" : RejectFriendRequest();
					break;
	case "LOADFRIENDLIST" : LoadFriendList();
					break;

	case "LOADUSERORDERS" : LoadUserOrders();
					break;
	case "PLACEORDER" : PlaceOrder();
					break;

}

function loginFunction(){
	$userName = $_POST["username"];
	$userPassword = $_POST["userPassword"];
	$remember = $_POST["rememberMe"];

	$result = attemptLogin($userName,$remember);
 //echo "Haleloo";
	if ($result["status"] == "SUCCESS"){
		//No encryption defined
		//$Password = decryptPassword($result["password"]);
		$Password = $result["password"];
 // echo $Password;
		if ($userPassword === $Password) {
			echo json_encode(array("message" => "Login Successful"));
		}

	}	
	else{
		header('HTTP/1.1 500' . $result["status"]);
		die($result["status"]);
	}	
}



function RegistrationFunction(){
	$FName = $_POST['firstName'];
	$LName = $_POST['lastName'];
	$userName = $_POST['username'];
	$Email = $_POST['email'];
	$Address = $_POST['address'];

	//No encryption implemented
	//$userPassword = encryptPassword();
	$userPassword = $_POST['userPassword'];

	$result = attemptRegistration($FName,$LName,$userName,$Email,$userPassword,$Address);

	if ($result["status"] == "SUCCESS"){
		echo json_encode(array("message" => "Registration Successful"));
	}	
	else{
		header('HTTP/1.1 500' . $result["status"]);
		die($result["status"]);
	}

}
/*
function HomeService(){
	$username = $_POST['username'];

	$result = attemptHomeService($username);

	//$comentario = $result["comments"];


	if ($result["status"] == "SUCCESS"){
		echo json_encode($result["comments"]);
		//echo json_encode(array($comentario));
	}	
	else{
		header('HTTP/1.1 500' . $result["status"]);
		die($result["status"]);
	}
}*/
function MenuService(){

	$result = attemptMenuService();

	//$comentario = $result["comments"];


	if ($result["status"] == "SUCCESS"){
		echo json_encode($result["plates"]);
		//echo json_encode(array($comentario));
	}	
	else{
		header('HTTP/1.1 500' . $result["status"]);
		die($result["status"]);
	}
}

function ProfileSerivce(){
	session_start();
	
	$username = $_SESSION["user"];

	$result = attemptProfileService($username);

	//echo $results["profile"]; 
	if ($result["status"] == "SUCCESS"){

		echo json_encode($result["profile"]);
	}	
	else{
		header('HTTP/1.1 500' . $result["status"]);
		die($result["status"]);
	}


}

function LogoutService(){
	$result = attemptLogout();

	if ($result["status"] == "SUCCESS"){

		echo json_encode(array("message" => "Logout Successful"));
	}	
	else{
		header('HTTP/1.1 500' . $result["status"]);
		die($result["status"]);
	}
}

/*
function PostComment(){
	session_start();
	if (isset($_SESSION["Activity"]) && (time() - $_SESSION["Activity"] < 1800)){
		$userfName = $_SESSION["fName"] ;
		$userlName = $_SESSION["lName"] ;
		$username = $_SESSION["user"] ;
		$useremail = $_SESSION["email"] ;
	}
	else{
		echo json_encode(array("message" => "Session timeout"));
	}

	$comment = $_POST["comment"];
	//echo $userfName.$userlName.$username.$useremail.$comment;
	$result = attemptPostComment($username,$userfName,$userlName,$useremail,$comment);
	//echo $result["status"];
	//echo $result["comment"];

	if( $result["status"] == "SUCCESS"){
		//echo $result;
		echo json_encode($result);
	}
	else{
		header('HTTP/1.1 500' . $result["status"]);
		die($result["status"]);
	}
}
*/
/*
function SearchFriend(){
	
	
	$friend2find = $_POST["friend"];


	$result = attemptFriendSearch($friend2find);


	if ($result["status"] == "SUCCESS"){

		echo json_encode($result["friend"]);
	}	
	else{
		header('HTTP/1.1 500' . $result["status"]);
		die($result["status"]);
	}
}*/
function SearchFood(){
	$food2find = $_POST["food"];


	$result = attemptFoodSearch($food2find);


	if ($result["status"] == "SUCCESS"){

		echo json_encode($result["food"]);
	}
	elseif ($result["status"] == "PLATE NOT FOUND") {
		echo json_encode($result);
	}	
	else{
		header('HTTP/1.1 500' . $result["status"]);
		die($result["status"]);
	}
}

function SendFriendRequest(){

	session_start();
	
	$username = $_SESSION["user"];
	$newfriend = $_POST["newfriend"];

	$result = attemptNewFriendRequest($username,$newfriend);

	if ($result["status"] == "SUCCESS"){

		echo json_encode(array("message" => "Request Sent"));
	}	
	else{
		header('HTTP/1.1 500' . $result["status"]);
		die($result["status"]);
	}


}

function LoadFriendRequests(){

	session_start();
	
	$username = $_SESSION["user"];
	$result = attemptLoadFriendRequests($username);

	if ($result["status"] == "SUCCESS"){

		echo json_encode($result["friend"]);
	}
	elseif ($result["status"] == "REQUEST NOT FOUND") {
			echo json_encode(array("message" => "No Request Found"));
	}	
	else{
		header('HTTP/1.1 500' . $result["status"]);
		die($result["status"]);
	}
}

function AcceptFriendRequest(){
	session_start();
	
	$username = $_SESSION["user"];
	$newfriend = $_POST["newfriend"];

	$result = attmptAcceptFriendRequest($username,$newfriend);

	if ($result["status"] == "SUCCESS"){

		echo json_encode(array("message" => "Request ACCEPTED"));
	}	
	else{
		header('HTTP/1.1 500' . $result["status"]);
		die($result["status"]);
	}


}

function RejectFriendRequest(){
	session_start();
	
	$username = $_SESSION["user"];
	$newfriend = $_POST["newfriend"];

	$result = attmptRejectFriendRequest($username,$newfriend);

	if ($result["status"] == "SUCCESS"){

		echo json_encode(array("message" => "Request REJECTED"));
	}	
	else{
		header('HTTP/1.1 500' . $result["status"]);
		die($result["status"]);
	}
}

function LoadFriendList(){
	session_start();
	
	$username = $_SESSION["user"];

	$result = attemptLoadFriendList($username);

	if ($result["status"] == "SUCCESS"){

		echo json_encode($result["friendships"]);
	}	
	else{
		header('HTTP/1.1 500' . $result["status"]);
		die($result["status"]);
	}

}

function LoadUserOrders(){
	session_start();
	
	$username = $_SESSION["user"];

	$result = attemptLoadUserOrders($username);

	if ($result["status"] == "SUCCESS"){

		echo json_encode($result["orders"]);
	}	
	else{
		header('HTTP/1.1 500' . $result["status"]);
		die($result["status"]);
	}	
}

function PlaceOrder(){
	session_start();

	$username = $_SESSION["user"];
	$address = $_SESSION["address"];
	$totalpayment = $_POST["totalpayment"];
	$plates = $_POST["plates"];
	echo count($plates);

	$result = attemptPlaceOrder($username,$address,$totalpayment,$plates);
	
	for ($i=0; $i < count($plates); $i++) { 
		
	}

	if ($result["status"] == "SUCCESS"){

		echo json_encode($result["orders"]);
	}	
	else{
		header('HTTP/1.1 500' . $result["status"]);
		die($result["status"]);
	}
}

# Action to encrypt the password of the user
function encryptPassword()
{
	$userPassword = $_POST['userPassword'];

    $key = pack('H*', "bcb04b7e103a05afe34763051cef08bc55abe029fdebae5e1d417e2ffb2a00a3");
    $key_size =  strlen($key);
    
    $plaintext = $userPassword;

    $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    
    $ciphertext = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $plaintext, MCRYPT_MODE_CBC, $iv);
    $ciphertext = $iv . $ciphertext;
    
    $userPassword = base64_encode($ciphertext);

    return $userPassword;
}

#Action to decrypt the password of the user
function decryptPassword($password)
{
	$key = pack('H*', "bcb04b7e103a05afe34763051cef08bc55abe029fdebae5e1d417e2ffb2a00a3");
    
    $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
	
    $ciphertext_dec = base64_decode($password);
    $iv_dec = substr($ciphertext_dec, 0, $iv_size);
    $ciphertext_dec = substr($ciphertext_dec, $iv_size);

    $password = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, $ciphertext_dec, MCRYPT_MODE_CBC, $iv_dec);
   	
   	
   	$count = 0;
   	$length = strlen($password);

    for ($i = $length - 1; $i >= 0; $i --)
    {
    	if (ord($password{$i}) === 0)
    	{
    		$count ++;
    	}
    }

    $password = substr($password, 0,  $length - $count); 

    return $password;
}




?>