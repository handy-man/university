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
?>

<html>
<head>
    <link rel="stylesheet" href="metro.php"/>
    <meta charset="UTF-8"/>
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript">
	$(".yt_tip").attr('title', 'Youtube source can be found here');
	
	</script>
	
	<script>
function emailalert()
{
alert("Please email me for a copy of my CV");
}
</script>
</head>
<body>
    <h1>PersonalLoad - Set your own loading screen</h1> <h1 style="float: right;">welcome</h1>
	<!--
	<div class="sits">
	</div>
	-->
	
<div class="page">

    <div class="newlineHor">
		<a href="#" title="User image" alt="User image">
        <div class="tile yellow">
		<div class="steam"></div>
		<div class="title"></div>
        </div>
		</a>
        <div class="formtile blue">
		<span>
		Youtube music :
		</span>
		</br>
		<form name="input" action="update.php" method="post">
		<select  name="yt_status">
		<option value="enabled">enabled</option>
		<option value="disabled">disabled</option>
		</select>
		</br>
		<span class="yt_tip">Youtube source:</span>
		</br>
		<input type="text" name="yt_src"><br>
		<label>
		Redirect page:
		</label>
		</br>
		<select id="rp_status" name="rp_status">
		<option value="enabled">enabled</option>
		<option value="disabled">disabled</option>
		</select>
		</br>
		redirect page source:
		</br>
		<input type="text" name="rp_src">
		</br>
		<input type="submit" value="Submit">
		</form>
        </div>
    </div> 

</div>
</body>
</html>