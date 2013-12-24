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
            <li><a href="<?PHP echo $home . "account"; ?>">Home</a></li>
            <li><a href="<?PHP echo $home . "index.php?steamid=" . $communityid . ""; ?>">Preview</a></li>
            <li><a href="<?PHP echo $forum_url;?>">Community Forums</a></li>
            <li class="active"><a href="help.php">help</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
	
    <div class="container">

      <div class="starter-template">
		<h1>PersonalLoad - Help</h1>
		<p class="lead">When setting a YouTube Source you should use the charecters found after the v= in the youtube link.<br> Example of a typical youtube link: "www.youtube.com/watch?v=aHjpOzsQ9YI"<br>Example of what we want to take from that link: "aHjpOzsQ9YI"</br> Take the above text and insert that into the YouTube Source on the home page.<br><br>Redirect will always take over any music, if you have a reditect set you will always be redirected.<br>Remember to include the http:// in your redirect link, else it will not work.</p>
      </div><!-- /.starter template -->

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
