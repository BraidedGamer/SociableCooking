<?php
/* This is the navigation include file for SociableCooking.com */
echo "<table width=\"20%\" border=\"0\" cellspacing=\"5\" cellpadding=\"0\" align=\"left\">\n";
	echo "<tr><td><appname><a href=\"index.php\">SociableCooking</a></appname></td>\n";
	echo "<td><form action=\"index.php\" method=\"get\">\n";
	echo "<input name=\"searchFor\" type=\"text\" id=\"searchF\">\n";
	echo "<input name=\"card\" type=\"hidden\" value=\"search\">\n";
	echo "</form</td></tr>\n";
echo "</table>\n";
/* This is the start of the unordered list drop and toss menus area. 
 * We begin with the catalog drop menu.
*/
$userid = $_SESSION['recipeuser'];
$cardset = $_REQUEST['card'];
echo "<ul id=\"nav\">\n";
	if($cardset != 'showrecipe') {
		$bookSET = $_REQUEST['card'];
		echo "<li><strong>Catalog</strong><span class=\"darrow\">&#9660;</span>\n";
		if($bookSET != 'community') {
			echo "<ul class=\"drop\">\n";
				echo "<li><a href=\"index.php?card=community\"><strong>Community Recipes</strong></a></li>\n";
			echo "</ul>\n";
		} else if($bookSET != 'dashboard') {
			echo "<ul class=\"drop\">\n";
				echo "<li><a href=\"index.php?card=\"myrecipes\"><strong>My Recipes</strong></a></li>\n";
			echo "</ul>\n";
		}
		echo "</li>\n";
	}
/* This is the end of the catalog drop menu.
 * Now to begin work on the post menu. This especially trickery since I want a drop and toss menu for this.
*/
echo "<li><strong>Post</strong><span class=\"darrow\">&#9660;</span>\n";
	echo "<ul class=\"drop\">\n";
		echo "<li><strong>Recipe</strong>\n";
			echo "<ul class=\"toss\">\n";
				echo "<li><a href=\"index.php?card=newrecipe\"><strong>New</strong></a></li>\n";
				if($cardset == 'showrecipe') {
					$recipeid = $_REQUEST['id'];
					$query = "SELECT poster, spicer FROM recipes WHERE recipeid = $recipeid";
					$result = mysql_query($query);
					$row = mysql_fetch_array($result, MYSQL_ASSOC);

					$poster = $row['poster'];
					$spicer = $row['spicer'];

					if($poster != $userid && $spicer == '') {
						echo "<li><a href=\"index.php?card=spiceUP&id=$recipeid\"><strong>Spice</strong></a></li>\n";
					} else
					if(isset($_SESSION['recipeuser']) && $poster == $userid) {
						echo "<li><a href=\"index.php?card=updaterecipe&id=$recipeid\"><strong>Edit</strong></a></li>\n";
					} else if($spicer == $userid) {
						echo "<li><a href=\"index.php?updateSpice&id=$recipeid\"><strong>Edit</strong></a></li>\n";
					}
					echo "<li><a href=\"index.php?card=newcomment&id=$recipeid\"><strong>Comment</strong></a></li>\n";
					echo "<li><a href=\"index.php?card=print.php?id=$recipeid\" target=\"_blank\"><strong>Print</strong></a></li>\n";
				}
			echo "</ul>\n";
		echo "</li>\n";
	echo "</ul>\n";
echo "</li>\n";
/* On to the next drop menu.
 * This time we focus on the user settings menu.
 * This will consist of the logout button and the settings buttons of course.
*/
echo "<li><strong>$userid</strong><span class=\"darrow\">&#9660;</span>\n";
	echo "<ul class=\"drop\">\n";
		echo "<li><a href=\"index.php?card=myaccount&userid=$userid\"><strong>Settings</strong></a></li>\n";
		echo "<li><a href=\"index.php?card=logout\"><strong>Logout</strong></a></li>\n";
	echo "</ul>\n";
echo "</li>\n";
echo "</ul>\n";
?>

