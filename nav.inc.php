<?php
echo "<table width=\"20%\" border=\"0\" cellspacing=\"5\" cellpadding=\"0\" align=\"left\">\n";

echo "<tr><td><appname><a href=\"index.php\">SociableCooking</a></appname></td>\n";

echo "<td><form action=\"index.php\" method=\"get\">\n";
echo "<input name=\"searchFor\" type=\"text\" id=\"searchF\">\n";
echo "<input name=\"card\" type=\"hidden\" value=\"search\">\n";
echo "</form></td></tr>\n";
echo "</table>\n";

echo "<ul id=\"nav\">\n";
	$userid = $_SESSION['recipeuser'];
	$cardset = $_REQUEST['card'];
	if($cardset != 'showrecipe')
	{
		$bookSET = $_REQUEST['card'];
		echo "<li><strong>Catalog</strong>\n";
		if($bookSET != 'community')
		{
			echo "<ul class=\"sub1\"><li><a href=\"index.php?card=community\"><strong>Community Recipes</strong></a></li></ul>\n";
		}else if($bookSET != 'dashboard')
		{
			echo "<ul class=\"sub1\"><li><a href=\"index.php?card=myrecipes\"><strong>My Recipes</strong></a></li></ul>\n";
		}
		echo "</li>\n";
		/* Show Post if your viewing the catalogs, yours or the communities, if
		   your viewing a single recipe make it vanish and if your viewing a recipe
		   other than your own display a spice-up link.
		*/
		echo "<li><a href=\"index.php?card=newrecipe\"><strong>POST</strong></a></li>\n";
	} else if($cardset = 'showrecipe') {
		$recipeid = $_REQUEST['id'];
		$query = "SELECT poster,spicer FROM recipes WHERE recipeid = $recipeid";
		$result = mysql_query($query);
		$row = mysql_fetch_array($result, MYSQL_ASSOC);
		$poster = $row['poster'];
		$spicer = $row['spicer'];
		if($poster != $userid && $spicer == '') {
			echo "<li><a href=\"index.php?card=spiceUP&id=$recipeid\"><strong>SPICE</strong></a></li>\n";
		} 
	}
	$recipeid = $_REQUEST['id'];
	// show comment, print and edit nav buttons only when card is set to a value of 'showrecipe'
	if($cardset == 'showrecipe')
	{
		echo "<li><a href=\"index.php?card=newcomment&id=$recipeid\"><strong>Comment</strong></a></li>\n";
		echo "<li><a href=\"print.php?id=$recipeid\" target=\"_blank\"><strong>Print</strong></a></li>\n";
		
		$query = "SELECT poster FROM recipes WHERE recipeid = $recipeid";
		$result = mysql_query($query) or die('Sorry we could not find the requested recipe.');
		$row = mysql_fetch_array($result, MYSQL_ASSOC) or die('no records retrieved');
		
		$poster = $row['poster'];
		
		if(isset($_SESSION['recipeuser']) && $poster == $_SESSION['recipeuser'])
		{
			echo "<li><a href=\"index.php?card=updaterecipe&id=$recipeid\"><strong>Edit</strong></a></li>\n";
		} else if($spicer == $userid) {
			echo "<li><a href=\"index.php?card=updateSpice&id=$recipeid\"><strong>Edit</strong></a></li>\n";
		} else {
			echo "\n";
		}

	}else
	{
		echo "\n";
	}
	
	echo "<li><strong>$userid</strong></a>\n";
	echo "<ul class=\"sub1\"><li><a href=\"index.php?card=myaccount&userid=$userid\">\n";
	echo "<strong>Settings</strong></a></li>\n";
	echo "<li><a href=\"index.php?card=logout\">(Logout)</a></li></ul>";

echo "</li></ul>\n";
?>
