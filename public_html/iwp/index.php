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

					<div id="primary_content">
				
					<canvas width="1000" height="500" style="border:1px dotted;" id="game_canvas"></canvas>
					<button type="button" onclick="musicHandler()">BG audio on/off</button>
					</div>
					
					<script src="./js/main.js"></script>
					<audio id="bg" loop>
					<source src="./sound/bg.mp3" type="audio/mpeg">
					</audio>
					<audio id="levelup">
					<source src="./sound/levelup.wav" type="audio/mpeg">
					</audio>
					<audio id="loosegame">
					<source src="./sound/bg.mp3" type="audio/mpeg">
					</audio>

				<?PHP include("./includes/footer.php");?>
