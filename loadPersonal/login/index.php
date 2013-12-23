<?php
# Logging in with Steam accounts requires setting special identity, so this example shows how to do it.
# http://steamcommunity.com/dev/
require '../openid.php';
require '../config.php';
try {
    # Change 'localhost' to your domain name.
    $openid = new LightOpenID($website);
    if(!$openid->mode) {
        if(isset($_GET['login'])) {
            $openid->identity = 'http://steamcommunity.com/openid';
            header('Location: ' . $openid->authUrl());
        }
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="PersonalLoad login">
    <meta name="author" content="Nathan Hand, Thehiddennation.com">

    <title>Personal Load Login</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  
  <body>

    <div class="container">

      <form class="form-signin" role="form" action="?login" method="post">
        <h2 class="form-signin-heading">Please sign in</h2>
		<input class="btn btn-lg" type="image" src="http://cdn.steamcommunity.com/public/images/signinthroughsteam/sits_large_border.png">
      </form>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
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
				$_SESSION['steamid'] = $steamid64;
				header('Location: ' . $home . "login/logging.php" . '');
        }

    }
} catch(ErrorException $e) {
    echo $e->getMessage();
}
?>