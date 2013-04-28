
	var canvas, ctx;
	var blob_pos_x;
	var blob_pos_y;
	var alreadyStarted = 0;
	var level_num;
	var lives;
	var score;
	var special_spawned = 0;
	var pauseenabled =0;
	var playing;
	var rocks_array;
	var special_array;
	var coins_array;
	var move_speed;
	var blob_image = new Image();
	var rock_image = new Image();
	var coin_image = new Image();
	var special_image = new Image();
	blob_image.src = './static/images/meowth.gif';
	rock_image.src = './static/images/rock.png';
	coin_image.src = './static/images/coin.png';
	special_image.src = './static/images/heart.gif';
	var c_canvas = document.getElementById("game_canvas");
	var c_context = c_canvas.getContext("2d");
	
	function initbgmusic(){
	bg = document.getElementById('bg'); 
    bg.loop =  true; 
	playing = 1;
    //bg.currentTime = 0; 
    bg.play(); 
	}
	
	function playBgMusic(){
	bg = document.getElementById('bg'); 
	playing = 1;
	bg.volume = 0.5;
    bg.play(); 
	}
	
	function musicHandler(){
	if (playing == 1){
	pauseBgMusic();
	}
	else{
	playBgMusic();
	}
	}
	
	function pauseBgMusic(){
		bg = document.getElementById('bg'); 
		bg.pause();
		playing = 0;
    
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
	ctx.strokeText("Press 'h' for help or 'a' for achievements list.", 500,400);
	canvas.addEventListener("click", initGameStart, false);
	canvas.addEventListener("mousemove",mouseupdates,false);
	  }
	  
	function initGameStart(){
	
	if (alreadyStarted == 0){
		level_start();
		initbgmusic();
		game_id=setInterval(game_loop, 50); 
		alreadyStarted = 1;
		if (localStorage.timesPlayed){
		localStorage.timesPlayed = Number(localStorage.timesPlayed) + 1;
		}
		else{
		localStorage.timesPlayed = 1;
		}
	}
	
	if (alreadyStarted == 2){
		restartGameVars();
		level_start();
		playBgMusic();
		game_id=setInterval(game_loop, 50); 
		alreadyStarted = 1;
		localStorage.timesPlayed = Number(localStorage.timesPlayed) + 1;
	}
	
	}
	
	function level_start(){
		move_speed = 3;
		rocks_array = [];
		special_array = [];
		coins_array = [];

		
	var width = canvas.width;
	var width_coin = canvas.width - 64; //so we don't run off the edge of our canvas
    var height = canvas.height;
    var height_coin = canvas.height - 264; //so we don't run off the edge of our canvas
	level_num = level_num + 1;
    var rockCount = level_num; // Number of rocks is double the number of coins
    var coinCount = 1; // Number of coins
    var specialCount = 0; // Number of "specials"

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
		var random = Math.floor(Math.random() * 6) + 1
		if (random == 3 && special_spawned == 0){
		add_special();
		}
		
        rocks_array.push(new rocks(x,0,Math.floor(Math.random() * 6) + 1));
	}
	
	function add_special(){
		
		var width = canvas.width;
		var height = canvas.height;
		var x = Math.random()*width;
		var y = Math.random()*height;

        special_array.push(new lifes(x,0,Math.floor(Math.random() * 6) + 1));
		special_spawned = 1;
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
	
	function lifes(x, y, speed){
	this.x = x;
	this.y = y;
	this.speed = speed;
	}
	
	//Our game loop that will run every 50ms 
	function game_loop(){
	if (pauseenabled == 0){
	clear();
	draw_blob();
	draw_coins();
	draw_specials();
	draw_rocks();
	draw_info();
	colide();
	}
	
	}
	
	//Game collision, all collision is dealt out here!
	function colide(){
	//Has my blob collided with any rocks? 18 = rock width 22 = blob width 32 = rock height 23 = blob height
	for (var i=0; i<rocks_array.length; i++) {
	if (blob_pos_x < rocks_array[i].x + 16  && blob_pos_x + 20  > rocks_array[i].x &&
    blob_pos_y < rocks_array[i].y + 30 && blob_pos_y + 20 > rocks_array[i].y) {
	//remove our rock and remove a life.	
	rocks_array[i].y = 500; //move our rock to the end of the canvas thus moving it to the top a moment later but we've randomized our x,y,speed.
	lives = lives - 1;
	if (localStorage.deaths){
	localStorage.deaths = Number(localStorage.deaths) + 1;
	}
	else{
	localStorage.deaths = 1;
	}
	damage.play();
	if (lives == 0){
	end_level();
	}
	}
	}
	//end of rock collision
	for (var i=0; i<coins_array.length; i++) {
	if (blob_pos_x < coins_array[i].x + 30  && blob_pos_x + 20  > coins_array[i].x &&
    blob_pos_y < coins_array[i].y + 30 && blob_pos_y + 20 > coins_array[i].y) {
	//increase our score and add a new rock?	
		score = score + 100;
		levelup.volume = 0.5;
		levelup.play();
		add_rock();
		move_coin();
		if (localStorage.collectedcoins){
	localStorage.collectedcoins = Number(localStorage.collectedcoins) + 1;
	}
	else{
	localStorage.collectedcoins = 1;
	}
	}
	}
	//end of coin collision
	for (var i=0; i<special_array.length; i++) {
	if (blob_pos_x < special_array[i].x + 30  && blob_pos_x + 20  > special_array[i].x &&
    blob_pos_y < special_array[i].y + 30 && blob_pos_y + 20 > special_array[i].y) {
	//increase our score and add a new rock?	
		score = score + 100;
		lives = lives + 1;
		levelup.volume = 0.5;
		levelup.play();
		add_rock();
		special_array = [];
		special_spawned = 0;
				if (localStorage.collectedlives){
	localStorage.collectedlives = Number(localStorage.collectedlives) + 1;
	}
	else{
	localStorage.collectedlives = 1;
	}
	}
	}
	
	}
	
	//We've died/ have 0 lives left, lets show that information and allow us to start the game again.
	function end_level(){
	check_achievements();
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
	ctx.strokeText("Press 'h' for help or 'a' for achievements list.", 500,450);
	if(typeof(Storage)!=="undefined")
		{
		if (localStorage.score){
		if (score > localStorage.score){
			localStorage.score = score;
		}
		}
		else{
		localStorage.score = 0;
		}
		if (localStorage.prevScore){
		//do nothing this time around, still too early to update, we just didn't want undefined!
		}
		else{
		localStorage.prevScore = 0;
		}
	ctx.strokeText("Highest score: " + localStorage.score + " Previous Score: " + localStorage.prevScore + "", 500,400);
	if (localStorage.prevScore){
		localStorage.prevScore = score;
		}
	}
	score = 0;
	alreadyStarted = 2;
	
	}
	
	function help_view(){
	clear();
	ctx.textAlign = "center";
	ctx.font = "25px Verdana";
	ctx.strokeStyle = "#ff0000";
	ctx.strokeText("Help screen!", 500,20);
	ctx.font = "12px Verdana";
	ctx.fillText("If you're having trouble using the keyboard, try the mouse for greater speeds and accuracy.", 500,50);
	ctx.fillText("Stay away from the top of the screen, rocks might appear at great speeds and come flying towards you with little time to react.", 500,100);
	ctx.fillText("You can press 'p' to pause the game and give yourself a rest. ", 500,150);
	
	
		ctx.font = "25px Verdana";
	ctx.strokeStyle = "#ff0000";
	ctx.strokeText("Click to start the game!", 500,400);
	}
	
	function achievements_view(){
	
	clear();
	ctx.font = "25px Verdana";
	ctx.strokeStyle = "#ff0000";
	if (localStorage.over1000){
	ctx.strokeText("Achieve over 1000 score - " + localStorage.over1000 + "", 20,20);
	}
	else{
	ctx.strokeText("Achieve over 1000 score - Locked", 20,20);
	}
	if (localStorage.over2000){
	ctx.strokeText("Achieve over 2000 score - " + localStorage.over2000 + "", 20,40);
	}
	else{
	ctx.strokeText("Achieve over 2000 score - Locked", 20,40);
	}
	if (localStorage.over3000){
	ctx.strokeText("Achieve over 3000 score - " + localStorage.over3000 + "", 20,60);
	}
	else{
	ctx.strokeText("Achieve over 3000 score - Locked", 20,60);
	}
	if (localStorage.over4000){
	ctx.strokeText("Achieve over 4000 score - " + localStorage.over4000 + "", 20,80);
	}
	else{
	ctx.strokeText("Achieve over 4000 score - Locked", 20,80);
	}
	if (localStorage.over5000){
	ctx.strokeText("Achieve over 5000 score - " + localStorage.over5000 + "", 20,100);
	}
	else{
	ctx.strokeText("Achieve over 5000 score - Locked", 20,100);
	}
	if (localStorage.over6000){
	ctx.strokeText("Achieve over 6000 score - " + localStorage.over6000 + "", 20,120);
	}
	else{
	ctx.strokeText("Achieve over 6000 score - Locked", 20,120);
	}
	if (localStorage.over7000){
	ctx.strokeText("Achieve over 7000 score - " + localStorage.over7000 + "", 20,140);
	}
	else{
	ctx.strokeText("Achieve over 7000 score - Locked", 20,140);
	}
	if (localStorage.over8000){
	ctx.strokeText("Achieve over 8000 score - " + localStorage.over8000 + "", 20,160);
	}
	else{
	ctx.strokeText("Achieve over 8000 score - Locked", 20,160);
	}
	if (localStorage.over9000){
	ctx.strokeText("Achieve over 9000 score - " + localStorage.over9000 + "", 20,180);
	}
	else{
	ctx.strokeText("Achieve over 9000 score - Locked", 20,180);
	}
	if (localStorage.timesPlayed > 10){
	ctx.strokeText("Play the game 10 times - Complete", 20,200);
	}
	else{
	ctx.strokeText("Play the game 10 times - Locked", 20,200);
	}
	if (localStorage.timesPlayed > 50){
	ctx.strokeText("Play the game 50 times - Complete", 20,220);
	}
	else{
	ctx.strokeText("Play the game 50 times - Locked", 20,220);
	}
	if (localStorage.timesPlayed > 100){
	ctx.strokeText("Play the game 100 times - Complete", 20,240);
	}
	else{
	ctx.strokeText("Play the game 100 times - Locked", 20,240);
	}
	if (localStorage.deaths > 10){
	ctx.strokeText("Lose 10 lives - Complete", 20,260);
	}
	else{
	ctx.strokeText("Lose 10 lives - Locked", 20,260);
	}
	if (localStorage.deaths > 50){
	ctx.strokeText("Lose 50 lives - Complete", 20,280);
	}
	else{
	ctx.strokeText("Lose 50 lives - Locked", 20,280);
	}
	if (localStorage.deaths > 100){
	ctx.strokeText("Lose 100 lives - Complete", 20,300);
	}
	else{
	ctx.strokeText("Lose 100 lives - Locked", 20,300);
	}
	if (localStorage.dodgedRocks > 1000){
	ctx.strokeText("Dodge 1000 rocks - Complete", 20,320);
	}
	else{
	ctx.strokeText("Dodge 1000 rocks - Locked", 20,320);
	}
	if (localStorage.dodgedRocks > 5000){
	ctx.strokeText("Dodge 5000 rocks - Complete", 20,340);
	}
	else{
	ctx.strokeText("Dodge 5000 rocks - Locked", 20,340);
	}
	if (localStorage.dodgedRocks > 10000){
	ctx.strokeText("Dodge 10,000 rocks - Complete", 20,360);
	}
	else{
	ctx.strokeText("Dodge 10,000 rocks - Locked", 20,360);
	}
	if (localStorage.collectedcoins > 100){
	ctx.strokeText("Collect 100 coins - Complete", 20,380);
	}
	else{
	ctx.strokeText("Collect 100 coins - Locked", 20,380);
	}
	if (localStorage.collectedcoins > 500){
	ctx.strokeText("Collect 500 coins - Complete", 20,400);
	}
	else{
	ctx.strokeText("Collect 500 coins - Locked", 20,400);
	}
	if (localStorage.collectedcoins > 1000){
	ctx.strokeText("Collect 1000 coins - Complete", 20,420);
	}
	else{
	ctx.strokeText("Collect 1000 coins - Locked", 20,420);
	}
	if (localStorage.collectedlives > 100){
	ctx.strokeText("Collect 100 extra lives - Complete", 500,20);
	}
	else{
	ctx.strokeText("Collect 100 extra lives - Locked", 500,20);
	}
		if (localStorage.collectedlives > 500){
	ctx.strokeText("Collect 500 extra lives - Complete", 500,40);
	}
	else{
	ctx.strokeText("Collect 500 extra lives - Locked", 500,40);
	}
			if (localStorage.collectedlives > 1000){
	ctx.strokeText("Collect 1000 extra lives - Complete", 500,60);
	}
	else{
	ctx.strokeText("Collect 1000 extra lives - Locked", 500,60);
	}
	ctx.textAlign = "center";
	ctx.strokeText("Click to start the game!", 500,480);
	}
	
	function check_achievements(){
	if(typeof(Storage)!=="undefined")
		{
		
		if (score > 1000){
		localStorage.over1000 = "Complete";
		}
		if (score > 2000){
		localStorage.over2000 = "Complete";
		}
		if (score > 3000){
		localStorage.over3000 = "Complete";
		}
		if (score > 4000){
		localStorage.over4000 = "Complete";
		}
		if (score > 5000){
		localStorage.over5000 = "Complete";
		}
		if (score > 6000){
		localStorage.over6000 = "Complete";
		}
		if (score > 7000){
		localStorage.over7000 = "Complete";
		}
		if (score > 8000){
		localStorage.over8000 = "Complete";
		}
		if (score > 9000){
		localStorage.over9000 = "Complete";
		}
		
		
		
		}
	}
	
	function pause(){
	clear();
	if (pauseenabled == 0){
		pauseenabled = 1;
	}
	else{
		pauseenabled = 0;
	}
	ctx.font = "12px Verdana";
	ctx.strokeStyle = "#ff0000";
	ctx.strokeText("Lives: ", 10,490);
	ctx.strokeText(lives, 50,490);
	ctx.strokeText("Score: ", 70,490);
	ctx.strokeText(score, 110,490);
	
	ctx.font = "24px Verdana";
	ctx.strokeText("Paused", 500,200);
	
	
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
				
				if (localStorage.dodgedRocks){
					localStorage.dodgedRocks = Number(localStorage.dodgedRocks) + 1;
				}
				else{
				localStorage.dodgedRocks = 1;
				}
				
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
	
	function draw_specials(){
	for (var i=0; i<special_array.length; i++) {

        c_canvas.getContext("2d").drawImage(special_image, special_array[i].x, special_array[i].y);
		special_array[i].y = special_array[i].y+ special_array[i].speed;
		
			//reset rocks to top of screen change their x and speed.
			if (special_array[i].y > c_canvas.height - 20){
								
				special_array[i].y = 0;
				special_array[i].x = Math.random()*c_canvas.width;				
				//change rock speed
				special_array[i].speed = Math.floor(Math.random() * 6) + 1
			}
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
		  
		// 'a'
		case 65:
		// action when pressing down key
		  achievements_view();
		  break; 
		// 'h'
		case 72:
		// action when pressing down key
		  help_view();
		  break;
		  
		// 'p'
		case 80:
		// action when pressing down key
		  pause();
		  break;

		default: 
		  break; 
	  } 
	}