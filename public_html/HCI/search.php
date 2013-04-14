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
<div id="primary_content_about">
<h4 class="center">You searched for : <?PHP echo $searchInput; ?></h4>

<img src="./static/images/hotel_1.jpg"/><p>bunch of descriptive text here!</p>
</br>
<img src="./static/images/hotel_2.jpg"/>
</br>
<img src="./static/images/hotel_3.jpg"/>
</br>


</div>
<?
include("./includes/footer.php");
?>
