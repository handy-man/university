<?php
    header("Content-type: text/css; charset: UTF-8");
	
	require("./config.php");
?>

/* GLOBAL */
body
{
	font-family: "Arial", "Helvetica", "Helvetica Neue";
	font-size: 14px;
	color: #333;
	text-align: left;
	<?PHP
	if ($bgimg_enabled == true){
	echo "background-image: url('" . $bgimg_src . "');";
	echo "background-repeat: repeat;";
	}
	else{
	
	echo "background-color: " . $body_main . ";";
	
	}
	?>

	margin: 0 0 0 0;
}

@font-face
{
font-family: titleFont;
src: url('<?PHP echo $font_src; ?>');
}

table {
  table-layout: fixed;
  border-collapse: collapse;
  width: 100%;
}

td {
  width: 150px;
}
/* LAYOUT */
div#page
{
	margin: 10px auto 0 auto;
	width: 1024px;
	opacity: <?PHP if ($opaque_enabled == true) {echo "0.85";}?>;
}

div#header
{
	height: 100px;
	opacity: <?PHP if ($opaque_enabled == true) {echo "0.85";}?>;
/* IE10 Consumer Preview */ 
background-image: -ms-linear-gradient(top, <?php echo $header_top_gradient;?> 0%, <?php echo $header_bot_gradient;?> 100%);

/* Mozilla Firefox */ 
background-image: -moz-linear-gradient(top, <?php echo $header_top_gradient;?> 0%, <?php echo $header_bot_gradient;?> 100%);

/* Opera */ 
background-image: -o-linear-gradient(top, <?php echo $header_top_gradient;?> 0%, <?php echo $header_bot_gradient;?> 100%);

/* Webkit (Safari/Chrome 10) */ 
background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, <?php echo $header_top_gradient;?>), color-stop(1, <?php echo $header_bot_gradient;?>));

/* Webkit (Chrome 11+) */ 
background-image: -webkit-linear-gradient(top, <?php echo $header_top_gradient;?> 0%, <?php echo $header_bot_gradient;?> 100%);

/* W3C Markup, IE10 Release Preview */ 
background-image: linear-gradient(to bottom, <?php echo $header_top_gradient;?> 0%, <?php echo $header_bot_gradient;?> 100%);
}

div#site_title
{
	color: <?php echo $text_colour;?>;
	text-transform: uppercase;
	text-align: center;
	
	background-color:rgba(<?PHP echo $title_red . ", " . $title_green . ", " . $title_blue; if ($opaque_enabled == true) {echo ", 0.85";} else { echo ", 1";}?>);
	font-weight: bold;
	font-size: 42px;
	
	margin: 0 auto 0 auto;
	<?PHP
	if ($custom_font == true){
	echo "font-family: titleFont;";
	}
	else{
	echo "font-family: 'Arial';";
	}
	
	?>
}

.rules_title
{
	display: block;
	color: <?php echo $text_colour;?>;
	text-transform: uppercase;
	text-align: center;
	font-weight: bold;
	font-size: 22px;
	line-height: 22px;
	margin: 0 auto 0 auto;
}

div#dynamic_content
{
    display: inline-block;
	vertical-align: middle;
	color: <?php echo $text_colour;?>;
	text-transform: uppercase;
	/* ROUNDED CORNERS */
	-moz-border-radius: 12px;
	-webkit-border-radius: 12px;
	border-radius: 12px;
	/* DROP SHADOW */
	-moz-box-shadow: 0px 0px 14px <?php echo $drop_colour;?>;
	-webkit-box-shadow: 0px 0px 14px <?php echo $drop_colour;?>;
	box-shadow: 0px 0px 14px <?php echo $drop_colour;?>;
	/* OTHER */
	padding: 10px;
	background-color:rgba(<?PHP echo $box_backgroud_red . ", " . $box_backgroud_green . ", " . $box_backgroud_blue; if ($opaque_enabled == true) {echo ", 0.3";} else { echo ", 1";}?>);
	width: 27%;
	margin-right: 20px;
	height: 200px;
}

