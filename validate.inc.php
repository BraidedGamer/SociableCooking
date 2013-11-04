<?php

$userid = $_POST['userid'];
$password = $_POST['password'];

$query = "SELECT userid from users WHERE userid = '$userid' and password = PASSWORD('$password')";
$result = mysql_query($query);

if(mysql_num_rows($result) == 0)
{
	echo "<h1>Sorry</h1>\n";
	echo "<p>Your user account data was incorrect please try again!</p>\n";
	
echo "<form action=\"index.php\" method=\"post\" target=\"_self\">\n";

echo "<table width=\"200px\" border=\"0\" cellspacing=\"2.5\" cellpadding=\"0\" align=\"center\">\n";
echo "<tr><td align=\"right\"><font color=\"#000\">\n";
echo "<b>UserName:</b>\n";
echo "</font></td>\n";
echo "<td align=\"left\">\n";
echo "<input type=\"text\" name=\"userid\" id=\"userid2\">\n";
echo "</td></tr>\n";
echo "<td align=\"right\"><font color=\"#000\">\n";
echo "<b>Password:</b>\n";
echo "</font></td>\n";
echo "<td align=\"left\">\n";
echo "<input type=\"password\" name=\"password\" id=\"password2\">\n";
echo "</td></tr>\n";
echo "<tr><td colspan=\"2\" align=\"right\"><input type=\"submit\" name=\"login\" id=\"loginbtn\" value=\"Login\"></td></tr>\n";
echo "<tr><td colspan=\"2\"><input type=\"hidden\" value=\"validate\" name=\"card\"></td></tr>\n";

echo "<tr><td colspan=\"2\"><hr></td></tr>\n";
echo "<tr><td colspan=\"2\">Forgotten Password?</td></tr>\n";

echo "</table></form>\n";
} else
{
	$_SESSION['recipeuser'] = $userid;
	echo "<h1>Congratulations</h1>\n";
	echo "<p>Your account credientials have been verified and you are now logged in and ready to use this site.</p>\n";
	echo "<a href=\"index.php\">My Recipe Book</a>\n";
}
?>
