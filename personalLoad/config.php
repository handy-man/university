<?php
	//SQL server information, this is pretty self explanitory based on the variable names. 
	//$host == Hostname, the ip address/website name of your SQL server.
	include("dbconfig.php");
	//Your steamAPI key, this is required and can be applied for here: http://steamcommunity.com/dev
	$steam_api = "CA269D3FE157CBEA7386C9830FCC218D";
	
	//Plese insert the home directory for this personal Loading screen installation.
	$home = "http://www.thehiddennation.com/personalLoad/";
	
	//Please insert your base website address.
	$website = "www.thehiddennation.com";
	
	//Please insert your community forum url, this is seen as a link in the account page.
	$forum_url = "http://www.thehiddennation.com/forums/";
	
	session_start();
?>