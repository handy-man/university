<?php
/*------------------------\
|        TTT STATS        |
|          Beta           |
|=========================|
|© 2013 SNGaming.org      |
|   All Rights Reserved   |
|=========================|
|   Website printout      |
|      beta testing       |
|      by Handy_man       |
\------------------------*/				

include("./includes/header.php");

if (isset($_SESSION['verifynow'])){
echo "<p class ='noexist'>Your account needs to be verified before you can login, please check your email and spam filters.</p>";
session_destroy();
}


if (isset($_SESSION['failedLogin'])){
echo "<script type='text/javascript' language='JavaScript'> alert('Incorrect Username or Password')</script>";
echo "<p class ='noexist'>Incorrect username or password or account not verified, please check your email and spam filters.</p>";
session_destroy();
}

if (isset($_SESSION['verifyorpass'])){
echo "<script type='text/javascript' language='JavaScript'> alert('Incorrect Username or Password')</script>";
echo "<p class ='noexist'>Incorrect username or password or account not verified, please check your email and spam filters.</p>";
session_destroy();
}
?>
<div id="primary_content">
<form name="form1" method="post" action="checklogin.php">

<p class="center">
<strong>Administrator Login</strong><br/>
<strong>Username</strong>
<input name="u" type="text" id="u" required>
<strong>Password</strong>
<input name="p" type="password" id="p" required>
<button class='button' type='submit' onclick="alert('This is a prototype'); return false;">Login</button>
</form>

</div>
<?PHP include("./includes/footer.php");?>