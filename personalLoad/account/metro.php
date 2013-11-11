<?php
    header("Content-type: text/css; charset: UTF-8");
	
	require("../config.php");	
	$communityid = $_SESSION['steamid'];
	//See if the second number in the steamid (the auth server) is 0 or 1. Odd is 1, even is 0
	$authserver = bcsub($communityid, '76561197960265728') & 1;
	//Get the third number of the steamid
	$authid = (bcsub($communityid, '76561197960265728')-$authserver)/2;
	//Concatenate the STEAM_ prefix and the first number, which is always 0, as well as colons with the other two numbers
	$steamid = "STEAM_0:$authserver:$authid";
	$link = file_get_contents('http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=' . $steam_api . '&steamids=' . $communityid . '&format=json');
	$myarray = json_decode($link, true);
?>

body{
    font-family: Century;
    background: rgb(51,51,51);
    color: #fff;
    padding:20px;
}
  
.page{
    width:auto;
    height:auto;    
}

.newlineHor{
    width:auto;
    padding:5px;
    height:auto;
    display:table;
	margin-left: 25%;
}

.tile{
    height:100px;  
    width:100px; 
    float:left;
    margin:0 8px 0 0;
    padding:2px;
}

.formtile{
	height:210px;  
    width:300px; 
    float:left;
    margin:0 8px 0 0;
    padding:2px;
}

.title{
	color: white;
	margin-top:-18px;
	margin-left: 3px;
}
  
.LTile{
    width:210px;
}

.yellow{
    background:#DAA520;
}
  
.red{
    background:#CD0000; 
}
  
.blue{
    background:#4682B4;
}
  
.green{
    background-color: #2E8B57;
}

.mouseover{
    background-color: #483D8B;
}

/* ICONS!!! */

.steam{
/*<?php print $myarray['response']['players'][0]['avatar']; ?>    <---Add that source later*/
background:url(<?php print $myarray['response']['players'][0]['avatarmedium']; ?>) no-repeat center center;
height: 100px;
}