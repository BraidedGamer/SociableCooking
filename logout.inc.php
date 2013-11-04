<?php

if (isset($_SESSION['recipeuser']))
{
	unset($_SESSION['recipeuser']);
	echo "<h1>You are now logged out</h1>\n";
	echo "<p>You are now logged out. If you did not log out yourself
	perhaps your session timed itself out. If you still wish to
	submit some recipes of your own please log back in and continue.</p>\n";
	echo "<p>For your convience there is a link to the login page following this text.<br><br>\n";
	echo "<a href=\"index.php?card=login\">This way to Login</a></p>\n";
} else
{
	echo "<h1>Sorry, your are not currently logged in</h1>\n";
	echo "<p>Sorry, but it seems you aren't logged in yet. If you remeber logging in
	then perhaps your session has timed out. To continue posting recipes and comments
	you need to login using your userid and password.\n";
	echo "Please use the following link to get to the login form: \n";
	echo "<br><br><a href=\"index.php?card=login\">Login to Post</a></p>\n";
}
?>
