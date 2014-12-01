<?php

if(isset($_SESSION['recipeuser']))
{
	$userid = $_SESSION['recipeuser'];
	$query = "SELECT firstName, lastName FROM users WHERE userid = '$userid'";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result, MYSQL_ASSOC);
	$firstName = $row['firstName'];
	$lastName = $row['lastName'];

echo "<h1>$firstName $lastName's Account</h1>\n";

$query = "SELECT userid, email, firstName, lastName FROM users WHERE userid = '$userid'";
$result = mysql_query($query);
$row = mysql_fetch_array($result, MYSQL_ASSOC);

	$userid = $row['userid'];
	$email = $row['email'];
	$firstName = $row['firstName'];
	$lastName = $row['lastName'];

echo "<table width=\"80%\" cellpadding=\"0\" cellspacing=\"5\" border=\"0\" align=\"center\">\n";
echo "<tr><td colspan=\"2\"><p>\n";
echo "Hello, $firstName $lastName! Welcome back to SociableCooking.";
echo " This page is designed to allow you to be able to reset ";
echo "your password and view all your membership credientials.";
echo " If you have any trouble in reseting your password just contact me via";
echo " the contact page. Thank you for your patronage.</p></td></tr>\n";

echo "<tr><td colspan=\"2\"><hr></td></tr>\n";

echo "<tr><td align=\"right\">Your Userid:</td><td align=\"left\"><b><i>$userid</i></b></td></tr>\n";
echo "<tr><td align=\"right\">Your Email:</td><td align=\"left\"><b><i>$email</i></b></td></tr>\n";

echo "<tr><td colspan=\"2\" align=\"right\"><a href=\"index.php?card=changecred&userid=$userid\">\n";
echo "Update Credientials</a></td></tr>\n";

echo "</table>\n";

}
?>
