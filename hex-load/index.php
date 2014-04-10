<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<title>Dynamic Loadingurl</title>
		<link href="styles.php" media="screen" rel="stylesheet" type="text/css" />
		<link href="hex-stack.css" media="screen" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	</head>
	<script type="text/javascript">
		function GameDetails( servername, serverurl, mapname, maxplayers, steamid, gamemode ) {
			$(".NOTINUSE").append("" + serverurl + "");
			$(".in_content_sn").append("" + servername + "");
			$(".NOTINUSE").append("" + maxplayers + "");
			$(".NOTINUSE").append("" + steamid + "");
			$(".in_content_gm").append("" + gamemode + "");
			$(".in_content_map").append("" + mapname + "");
		}
		function SetStatusChanged( status ) {
			$(".in_status").empty();
			$(".in_status").append("" + status + "");
		}
	</script>
<?PHP
/**
	//Include our config file, we need this to get certain variables that we changed.
	require("./config.php");	
	//Get the steamid (really the community id)
	$communityid = $_GET["steamid"];
	//See if the second number in the steamid (the auth server) is 0 or 1. Odd is 1, even is 0
	$authserver = bcsub($communityid, '76561197960265728') & 1;
	//Get the third number of the steamid
	$authid = (bcsub($communityid, '76561197960265728')-$authserver)/2;
	//Concatenate the STEAM_ prefix and the first number, which is always 0, as well as colons with the other two numbers
	$steamid = "STEAM_0:$authserver:$authid";
	$link = file_get_contents('http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=' . $steam_api . '&steamids=' . $communityid . '&format=json');
	$myarray = json_decode($link, true);
	**/
?>
<body>

<div>
    <div class="hex-row">
        <div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
        <div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
        <div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
    </div>    <div class="hex-row">
        <div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
        <div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
        <div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
    </div>    <div class="hex-row">
        <div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
        <div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
        <div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
    </div>    <div class="hex-row">
        <div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
        <div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
        <div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
    </div>
</div>
<div>
    <div class="hex-row">
        <div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
        <div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
        <div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
    </div>    <div class="hex-row">
        <div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
        <div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
        <div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
    </div>    <div class="hex-row">
        <div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
        <div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
        <div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
    </div> <div class="hex-row">
        <div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
        <div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
        <div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex even"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
		<div class="hex"><div class="left"></div><div class="middle"></div><div class="right"></div></div>
    </div> 
</div>
		
</body>
</html>