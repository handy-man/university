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
				
					<canvas width="1000" height="600" style="border:1px dotted;" onClick="draw_box()" id="movebox"></canvas>
					
					</div>
					<script>
	  var cx;
	  var cy;
	  var c_canvas = document.getElementById("movebox");
	  var c_context = c_canvas.getContext("2d");
	  c_context.fillStyle="rgb(255,20,20)";
	  function draw_box() {
		  cx=100;
		  cy=100;
		  draw_b_box();
		  setInterval(draw_b_box,110);
	  }
	  function draw_b_box() {
		  c_canvas.width=c_canvas.width;
		  c_context.fillRect(cx, cy, 20, 20);
	  }

function move_left() {
   check_pos();
   cx = cx - 3;
}

function move_up() {
   check_pos();
   cy = cy -3;
}
function move_right() {
 check_pos();
  cx = cx + 3;
}
function move_down() {
 check_pos(); 
 cy = cy + 3;
}

function check_pos(){
//Write our checking of all positions

if (cx > c_canvas.width - 20){
cx = cs - 3;
cy = cy;
}
else if (cx > 0){
cx = cx + 3;
}
else if(cy > c_canvas.height - 20 ){
cy = cy - 3;
}
else(){

}


}
document.onkeydown= function(event) {
  
  var keyCode; 
  
  if(event == null)
  {
    keyCode = window.event.keyCode; 
  }
  else 
  {
    keyCode = event.keyCode; 
  }
  console.log(keyCode);
  switch(keyCode)
  {
    // left 
    case 37:
      move_left();
      break; 

    // up 
    case 38:
    // action when pressing up key
      move_up();
      break; 

    // right 
    case 39:
    // action when pressing right key
      move_right();
      break; 

    // down
    case 40:
    // action when pressing down key
      move_down();
      break; 

    default: 
      break; 
  } 
}
					</script>


				<?PHP include("./includes/footer.php");?>
