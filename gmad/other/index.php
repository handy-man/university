<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<title>GmadGaming.net 1942 Loading</title>
		<link href="styles.php" media="screen" rel="stylesheet" type="text/css" />
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
?>
<body>
	<div id="header"></div>
	<div id="site_title">
		<span><?php echo $title_text;?></span>
	</div>
	<div id="page">
		<div id="dynamic_content">
			<span class="in_title">Server name:</span>
			<span class="welcome">GmadGaming.net Semi-Serious DarkRP [Staff Needed]</span>
			<span class="in_title">Gamemode:</span>
			<span class="welcome">DarkRP</span>
			<span class="in_title">Server IP:</span>
			<span class="in_content"><?php
				if ($custom_serverip == false){
			print $myarray['response']['players'][0]['gameserverip'];
			}
			else{
			echo $serverip_text;
			} 
			?></span>
			<span class="in_title">Current map:</span>
			<span class="in_content_map"></span>
		</div>
		<div id="primary_content">
			<span class="rules_title">Rules</span>
				<table>
					<tr>
						<td>
							<ul>
								<li>
								Obey Staff orders.
								</li>
								
								<li>
								No bullying unless properly RPed out.
								</li>

								<li>
								Do not kill yourself to avoid an RP situation (FailRP) unless properly RPed out.
								</li>

								<li>
								NLR is 90 seconds (Around 1.5 minutes)
								</li>

								<li>
								Do not abuse any exploits, glitches or use hacks. (Report such offenses to a Staff member)
								</li> 
								
								<li>
								KoS Lines/Areas are not permitted.
								</li>
								
								<li>
								20% is not considered a high tax rate.
								</li>
<!--
								<li>
								Resistance members must have a valid reason to raid the ReichStag
								</li>

								<li>
								Ask the Fuhrer for changes before attempting to kill him.
								</li>

								<li>
								FailRP is a valid demotion reason! (See rules for details)
								</li> 
-->
							</ul>
						</td>
						<td>
							<ul>
								<li>
								MetaGaming is not permitted.
								</li>
								
								<li>
								Prop abuse is not tolerated. (See rules for details)
								</li>

								<li>
								Gov. Officials cannot be "corrupt".
								</li>

								<li>
								Gov. Officials must have a warrant before entering any property owned by citizens.
								</li>

								<li>
								Gestapo agents must have a valid reason to infiltrate bases.
								</li> 
								
								<li>
								Any law that makes an area KoS is not permitted.
								</li>
<!--
								<li>
								You cannot kill a player to teleport them to jail.
								</li>

								<li>
								Only Cops are permitted to handle bail unless ordered otherwise by a Superior.
								</li>

								<li>
								The Mayor is not permitted to have any weapon.
								</li>

								<li>
								Do not propblock radios so they cannot be turned off.
								</li>
-->
							</ul>
						</td>
					</tr>
				</table>
		</div>
			<div id="status_content">
				<span class="in_status"></span>
			</div>
			<div id="avatar_content">
				<img src='<?php print $myarray['response']['players'][0]['avatarfull']; ?>'/>
			</div>
			<div id="secondary_content">
				<span class="welcome_steam">
					Welcome, <?php print $myarray['response']['players'][0]['personaname']; ?> to the <?PHP echo $com_name; ?> community.
				</span>
				<span class="welcome">
					<?PHP
					if ($welcome_message_1 != ""){
					echo $welcome_message_1;
					}
					?>
				</span>
				<span class="welcome">
					<?PHP
					if ($welcome_message_2 != ""){
					echo $welcome_message_2;
					}
					?>
				</span>
				<span class="welcome">
					<?PHP
					if ($welcome_message_3 != ""){
					echo $welcome_message_3;
					}
					?>
				</span>
                <span class="welcome">
					<?PHP
					if ($welcome_message_4 != ""){
					echo $welcome_message_4;
					}
					?>
				</span>
                <span class="welcome">
					<?PHP
					if ($welcome_message_6 != ""){
					echo $welcome_message_6;
					}
					?>
				</span>
                <span class="welcome">
                    <?PHP
                    if ($welcome_message_7 != ""){
                    echo $welcome_message_7;
                    }
                    ?>
                </span>
                <span class="welcome">
					<?PHP
					if ($welcome_message_8 != ""){
					echo $welcome_message_8;
					}
					?>
				</span>
			</div>
	</div>
    
	<audio id="bg" loop>
					<source src="<?PHP echo $wav_src; ?>" type="audio/x-wav">
					Your browser does not support the HTML5 audio tag
	</audio>
	<?PHP
	if ($wav_enabled == true){
		echo "<script type='text/javascript'>";
		echo "bg.play();";
		echo "</script>";
	}
	
	if ($youtube_enabled == true){
		echo "<object type='hidden' style='height: 0; width: 0'>
			<param name='movie' value='http://www.youtube.com/v/" . $youtube_src . "_3kKxyf6b-U?version=3&autoplay=1&loop=1'>
			<param name='allowFullScreen' value='true'><param name='allowScriptAccess' value='always'><embed src='http://www.youtube.com/v/" . $youtube_src . "?version=3&autoplay=1&loop=1' type='application/x-shockwave-flash' allowfullscreen='true' allowScriptAccess='always' width='1' height='1'>
		</object>";
	}
	
	?>
    
</body>
</html>