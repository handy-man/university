<?PHP
$string = '<?php 

$host = "'. $_POST["server_hostname"]. '";

$user = "'. $_POST["server_user"]. '";

$pass = "'. $_POST["server_pass"]. '";

$dbname = "'. $_POST["server_db"]. '";
?>';

$fp = fopen("../dbconfig.php", "w");

fwrite($fp, $string);

fclose($fp);

$dbconn = mysql_connect('' . $_POST["server_hostname"] . '','' . $_POST["server_user"] . '','' . $_POST["server_pass"] . '');
mysql_select_db('' . $_POST["server_db"] . '',$dbconn);

$file = './struc.sql';

if($fp1 = file_get_contents($file)) {
  $var_array = explode(';',$fp1);
  foreach($var_array as $value) {
    mysql_query($value.';',$dbconn);
  }
}  

include("./includes/header.php");
?>
<h3 class="center">If you have errors at the top of this page, you've messed up and need to go back.</h3>
</br>
<h3 class="center">Please delete the /install/ directory if everything has taken properly.</h3>
</br>
<h3 class="center">Don't forget to fill out the config.php in the base directory with the proper information.</h3>
</br>
<h3 class="center">If you did not obtain this script through <a href="http://coderhire.com">CoderHire</a> from <a href="http://coderhire.com/users/view/2104">Handy_man</a> then please consider doing so.</h3>
<?PHP include("./includes/footer.php")?>
