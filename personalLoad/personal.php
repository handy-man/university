<?PHP
	require("./config.php");
	require("./openid.php");

	//Community ID
	$communityid = $_GET["steamid"];
	#$communityid = $communityid = $mysqli->real_escape_string($communityid);
	//Connect to our database
	$connect = mysqli_connect($host,$user,$pass,$dbname);
	//Get our users redirect url
	$communityid = mysqli_real_escape_string($connect, $communityid);
	$redirect = mysqli_query($connect, "SELECT * FROM `users` WHERE `steamid` = '$communityid' LIMIT 0, 1");	
	//If redirecturl is empty abandon redirect continue with the rest of the script
	$playerarray = mysqli_fetch_array( $redirect);
	$player_steamid = $playerarray['steamid'];
	$youtube_enabled = $playerarray['youtube_enabled'];
	$youtube_src = $playerarray['youtube_src'];
	$redirect_enabled = $playerarray['redirect_enabled'];
	$redirect_src = $playerarray['redirect_src'];
	
	if ($redirect_enabled == 0){
		#run our youtube sounds
		if ($youtube_enabled == true){
		echo "<object type='hidden' style='height: 0; width: 0'>
			<param name='movie' value='http://www.youtube.com/v/" . $youtube_src . "_3kKxyf6b-U?version=3&autoplay=1&loop=1'>
			<param name='allowFullScreen' value='true'><param name='allowScriptAccess' value='always'><embed src='http://www.youtube.com/v/" . $youtube_src . "?version=3&autoplay=1&loop=1' type='application/x-shockwave-flash' allowfullscreen='true' allowScriptAccess='always' width='1' height='1'>
		</object>";
	}
	}
	else if($redirect_src != ""){
	#redirect our user to the loading screen of our choice
			header('Location: ' . $redirect_src . '');
	}
	else{
	#We haven't got a personal loading screen, do nothing?
	}
	//See if the second number in the steamid (the auth server) is 0 or 1. Odd is 1, even is 0
	$authserver = bcsub($communityid, '76561197960265728') & 1;
	//Get the third number of the steamid
	$authid = (bcsub($communityid, '76561197960265728')-$authserver)/2;
	//Concatenate the STEAM_ prefix and the first number, which is always 0, as well as colons with the other two numbers
	$steamid = "STEAM_0:$authserver:$authid";
	$link = file_get_contents('http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=' . $steam_api . '&steamids=' . $communityid . '&format=json');
	$myarray = json_decode($link, true);
?>
