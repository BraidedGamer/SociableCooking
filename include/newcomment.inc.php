<?php

$recipeid = $_GET['id'];
if (!isset($_SESSION['recipeuser']))
{
	echo "<h1>Sorry</h1>\n";
	echo "<a href=\"index.php?card=showrecipe&id=$recipeid\">Go back to recipe</a>\n";
} else
{
	$userid = $_SESSION['recipeuser'];
	echo "<form action=\"index.php\" method=\"post\">\n";
	echo "<table width=\"80%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\">\n";
	echo "<tr><td><h1>Enter your comment</h1></td></tr>\n";
	echo "<tr><td><textarea rows=\"10\" cols=\"50\" name=\"comment\" id=\"comment\"></textarea></td></tr>\n";
	echo "<tr><td><input type=\"hidden\" name=\"poster\" value=\"$userid\">\n";
	echo "<input type=\"hidden\" name=\"recipeid\" value=\"$recipeid\">\n";
	echo "<input type=\"hidden\" name=\"card\" value=\"addcomment\"></td></tr>\n";
	echo "<tr><td align=\"left\"><input type=\"submit\" value=\"Archive\" id=\"archivebtn\"></td></tr>\n";
	echo "</table>\n";
	echo "</form>\n";
}
?>

