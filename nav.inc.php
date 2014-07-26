<?php
echo "<table width=\"20%\" border=\"0\" cellspacing=\"5\" cellpadding=\"0\" align=\"left\">\n";

echo "<tr><td><appname><a href=\"index.php\">SociableCooking</a></appname></td>\n";

echo "<td><form action=\"index.php\" method=\"get\">\n";
echo "<input name=\"searchFor\" type=\"text\" id=\"searchF\">\n";
echo "<input name=\"card\" type=\"hidden\" value=\"search\">\n";
echo "</form></td></tr>\n";
echo "</table>\n";


echo "<div id=\"nav\">\n";

	$userid = $_SESSION['recipeuser'];
	$query = "SELECT fullname FROM users WHERE userid = '$userid'";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result, MYSQL_ASSOC);
	$fullname = $row['fullname'];
	
	echo "<table width=\"100%\" border=\"0\" cellspacing=\"5\" cellpadding=\"0\" align=\"right\">\n";

	$cardset = $_REQUEST['card'];
	if($cardset != 'showrecipe')
	{
		$bookSET = $_REQUEST['card'];
		if($bookSET != 'community')
		{
			echo "<tr><td><a href=\"index.php?card=community\"><strong>Community Recipes</strong></a></td>\n";
		}else if($bookSET != 'dashboard')
		{
			echo "<tr><td><a href=\"index.php?card=myrecipes\"><strong>My Recipes</strong></a></td>\n";
		}
		/* Show Post if your viewing the catalogs, yours or the communities, if
		   your viewing a single recipe make it vanish and if your viewing a recipe
		   other than your own display a spice-up link.
		*/
		echo "<td><a href=\"index.php?card=newrecipe\"><strong>POST</strong></a></td>\n";
	} else if($cardset = 'showrecipe') {
		$recipeid = $_REQUEST['id'];
		$query = "SELECT poster,spicer FROM recipes WHERE recipeid = $recipeid";
		$result = mysql_query($query);
		$row = mysql_fetch_array($result, MYSQL_ASSOC);
		$poster = $row['poster'];
		$spicer = $row['spicer'];
		if($poster != $userid && $spicer == '') {
			echo "<td><a href=\"index.php?card=spiceUP&id=$recipeid\"><strong>SPICE</strong></a></td>\n";
		} else {
			echo "";
		}
	}
	$recipeid = $_REQUEST['id'];
	// show comment, print and edit nav buttons only when card is set to a value of 'showrecipe'
	if($cardset == 'showrecipe')
	{
		echo "<td><a href=\"index.php?card=newcomment&id=$recipeid\"><strong>Comment</strong></a></td>\n";
		echo "<td><a href=\"print.php?id=$recipeid\" target=\"_blank\"><strong>Print</strong></a></td>\n";
		
		$query = "SELECT poster FROM recipes WHERE recipeid = $recipeid";
		$result = mysql_query($query) or die('Sorry we could not find the requested recipe.');
		$row = mysql_fetch_array($result, MYSQL_ASSOC) or die('no records retrieved');
		
		$poster = $row['poster'];
		
		if(isset($_SESSION['recipeuser']) && $poster == $_SESSION['recipeuser'])
		{
			echo "<td><a href=\"index.php?card=updaterecipe&id=$recipeid\"><strong>Edit</strong></a></td>\n";
		} else if($spicer == $userid) {
			echo "<td><a href=\"index.php?card=updateSpice&id=$recipeid\"><strong>Edit</strong></a></td>\n";
		} else {
			echo "\n";
		}

	}else
	{
		echo "\n";
	}
	
	echo "<td><a href=\"index.php?card=myaccount&userid=$userid\">\n";
	echo "<strong>$userid</strong></a></td>\n";
	
	echo "<td><a href=\"index.php?card=logout\">(Logout)</a></td>";


echo "</tr></table></div>\n";
?>
