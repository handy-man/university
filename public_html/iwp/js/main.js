
	var canvas, ctx;
	var blob_pos_x;
	var blob_pos_y;
	var alreadyStarted = 0;
	var level_num;
	var lives;
	var score;
	var rocks_array;
	var coins_array;
	var move_speed;
	var blob_image = new Image();
	var rock_image = new Image();
	var coin_image = new Image();
	blob_image.src = './static/images/blob.png';
	rock_image.src = './static/images/rock.png';
	coin_image.src = './static/images/coin.png';
	var c_canvas = document.getElementById("game_canvas");
	var c_context = c_canvas.getContext("2d");
	
	function initbgmusic(){
	bg = document.getElementById('bg'); 
    bg.loop =  true; 
    //bg.currentTime = 0; 
    bg.play(); 
	}
	
	function playBgMusic(){
	bg = document.getElementById('bg'); 
    bg.currentTime = 0; 
	bg.volume = 0.5;
    bg.play(); 
	}
	
	function musicHandler(){
	bg = document.getElementById('bg'); 
	if (bg.currentTime != 0){
	pauseBgMusic();
	}
	else{
	playBgMusic();
	}
	}
	
	function pauseBgMusic(){
		bg = document.getElementById('bg'); 
		bg.pause();
		bg.currentTime = 0; 
    
	}
	
	function restartGameVars(){
		move_speed = 3;
		lives = 3;
		score = 0;
		blob_pos_x=500;
		blob_pos_y=400;
		level_num = 1;
	}
	  
	function initGame(){
		move_speed = 3; //keybord speed
		lives = 3;
		score = 0;
		blob_pos_x=500;
		blob_pos_y=400;
		level_num = 1;
	canvas = document.getElementById('game_canvas');
    ctx = canvas.getContext('2d');
	var width_half = canvas.width/2 - 100;
	ctx.textAlign = "center";
	ctx.font = "25px Verdana";
	ctx.strokeStyle = "#ff0000";
	ctx.strokeText("Coin collector!", 500,100);
	ctx.strokeText("Collect as many coins as possible without getting hit by the rocks!", 500,200);
	ctx.strokeText("Click to start!", 500,300);
	canvas.addEventListener("click", initGameStart, false);
	canvas.addEventListener("mousemove",mouseupdates,false);
	
	
	
		//game_id=setInterval(game_loop, 50); //start the game loop, which will start the level and shit.
	  }
	  
	function initGameStart(){
	
	if (alreadyStarted == 0){
		level_start();
		initbgmusic();
		game_id=setInterval(game_loop, 50); 
		alreadyStarted = 1;
	}
	
	if (alreadyStarted == 2){
		restartGameVars();
		level_start();
		playBgMusic();
		game_id=setInterval(game_loop, 50); 
		alreadyStarted = 1;
	}
	
	}
	
	function level_start(){
		move_speed = 3;
		rocks_array = [];
		coins_array = [];

		
	var width = canvas.width;
	var width_coin = canvas.width - 64; //so we don't run off the edge of our canvas
    var height = canvas.height;
    var height_coin = canvas.height - 264; //so we don't run off the edge of our canvas
	level_num = level_num + 1;
    var rockCount = level_num; // Number of rocks is double the number of coins
    var coinCount = 1; // Number of coins

    for (var i=0; i<rockCount; i++) {

        var x = Math.random()*width;

        var y = Math.random()*height;

        rocks_array.push(new rocks(x,0,Math.floor(Math.random() * 6) + 1));

    }
	
	for (var i=0; i<coinCount; i++) {

        var x = Math.random()*width_coin;

        var y = Math.random()*height_coin;
		
				
		while (y < 100){
		
		var y = Math.random()*height_coin;

		}

        coins_array.push(new coins(x,y,3));

    }
	}
	
	function add_rock(){
	
		var width = canvas.width;
		var height = canvas.height;
		var x = Math.random()*width;
		var y = Math.random()*height;

        rocks_array.push(new rocks(x,0,Math.floor(Math.random() * 6) + 1));
	}
	
	function move_coin(){
		coins_array = [];
		var width_coin = canvas.width - 64; //so we don't run off the edge of our canvas
		var height_coin = canvas.height - 264;
		var x = Math.random()*width_coin;
		var y = Math.random()*height_coin;
		
		while (y < 100){
		
		var y = Math.random()*height_coin;

		}
		
		coins_array.push(new coins(x,y,3));
	}
	
	function clear(){
	//clear our board! 
	c_canvas.width=c_canvas.width;
	c_canvas.height=c_canvas.height;
	}
	
	//where our mouse goes our blob goes
	function mouseupdates(e) {
	var bounding_box=c_canvas.getBoundingClientRect();
        blob_pos_x=(e.clientX-bounding_box.left) *
                             (c_canvas.width/bounding_box.width);	
        blob_pos_y=(e.clientY-bounding_box.top) *
				(c_canvas.height/bounding_box.height);	
}	
		
	//define our rocks object
	function rocks(x, y, speed){
	this.x = x;
	this.y = y;
	this.speed = speed;
	}
	
	//define our coins object (the same as the rocks tbf, but that could change?
	function coins(x, y, speed){
	this.x = x;
	this.y = y;
	this.speed = speed;
	}
	
	
	//Our game loop that will run every 50ms 
	function game_loop(){
	clear();
	draw_blob();
	draw_coins();
	draw_rocks();
	draw_info();
	colide();
	
	}
	
	//Game collision, all collision is dealt out here!
	function colide(){
	//Has my blob collided with any rocks? 18 = rock width 22 = blob width 32 = rock height 23 = blob height
	for (var i=0; i<rocks_array.length; i++) {
	if (blob_pos_x < rocks_array[i].x + 18  && blob_pos_x + 22  > rocks_array[i].x &&
    blob_pos_y < rocks_array[i].y + 32 && blob_pos_y + 23 > rocks_array[i].y) {
	//remove our rock and remove a life.	
	rocks_array[i].y = 500; //move our rock to the end of the canvas thus moving it to the top a moment later but we've randomized our x,y,speed.
	lives = lives - 1;
	damage.play();
	if (lives == 0){
	end_level();
	}
	}
	}
	//end of rock collision
	for (var i=0; i<coins_array.length; i++) {
	if (blob_pos_x < coins_array[i].x + 32  && blob_pos_x + 22  > coins_array[i].x &&
    blob_pos_y < coins_array[i].y + 32 && blob_pos_y + 23 > coins_array[i].y) {
	//increase our score and add a new rock?	
		score = score + 100;
		
		if(typeof(Storage)!=="undefined")
		{
			if (score > localStorage.score){
			localStorage.score = score;
			}

		
		}
		levelup.volume = 0.5;
		levelup.play();
		add_rock();
		move_coin();
	}
	}
	
	}
	
	//We've died/ have 0 lives left, lets show that information and allow us to start the game again.
	function end_level(){
	pauseBgMusic();
	clearInterval(game_id);
	clear();
	
	endgame.play();
	
	ctx.textAlign = "center";
	ctx.font = "25px Verdana";
	ctx.strokeStyle = "#ff0000";
	ctx.strokeText("Coin collector!", 500,100);
	ctx.strokeText("You lose! You scored:", 500,200);
	ctx.strokeText(score, 500,250);
	ctx.strokeText("Click to play again.", 500,300);
	if(typeof(Storage)!=="undefined")
		{
	ctx.strokeText("Highest score: " + localStorage.score + " Previous Score: " + localStorage.prevScore + "", 500,400);
	if (localStorage.prevScore){
		localStorage.prevScore = score;
	}
	}
	score = 0;
	alreadyStarted = 2;
	
	}

	//Draw our constant information (lives and score for the moment), maybe level?
	function draw_info(){
	
	ctx.font = "12px Verdana";
	ctx.strokeStyle = "#ff0000";
	ctx.strokeText("Lives: ", 10,490);
	ctx.strokeText(lives, 50,490);
	ctx.strokeText("Score: ", 70,490);
	ctx.strokeText(score, 110,490);
	
	
	}

	
	//Draw our rocks from our array, and reset them if they're off the screen.
	function draw_rocks(ctx, x, y){
			  for (var i=0; i<rocks_array.length; i++) {

        c_canvas.getContext("2d").drawImage(rock_image, rocks_array[i].x, rocks_array[i].y);
		rocks_array[i].y = rocks_array[i].y+ rocks_array[i].speed;
		
			//reset rocks to top of screen change their x and speed.
			if (rocks_array[i].y > c_canvas.height - 20){
				rocks_array[i].y = 0;
				rocks_array[i].x = Math.random()*c_canvas.width;
				//rocks_array[i].speed = rocks_array[i].speed + Math.floor(Math.random() * 6) + 1 //hardcore mode? rocks go faster every time they reset.
				
				//change rock speed
				rocks_array[i].speed = Math.floor(Math.random() * 6) + 1
			}
		}
	}
	  
	//Draw our coin from our array (maybe multiple coins at a higher level etc.)
	function draw_coins(){
	  		  for (var i=0; i<coins_array.length; i++) {

        c_canvas.getContext("2d").drawImage(coin_image, coins_array[i].x, coins_array[i].y);

		}
	  
	}
	 
	//Draw our blob 
	function draw_blob() {
		    c_canvas.getContext("2d").drawImage(blob_image, blob_pos_x, blob_pos_y);
	}
	
	//Self explanitory, check our position (so we're not out of our canvas) and then move our position by our movement speed (keyboard) in the desired direction
	function move_left() {
	   check_pos();
	   blob_pos_x = blob_pos_x - move_speed;
	}
	
	//Self explanitory, check our position (so we're not out of our canvas) and then move our position by our movement speed (keyboard) in the desired direction
	function move_up() {
	   check_pos();
	   blob_pos_y = blob_pos_y - move_speed;
	}
	
	//Self explanitory, check our position (so we're not out of our canvas) and then move our position by our movement speed (keyboard) in the desired direction
	function move_right() {
	 check_pos();
	  blob_pos_x = blob_pos_x + move_speed;
	}
	
	//Self explanitory, check our position (so we're not out of our canvas) and then move our position by our movement speed (keyboard) in the desired direction
	function move_down() {
	 check_pos(); 
	 blob_pos_y = blob_pos_y + move_speed;
	}
	
	//Self explanitory, check our position (so we're not out of our canvas)
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