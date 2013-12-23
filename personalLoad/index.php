<?PHP
/**
Copy the below example if used in conjunction with an alternative loadingurl script.
EXAMPLE:
<?PHP include("personal.php"); ?>
***END OF EXAMPLE ***
*/
	include("personal.php");
	if($_GET["steamid"] == ""){
	echo "Error, please specify the sv_loadingurl to something such as the following: http://yourwebsite.com/loadingurldirectory/index.php?steamid=%s";
	echo "</br>";
	echo "Don't forget this is intended to be a personalLoad loading screen, you must <a href='./login/'>login</a> to have a personal loading screen.";
	}
?>