div#primary_content
{
    display: inline-block;
	vertical-align: middle;
	color: <?php echo $text_colour;?>;
	/* ROUNDED CORNERS */
	-moz-border-radius: 12px;
	-webkit-border-radius: 12px;
	border-radius: 12px;
	/* DROP SHADOW */
	-moz-box-shadow: 0px 0px 14px <?php echo $drop_colour;?>;
	-webkit-box-shadow: 0px 0px 14px <?php echo $drop_colour;?>;
	box-shadow: 0px 0px 14px <?php echo $drop_colour;?>;
	/* OTHER */
	padding: 10px;
	background-color:rgba(<?PHP echo $box_backgroud_red . ", " . $box_backgroud_green . ", " . $box_backgroud_blue; if ($opaque_enabled == true) {echo ", 0.3";} else { echo ", 1";}?>);
	width: 66.5%;
	height: 200px;

}

div#secondary_content
{
	display: inline-block;
		vertical-align: middle;
	color: <?php echo $text_colour;?>;
	/* ROUNDED CORNERS */
	-moz-border-radius: 12px;
	-webkit-border-radius: 12px;
	border-radius: 12px;
	/* DROP SHADOW */
	-moz-box-shadow: 0px 0px 14px <?php echo $drop_colour;?>;
	-webkit-box-shadow: 0px 0px 14px <?php echo $drop_colour;?>;
	box-shadow: 0px 0px 14px <?php echo $drop_colour;?>;
	/* OTHER */
	padding: 10px;
	background-color:rgba(<?PHP echo $box_backgroud_red . ", " . $box_backgroud_green . ", " . $box_backgroud_blue; if ($opaque_enabled == true) {echo ", 0.3";} else { echo ", 1";}?>);
	width: 75.5%;
	height: 185px;
}

div#avatar_content
{
    display: inline-block;
	vertical-align: middle;
	color: <?php echo $text_colour;?>;
	text-transform: uppercase;
	/* ROUNDED CORNERS */
	-moz-border-radius: 12px;
	-webkit-border-radius: 12px;
	border-radius: 12px;
	/* DROP SHADOW */
	-moz-box-shadow: 0px 0px 14px <?php echo $drop_colour;?>;
	-webkit-box-shadow: 0px 0px 14px <?php echo $drop_colour;?>;
	box-shadow: 0px 0px 14px <?php echo $drop_colour;?>;
	/* OTHER */
	padding: 10px;
	background-color:rgba(<?PHP echo $box_backgroud_red . ", " . $box_backgroud_green . ", " . $box_backgroud_blue; if ($opaque_enabled == true) {echo ", 0.3";} else { echo ", 1";}?>);
	width: 185px;
	margin-right: 20px;
	height: 185px;
}

div#status_content
{
    display: block;
	color: <?php echo $text_colour;?>;
	text-transform: uppercase;
	/* ROUNDED CORNERS */
	-moz-border-radius: 12px;
	-webkit-border-radius: 12px;
	border-radius: 12px;
	/* DROP SHADOW */
	-moz-box-shadow: 0px 0px 14px <?php echo $drop_colour;?>;
	-webkit-box-shadow: 0px 0px 14px <?php echo $drop_colour;?>;
	box-shadow: 0px 0px 14px <?php echo $drop_colour;?>;
	/* OTHER */
	padding: 10px;
	background-color:rgba(<?PHP echo $box_backgroud_red . ", " . $box_backgroud_green . ", " . $box_backgroud_blue; if ($opaque_enabled == true) {echo ", 0.3";} else { echo ", 1";}?>);
	height: 10px;
	margin-top: 20px;
	margin-bottom: 20px;
}

.in_status{
	margin: 0 40%;
}

.welcome_steam{
	display: block;
	margin-bottom: 5px;
}

.welcome{
	display: block;
	margin-bottom: 5px;
}


.in_title{
	font-weight: bold;
	font-size: 18px;
	display: block;
	color: <?php echo $text_colour;?>;
	text-transform: uppercase;
	width: 100%;
	<?PHP
	if($lined_up == false){
	echo "padding: 5px;";
	}
	?>
}
.in_content{
	font-size: 14px;
	display: block;
	color: <?php echo $text_colour;?>;
	text-transform: lowercase;
	width: 100%;
	font-family: "arial";
}
.in_content_map{
	display: inline-block;
	font-size: 14px;
	display: block;
	color: <?php echo $text_colour;?>;
	text-transform: lowercase;
	width: 100%;
	font-family: "arial";
}
.in_content_gm{
	display: inline-block;
	font-size: 14px;
	display: block;
	color: <?php echo $text_colour;?>;
	text-transform: lowercase;
	width: 100%;
	font-family: "arial";
}
.in_content_sn{
	display: inline-block;
	font-size: 14px;
	display: block;
	color: <?php echo $text_colour;?>;
	text-transform: lowercase;
	width: 100%;
	font-family: "arial";
}
