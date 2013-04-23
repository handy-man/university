
	var canvas, ctx;
	var blob_pos_x;
	var blob_pos_y;
	var rock_y;
	var rocks_array = {};
	var move_speed;
	var blob_image = new Image();
	var rock_image = new Image();
	blob_image.src = './static/images/blob.png';
	rock_image.src = './static/images/rock.png';
	var c_canvas = document.getElementById("game_canvas");
	var c_context = c_canvas.getContext("2d");
	
	
	
	  
	  function initGame(){
		move_speed = 3;
		blob_pos_x=500;
		blob_pos_y=400;
		game_id=setInterval(game_loop, 50);
	  }
	
	function clear(){
	//clear our board! 
	c_canvas.width=c_canvas.width;
	c_canvas.height=c_canvas.height;
	}
		
	function rocks(x, y, speed){
	this.x = x;
	this.y = y;
	this.speed = speed;
	}
	
	
	
	function game_loop(){
	clear();
	draw_blob();
	draw_rocks();
	
	}
	



		function draw_rocks(ctx, x, y){
						c_canvas.getContext("2d").drawImage(rock_image, 50, 20);

		}
	  
	  function draw_coin(){
	  
	  
	  }
	 
	  function draw_blob() {
		    c_canvas.getContext("2d").drawImage(blob_image, blob_pos_x, blob_pos_y);
				//c_canvas.getContext("2d").drawImage(rock_image, 50, rock_y);

	  }

function move_left() {
   check_pos();
   blob_pos_x = blob_pos_x - move_speed;
}

function move_up() {
   check_pos();
   blob_pos_y = blob_pos_y - move_speed;
}
function move_right() {
 check_pos();
  blob_pos_x = blob_pos_x + move_speed;
}
function move_down() {
 check_pos(); 
 blob_pos_y = blob_pos_y + move_speed;
}

function check_pos(){
//Write our checking of all positions

if (blob_pos_x > c_canvas.width - 20){
blob_pos_x = blob_pos_x - 4;
}
if (blob_pos_x < 0){
blob_pos_x = blob_pos_x + 4;
}
if (blob_pos_y > c_canvas.height - 20){
blob_pos_y = blob_pos_y - 4;
}
if (blob_pos_y < 0){
blob_pos_y = blob_pos_y + 4;
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