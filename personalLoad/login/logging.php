<?PHP
require("../config.php");
require("../openid.php");
$communityid = $_SESSION['steamid'];

//Community ID
	//Connect to our database
	$connect = mysqli_connect($host,$user,$pass,$dbname);
	//Get our users redirect url
	$communityid = mysqli_real_escape_string($connect, $communityid);
	$data = mysqli_query($connect, "SELECT * FROM `users` WHERE `steamid` = '$communityid' LIMIT 0, 1");	
	//If redirecturl is empty abandon redirect continue with the rest of the script
	$playerarray = mysqli_fetch_array( $data);
	$player_steamid = $playerarray['steamid'];
	
	if ($player_steamid == ""){
		#insert data!
		$new_user = mysqli_query($connect, "INSERT into users (`steamid`, `youtube_enabled`, `redirect_enabled`) VALUES ('$communityid', '0', '0')");
		header('Location: ' . $home . "account/" . '');
	}
	else{
	header('Location: ' . $home . "account/" . '');
	}
	
?>