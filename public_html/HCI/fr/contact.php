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
	
?>
<div id="primary_content">
<div id="form" style="margin: 0 auto; width: 350px;">
				<p class="form" id="vorschauanrede" style="display: none;">
				Title: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="anrede" value="Mr."> &nbsp;&nbsp;Mr. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="anrede" value="Mrs."> &nbsp;&nbsp;Mrs.			</p>
						<p class="form" id="vorschauvorname" style="display: none;">
					First Name: <br>
					<input type="text" style="width: 100%;" class="form" id="vorschauinputvorname">
				</p>
							<p class="form" id="vorschauname" style="display: block;">
					Name: <br>
					<input type="text" style="width: 100%;" class="form" id="vorschauinputname">
				</p>
							<p class="form" id="vorschauemail" style="display: block;">
					E-Mail: <br>
					<input type="email" style="width: 100%;" class="form" id="vorschauinputemail">
				</p>
							<p class="form" id="vorschaubetreff" style="display: block;">
					Subject: <br>
					<input type="text" style="width: 100%;" class="form" id="vorschauinputbetreff">
				</p>
						<p class="form" id="vorschaunachricht" style="display: block;">
				Message: <br>
				<textarea style="width: 100%;" rows="9" class="form" id="vorschauinputnachricht"></textarea>
			</p>
				
	<p class="form" style="text-align: center;"><input type="submit" value="Send message!" class="formsubmit" id="vorschausubmit1" onclick="alert('This is a prototype'); return false;"></p>
</div>

</div>
<?
include("./includes/footer.php");
?>
