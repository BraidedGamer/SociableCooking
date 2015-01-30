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
$geneID    = $row['geneID'];
$email     = $row['email'];
/* This is the code for the about section of the profile. */
echo "<h4>About</h4>\n";
	echo "<div id=\"infoDisplay\">\n";
		echo "<table width=\"70%\" cellpadding=\".5px\" cellspacing=\"1px\" \n";
		echo "border=\"0px\" align=\"left\">\n";
			echo "<tr>\n";
				echo "<td align=\"left\">Real Name:</td>\n";
				echo "<td align=\"left\"><i>$lastName, $firstName</i></td>\n";
			echo "</tr>\n";
			echo "<tr>\n";
				echo "<td align=\"left\">Recipe Count:</td>\n";
				$query = "SELECT count(recipeid) FROM recipes WHERE poster = '$userid' OR spicer = '$userid'";
				$result = mysql_query($query);
				$row = mysql_fetch_array($result);
				if($row[0] == 0) {
					echo "<td align=\"left\"><i>You haven't shared any recipes with us!</i></td>\n";
				} else {
					$totrecipes = $row[0];
					echo "<td align=\"left\"><i>You have <b>$totrecipes</b> cards!</i></td>\n";
				}
			echo "</tr>\n";
			echo "<tr>\n";
				echo "<td align=\"left\">Gender:</td>\n";
				$genequery = "SELECT gender FROM gender WHERE geneID = $geneID";
		                $generesult = mysql_query($genequery) or die('Could not retrieve category identification: ' .mysql_error());
                		$generow = mysql_fetch_array($generesult, MYSQL_ASSOC);
                		$gender = $generow['gender'];
				echo "<td align=\"left\"><i>$gender</i></td>\n";
			echo "</tr>\n";
			echo "<tr>\n";
				echo "<td align=\"left\">Birthday:</td>\n";
				echo "<td align=\"left\"><i>birthdate</i></td>\n";
			echo "</tr>\n";
			echo "<tr>\n";
				echo "<td align=\"left\">Relationship:</td>\n";
				echo "<td align=\"left\"><i>relationship status</i></td>\n";
			echo "</tr>\n";
		echo "</table>\n";
	echo "</div>\n";
/* This is the end of the about section and the start of the bio section */
echo "<h4>Biography</h4>\n";
	echo "<div id=\"infoDisplay\">\n";
		echo "<p>This is a Biography section to be filled up later!</p>\n";
	echo "</div>\n";
/* This is the end of the bio section */
?>

