<?php
/*------------------------\
|        TTT STATS        |
|	   Beta           |
|=========================|
|� 2013 SNGaming.org      |
|   All Rights Reserved   |
|=========================|
|   Website printout      |
|      beta testing       |
|      by Handy_man       |
\------------------------*/
include("./includes/header.php");
/*Search variable go here */
$searchInput = $_GET['s'];

/*End of Regex*/
?>
<div id="primary_content">
<h4>Display our search results below! for: <?PHP echo $searchInput; ?></h4>

</div>
<?
include("./includes/footer.php");
?>
