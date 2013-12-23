<?PHP
require("../config.php");
require("../openid.php");
$communityid = $_SESSION['steamid'];
$account = "account/";
$yt_enabled = $_POST['yt_status'];
$yt_src = $_POST['yt_src'];
$red_enabled = $_POST['rp_status'];
$red_src = $_POST['rp_src'];

if ($yt_enabled == "disabled"){$yt_enabled = 0;} else {$yt_enabled = 1;}
if ($red_enabled == "disabled"){$red_enabled = 0;} else {$red_enabled = 1;}

//Community ID
	//Connect to our database
	$connect = mysqli_connect($host,$user,$pass,$dbname);
	$yt_src = mysqli_real_escape_string($connect, $yt_src);
	$red_src = mysqli_real_escape_string($connect, $red_src);
	
	if ($communityid != ""){
		#insert data!
		$_SESSION['updated'] = true;
		$new_user = mysqli_query($connect, "UPDATE users SET youtube_enabled ='$yt_enabled', youtube_src ='$yt_src', redirect_enabled ='$red_enabled', redirect_src ='$red_src' WHERE steamid ='$communityid'");
		header('Location: ' . $home . $account . '');
	}
	else{
	#header('Location: ' . $home . "login/" . '');
	echo "fuck";
	}
	
?>