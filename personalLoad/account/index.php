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

<script src="slert.js"></script>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Nathan Hand, Handy_man, www.thehiddennation.com">

    <title>PersonalLoad - Set your own loadingurl</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="starter-template.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
	
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Personal Load</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="<?PHP echo $home . "account"; ?>">Home</a></li>
            <li><a href="<?PHP echo $home . "index.php?steamid=" . $communityid . ""; ?>">Preview</a></li>
            <li><a href="<?PHP echo $forum_url;?>">Community Forums</a></li>
            <li><a href="help.php">help</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
	
    <div class="container">

      <div class="starter-template">
	  <?PHP
	  if ($_SESSION['updated'] == true){
		echo "<div class='alert alert-success fade in hints'>
	  Success! Details updated, you can check the new loading screen in the preview <a href=" . $home . "index.php?steamid=" . $communityid . ">Here</a>.
	  <a class='close' data-dismiss='alert' href='#' aria-hidden='true'>&times;</a>
	  </div>";
	  $_SESSION['updated'] = false;
	  }
	  ?>
	  <h1 id="alert" class="hints">PersonalLoad - Set your own loading screen</h1>
		<form role="form" action="update.php" method="post">

  <div class="form-group">
        <label>
		YouTube Music status:
        <select class="form-control" id="yt_status" name="yt_status">
		<option value="enabled"<?PHP if ($youtube_enabled == 1){echo "selected";}?>>Enabled</option>
		<option value="disabled"<?PHP if ($youtube_enabled == 0){echo "selected";}?>>Disabled</option>
		</select>
      </label>
	  </br>
    <label for="YouTubeSource">YouTube Source link:</label>
    <input type="text" class="form-control" id="YouTubeSource" placeholder="Example: aHjpOzsQ9YI" name="yt_src" value="<?PHP if ($youtube_src != ""){echo $youtube_src;}?>">
	<span class="help-block hints">Youtube source = "aHjpOzsQ9YI", this means that youtube music being enabled with that variable as the source will have the following music video play in the background <a href ="http://www.youtube.com/watch?v=aHjpOzsQ9YI">Example</a></span>
  </div>
  <div class="form-group">
        <label>
		Redirect Source status:
        <select class="form-control" id="rp_status" name="rp_status">
		<option value="enabled" <?PHP if ($redirect_enabled == 1){echo "selected";}?>>Enabled</option>
		<option value="disabled" <?PHP if ($redirect_enabled == 0){echo "selected";}?>>Disabled</option>
		</select>
      </label>
	  </br>
    <label for="redirectSource">Redirect Source Link:</label>
    <input type="text" class="form-control" id="redirectSource" name="rp_src" placeholder="Example http://www.garryspin.com" value="<?PHP if ($redirect_src != ""){echo $redirect_src;}?>">
	<span class="help-block hints">If your redirect source is enabled (via the above checkbox) it will overwrite the YouTube music.</span>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
      </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
