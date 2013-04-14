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
<div class="search_img1">
<p class="search_text"><a href="./search.php">The Bazaar Hotel</a></br><img src="./static/images/star.gif"/><img src="./static/images/star.gif"/><img src="./static/images/star.gif"/><img src="./static/images/star.gif"/></br>£100 - £150 per night <button class='button' type='submit'>Book now</button></p>
</div>
</br>
<div class="search_img2">
<p class="search_text"><a href="./search.php">The Sunshine Lodge</a></br><img src="./static/images/star.gif"/><img src="./static/images/star.gif"/><img src="./static/images/star.gif"/><img src="./static/images/star.gif"/><img src="./static/images/star.gif"/></br>£150+ per night <button class='button' type='submit'>Book now</button></p>
</div>
</br>
<div class="search_img3">
<p class="search_text"><a href="./search.php">The Belle Vue Guest House</a></br><img src="./static/images/star.gif"/><img src="./static/images/star.gif"/><img src="./static/images/star.gif"/></br>£50 - £100 per night <button class='button' type='submit'>Book now</button></p>
</div>
</br>


</div>
<?
include("./includes/footer.php");
?>
