<?php

if(isset($_SESSION['recipeuser']))
{
	$userid = $_SESSION['recipeuser'];
	$query = "SELECT fullname FROM users WHERE userid = '$userid'";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result, MYSQL_ASSOC);
	$fullname = $row['fullname'];

echo "<h1>" . $fullname . "'s Account</h1>\n";

$query = "SELECT userid, password, email, fullname FROM users WHERE userid = '$userid'";
$result = mysql_query($query);
$row = mysql_fetch_array($result, MYSQL_ASSOC);

	$userid = $row['userid'];
	$password = $row['password'];
	$email = $row['email'];
	$fullname = $row['fullname'];
	// userid section
echo "<form action=\"index.php\" method=\"post\">\n";
echo "<table width=\"80%\" cellpadding=\"0\" cellspacing=\"3\" border=\"0\" align=\"center\">\n";
echo "<tr><td align=\"right\">Userid:</td><td><b><i>$userid</i></b></td></tr>\n";
echo "<tr><td colspan=\"2\" align=\"center\">\n";
echo "I'm sorry but your userid is unchangable!</td></tr>\n";
	// email and fullname section
echo "<tr><td align=\"right\">Fullname:</td><td align=\"left\">\n";
echo " <input type=\"text\" size=\"40\" value=\"$fullname\" name=\"fullname\" id=\"fullName\"></td></tr>\n";
echo "<tr><td align=\"right\">Email:</td><td align=\"left\">\n";
echo " <input type=\"text\" size=\"50\" value=\"$email\" name=\"email\" id=\"email\"></td></tr>\n";

echo "<tr><td colspan=\"2\"></td></tr>\n";
echo "<tr><td colspan=\"2\"></td></tr>\n";
	// Password section
echo "<tr><td align=\"right\">Password:</td><td align=\"left\">\n";
echo " <input type=\"password\" size=\"40\" name=\"password\" id=\"passwordREG\"></td></tr>\n";
echo "<tr><td align=\"right\">Confirm Password:</td><td align=\"left\">\n";
echo " <input type=\"password\" size=\"40\" name=\"confirm\" id=\"confirmPASS\"></td></tr>\n";
echo "<tr><td colspan=\"2\" align=\"center\">\n";
echo "<input type=\"submit\" value=\"update\" id=\"updatebtn\"></td></tr>\n";
echo "</table>\n";
	// Hidden Fields
echo "<input type=\"hidden\" name=\"card\" value=\"savecred\">\n";
echo "<input type=\"hidden\" name=\"id\" value=\"$userid\">\n";
echo "</form>\n";
}
?>