<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
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
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#preview">Preview</a></li>
            <li><a href="mailto:administrator@thehiddennation.com">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">

      <div class="starter-template">
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
		
		<form role="form">
		    <div class="checkbox">
      <label>
        <input type="checkbox"> Enable YouTube Music
      </label>
    </div>
  <div class="form-group">
    <label for="exampleInputEmail1">YouTube Source link:</label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="YouTube Souce Link">
	<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>
  </div>
      <div class="checkbox">
      <label>
        <input type="checkbox"> Enable Redirect Link
      </label>
    </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Redirect Source Link:</label>
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Redirect Source Link">
	<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>
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
