<?php
/** This file will be used to display all of your profile information.
    This information shall persist of your basic info, work experience,
    contact information, friends and much more!
**/
$userid = $_SESSION['recipeuser'];

echo "<h1>Chef $userid</h1>\n";

$query  = "SELECT * FROM users WHERE userid = '$userid'";
$result = mysql_query($query) or die('Could not retrieve user info: ' .mysql_error());

$row = mysql_fetch_array($result, MYSQL_ASSOC) or die('No records retrieved');

$firstName = $row['firstName'];
$lastName  = $row['lastName'];
/* This is the code for the about section of the profile. */
echo "<h4>About</h4>\n";
	echo "<table width=\"60%\" cellpadding=\".5px\" cellspacing=\"1px\" \n";
	echo "border=\"0px\" align=\"left\">\n";
			echo "<tr>\n";
				echo "<td align=\"left\">Real Name:</td>\n";
				echo "<td align=\"left\"><i>$lastName, $firstName</i></td>\n";
			echo "</tr>\n";
			echo "<tr>\n";
				echo "<td align=\"left\">Gender:</td>\n";
				echo "<td align=\"left\"><i></i></td>\n";
			echo "</tr>\n";
			echo "<tr>\n";
				echo "<td align=\"left\">Birthday:</td>\n";
				echo "<td align=\"left\"><i></i></td>\n";
			echo "</tr>\n";
			echo "<tr>\n";
				echo "<td align=\"left\">Relationship:</td>\n";
				echo "<td align=\"left\"><i></i></td>\n";
			echo "</tr>\n";
	echo "</table>\n";
?>

