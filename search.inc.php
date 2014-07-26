<?php
if (!isset($_SESSION['recipeuser']))
{
	echo "<h1>Search Denied</h1>\n";
	echo "<p>We are extremely sorry, but it seems your credentials aren't in our system. We can't allow you to search our recipe records.</p>\n";
	echo "<p>If you would really like to view and exchange recipes with us please submit your information.</p>\n";
}else
{
	
	$search = $_GET['searchFor'];
	$words = explode(" ", $search);
	$phrase = implode("%' AND title LIKE '%", $words);
	
	$query = "SELECT recipeid,title,poster,spicer,shortdesc from recipes where title like '%$phrase%'";
	$result = mysql_query($query) or die('Could not query database at this time');
	
	echo "<h1>Search Results for <i>'$search'</i></h1>\n";
	if (mysql_num_rows($result) == 0)
	{
		echo "<p>Sorry, no recipes were found with '$search' in them.</p>";
	} else
	{
		while($row=mysql_fetch_array($result, MYSQL_ASSOC))
		{
			$recipeid = $row['recipeid'];
			$title    = $row['title'];
			$poster   = $row['poster'];
			$spicer   = $row['spicer'];
			$shortdesc= $row['shortdesc'];

			if($spicer == '') {	
				echo "<table width=\"95%\" cellpadding=\"5\" cellspacing=\"0\" border=\"0\" align=\"center\">\n";
				echo "<tr><td rowspan=\"3\"><img src=\"showimage.php?id=$recipeid\" width=\"80\" height=\"60\"></td>\n";
				echo "<td><a href=\"index.php?card=showrecipe&id=$recipeid\">$title</a></td></tr>\n";
				echo "<tr><td><font size=\"1\" color=\"#ff9966\">posted by: <em>Chef " . $poster . "</em></font></td></tr>\n";
				echo "<tr><td><p>" . $shortdesc . "</p></td></tr>\n";
				echo "<tr><td colspan=\"2\"><hr></td></tr>\n";
				echo "</table>\n";
			} else {
                                echo "<table width=\"95%\" cellpadding=\"0\" \n";
                                echo "cellspacing=\"5\" border=\"0\" align=\"center\">\n";
                                echo "<tr><td rowspan=\"3\"><img src=\"showimage.php?id=$recipeid\" \n";
                                echo "width=\"80\" height=\"60\"></td>\n";
                                echo "<td><a href=\"index.php?card=showrecipe&id=$recipeid\">\n";
                                echo "$title</a></td></tr>\n";
                                echo "<tr><td><font size=\"1\" color=\"#ff9966\">posted by: \n";
                                echo "<em>Chef $poster</em> and spiced by: <em>Chef $spicer</em>\n";
                                echo "</td></tr>\n";
                                echo "<tr><td><p>$shortdesc</p></td></tr>\n";
                                echo "<tr><td colspan=\"2\"><hr></td></tr></table>\n";
			}
		}
	}
}

?>
