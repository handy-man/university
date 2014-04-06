<?php
	//The title, usually your web address but can just be something like "The fancy pants community"
	$title_text = "Welcome to GmadGaming.net [Modified] DarkRP";
	//Use custom font type, lots of different custom fonts can be found here: http://www.dafont.com/
	$custom_font = false;
	//Custom font source (if we're using a custom font type, we need the source of that fonts location) example : http://www.yourwebsitehere.com/loading/myfont.ttf
	$font_src = "";
	
	//Your steamAPI key, this is required and can be applied for here: http://steamcommunity.com/dev
	$steam_api = "F4EF52C2AC3B2C5C7F654BCF0063A38C";
	
	//Custom serverip, the serverip address comes from Steam data. If a user's profile is set to private/friends only this field will be blank, so set a custom one.
	$custom_serverip = true;
	
	//This is useful for when you want user's to check for a dns (exmaple: ttt.sngaming.org) for your server, or they have a private profile.
	$serverip_text = "50.31.65.247:27015";
	
	//The largest visible background colour by default: #2C3539 
	//Will not function/ be used if $bgimg_enabled = true, if your background isn't this colour set $bgimg_enabled to false. 
	$body_main = "#2C3539";
	
	//The gradient at the top going to the bottom. Default: #1765B5
	$header_top_gradient = "#1765B5";
	//The gradient at the bottom going to the top/ Default: #2096E1
	$header_bot_gradient = "#2096E1";
	
	//Title colour background. Default: #1061B3 or R:16 G:97 B:179
	$title_red = "16";
	$title_green = "97";
	$title_blue = "179";
	
	//The colour of all the font in the loadingurl. Defualt: white
	$text_colour = "white";
	
	//Dropshadow colour. Default: #1589FF
	$drop_colour = "#1589FF";
	
	//Community name in welcome message
	$com_name = "Gmad Gaming";
	
	//Welcome message text. (LEAVE BLANK IF NOT REQUIRED)
	$welcome_message_1 = "Be sure to take a quick look at the rules above and read the rules in-game.";
	
	//Welcome message text for a second paragraph with 5px distance between the first paragraph and the second. (LEAVE BLANK IF NOT REQUIRED)
	$welcome_message_2 = "Signup on our forums at GmadGaming.net";
	
	//Welcome message text for a third paragraph with 5.px distance between the first paragraph and the second. (LEAVE BLANK IF NOT REQUIRED)
	$welcome_message_3 = "We are currently <u><b>accepting</b></u> Staff Applications on our forums at GmadGaming.net";
    
    $welcome_message_4 = "Our Community owner <b>Nascar</b>.";
    
    $welcome_message_6 = "Server Developer: <b>Handy_man</b>";
    
    $welcome_message_7 = "HeadAdmin: <b>------</b>";
    
    $welcome_message_8 = "Make suggestions on the forums at GmadGaming.net";
	
	//NEW SINCE 1.1
	//This is the true/false boolean for if you want the information such as serverip, gamemode etc to line up with the results as seen here: http://www.thehiddennation.com/coderhire-example4.png set to true, else false.
	$lined_up = true;
	
	//NEW SINCE 1.2
	//This enables a background image to be used over the normal plain background colour
	$bgimg_enabled = true;
	
	//The background of the entire loadingurl can be generated here, please insert an absolute reference link to the image, preferably this would be on your website host.
	//Example image used in coderhire-example5.png: http://www.hdwallpapers3d.com/wp-content/uploads/2013/05/3d-abstract-hd-wallpaper.jpg NOTE: I do not own the copyright to this image.
	$bgimg_src = "http://gmadgaming.net/files/theme/content-bg.jpg?530989";
	
	//All content is split up into box's, this is the opacity of that box (ability to see through the box) allowing you to see background colour's/ images.
	$opaque_enabled = true;
	
	//All content is split up into box's this is the colour of that box, default R:0 G:0 B:0 AKA black.
	$box_backgroud_red = "0";
	
	//All content is split up into box's this is the colour of that box, default R:0 G:0 B:0 AKA black.
	$box_backgroud_green = "0";
	
	//All content is split up into box's this is the colour of that box, default R:0 G:0 B:0 AKA black.
	$box_backgroud_blue = "0";
	
		//New since 1.3
	//The enables the use of a .wav file to be used in your background music (must be a .wav file! don't complain to me that other formats don't work, convert the file!)
	//The wav file should be local to your website hosting to make sure load times are working out great, but this isn't always going to be the case.
	$wav_enabled = false;
	
	//This is the source variable of the .WAV file, $wav_enabled must be set to true for this to become used.
	$wav_src = "";
	
	//This enables the use of a youtube music video, however you must be very careful to only get the part of the link that is required.
	//Every youtube link looks like this: http://www.youtube.com/watch?v=aHjpOzsQ9YI 
	//I want you to only place in the variable $youtube_src the letters after the "v=" so in this example i would want "aHjpOzsQ9YI"
	//This would give me a $youtube_src link that looks like this: "$youtube_src = "aHjpOzsQ9YI";"
	//This process does not work for every video on YouTube, it always seems to work on the non-HD versions of music video's as the HD stops it from working properly.
	$youtube_enabled = true;
	
	//This is the YouTube source variable, REMEMBER! i only want the part after the v= seen in all YouTube links! nothing else! 
	$youtube_src = "Nf8FCLT8S6A";
?>