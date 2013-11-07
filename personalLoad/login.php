<?php
# Logging in with Steam accounts requires setting special identity, so this example shows how to do it.
# http://steamcommunity.com/dev/
require 'openid.php';
require 'config.php';
try {
    # Change 'localhost' to your domain name.
    $openid = new LightOpenID('www.thehiddennation.com');
    if(!$openid->mode) {
        if(isset($_GET['login'])) {
            $openid->identity = 'http://steamcommunity.com/openid';
            header('Location: ' . $openid->authUrl());
        }
?>
<form action="?login" method="post">
    <input type="image" src="http://cdn.steamcommunity.com/public/images/signinthroughsteam/sits_large_border.png">
</form>
<?php
    } elseif($openid->mode == 'cancel') {
        echo 'User has canceled authentication!';
    } else {
        if($openid->validate()) {
                $id = $openid->identity;
                // identity is something like: http://steamcommunity.com/openid/id/76561197994761333
                // we only care about the unique account ID at the end of the URL.
                $ptn = "/^http:\/\/steamcommunity\.com\/openid\/id\/(7[0-9]{15,25}+)$/";
                preg_match($ptn, $id, $matches);
				$steamid64 = $matches[1];
				echo $steamid64;
        }

    }
} catch(ErrorException $e) {
    echo $e->getMessage();
}

#end of openid interaction, lets do something with the data.
/**
$connect = mysqli_connect($host,$user,$pass,$dbname);
	//Get our users redirect url
	$steamid64 = mysqli_real_escape_string($connect, $steamid64); #why trust steam?
	$user = mysqli_query($connect, "SELECT * FROM `users` WHERE `steamid` = '$steamid64' LIMIT 0, 1");	

	//If redirecturl is empty abandon redirect continue with the rest of the script
	$playerarray = mysqli_fetch_array( $user);
	$player_steamid = $playerarray['steamid'];
	$youtube_enabled = $playerarray['youtube_enabled'];
	$youtube_src = $playerarray['youtube_src'];
	$redirect_enabled = $playerarray['redirect_enabled'];
	$redirect_src = $playerarray['redirect_src'];
	
	*/
?>