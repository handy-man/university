<?PHP
require("../config.php");
require("../openid.php");
$communityid = $_SESSION['steamid'];

if ($_SESSION['steamid'] == ""){
	header('Location: ' . $home . "login/" . '');
}
	//See if the second number in the steamid (the auth server) is 0 or 1. Odd is 1, even is 0
	$authserver = bcsub($communityid, '76561197960265728') & 1;
	//Get the third number of the steamid
	$authid = (bcsub($communityid, '76561197960265728')-$authserver)/2;
	//Concatenate the STEAM_ prefix and the first number, which is always 0, as well as colons with the other two numbers
	$steamid = "STEAM_0:$authserver:$authid";
	$link = file_get_contents('http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=' . $steam_api . '&steamids=' . $communityid . '&format=json');
	$myarray = json_decode($link, true);
	
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
?>

<html>
<head>
    <link rel="stylesheet" href="metro.php"/>
    <meta charset="UTF-8"/>
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>	
	<script>
function emailalert()
{
alert("Please email me for a copy of my CV");
}
</script>
</head>
<body>
    <h1>PersonalLoad - Set your own loading screen</h1>
	<!--
	<div class="sits">
	</div>
	-->
	
<div class="page">

    <div class="newlineHor">
		<a href="#" title="User image" alt="User image">
        <div class="tile yellow">
		<div class="steam"></div>
		<a href="<?PHP echo $home . "index.php?steamid=" . $communityid . ""; ?>" title="Preview loading screen" alt="Preview loading screen">
		<div class="tile green" style="float: left; margin-top: 8px; margin-left: -2px;"><div class="link"></div><div class="title">Preview</div></div>
		</a>
        </div>
		</a>
        <div class="formtile blue">
		<span>
		Youtube music :
		</span>
		</br>
		<form name="input" action="update.php" method="post">
		<select name="yt_status">
		<option value="enabled"<?PHP if ($youtube_enabled == 1){echo "selected";}?>>enabled</option>
		<option value="disabled" <?PHP if ($youtube_enabled == 0){echo "selected";}?>>disabled</option>
		</select>
		</br>
		<span>Youtube source:</span>
		</br>
		<input type="text" name="yt_src" value="<?PHP if ($youtube_src != ""){echo $youtube_src;}?>"><br>
		<label>
		Redirect page:
		</label>
		</br>
		<select id="rp_status" name="rp_status">
		<option value="enabled" <?PHP if ($redirect_enabled == 1){echo "selected";}?>>enabled</option>
		<option value="disabled" <?PHP if ($redirect_enabled == 0){echo "selected";}?>>disabled</option>
		</select>
		</br>
		redirect page source:
		</br>
		<input type="text" name="rp_src" value="<?PHP if ($redirect_src != ""){echo $redirect_src;}?>">
		</br>
		<input type="submit" value="Submit">
		</form>
        </div>
    </div> 
	
	<div class="newlineHor">
	<div class ="LTile green">
	Notes: The redirect overwrites any youtube music that you use.
	Youtube source must be the string of data after the v= as seen on all youtube video's.
	</div>
	</div>
	
	<div class="newlineHor">
	<div class ="LTile red">
	Example: Youtube source = "aHjpOzsQ9YI", this means that youtube music being enabled with that variable as the source will have the following video play as music: <a href="http://www.youtube.com/watch?v=aHjpOzsQ9YI">http://www.youtube.com/watch?v=aHjpOzsQ9YI</a>
	</div>
	</div>

</div>
</body>
</html>