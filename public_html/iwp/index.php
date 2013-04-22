<?php
/*------------------------\
|        TTT STATS        |
|	       Beta           |
|=========================|
|© 2013 SNGaming.org      |
|	All Rights Reserved   |
|=========================|
| 	Website printout      |
| 	   beta testing       |
| 	   by Handy_man       |
\------------------------*/				

include("./includes/header.php");
?>
					<canvas id="myCanvas" width="1200" height="800" style="border:1px solid #000000;">
					Your browser doesn't support HTML5 canvas! Please try and install something better such as chrome.
					</canvas>
					
					
					<script>
					var c=document.getElementById("myCanvas");
					var ctx=c.getContext("2d");
					</script>


				<?PHP include("./includes/footer.php");?>
