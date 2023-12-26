<?php
/** This included file will take the userid from the session cookie
	and use it to select and display all but the users recipes
	in a section titled Community Catalog.
**/
if(isset($_SESSION['recipeuser']))
{ 
	$user = $_SESSION['recipeuser'];
	$query = "SELECT COUNT(recipeid) FROM recipes WHERE poster != '$user' OR spicer != '$user'";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	
	if($row[0] == 0)
	{
		echo "<h1>Community Recipe Book</h1>\n";
		echo "No one else has posted any recipes\n";
	}else
	{
		echo "<h1>Community Catalog</h1>\n";

		$totrecipes = $row[0];
		if(!isset($_GET['page']))
			$thispage = 1;
		else
			$thispage = $_GET['page'];
			$recipesperpage = 4;
			$offset = ($thispage-1)*$recipesperpage;
			$totpages = ceil($totrecipes / $recipesperpage);
			$query = "SELECT * FROM recipes WHERE poster != '$user' OR spicer != '$user'
					ORDER BY recipeid DESC LIMIT $offset,
					$recipesperpage";
			$result = mysql_query($query) or die('Could not retrieve recipes: ' . mysql_error());
			while($row = mysql_fetch_array($result, MYSQL_ASSOC))
			{
				$recipeid = $row['recipeid'];
				$catid = $row['catid'];
				$title = $row['title'];
				$poster = $row['poster'];
				$spicer = $row['spicer'];
				$shortdesc = $row['shortdesc'];

				$catquery = "SELECT * FROM categories WHERE catid = $catid";
                        	$catresult = mysql_query($catquery) or die('Could not retrieve category identification: ' .mysql_error());
                        	while($catrow = mysql_fetch_array($catresult, MYSQL_ASSOC)) {
                                	$category = $catrow['name'];

					if($spicer == '') {
						echo "<table width=\"100%\" cellpadding=\".5px\"\n";
						echo "	cellspacing=\"1px\" border=\"0\">\n";
						echo "<tr><td rowspan=\"3\"><img src=\"showimage.php?id=$recipeid\"`\n";
						echo "width=\"80\" height=\"60\"></td>\n";
						echo "<td><a href=\"index.php?card=showrecipe&id=$recipeid\">\n";
						echo "$title</a><catname>$category</catname></td></tr>\n";
						echo "<tr><td><font size=\"1\" color=\"#ff9966\">posted by: \n"; 
						echo "	<em>Chef $poster</em></font></td></tr>\n";
						echo "<tr><td><p>$shortdesc</p></td></tr>\n";
						echo "<tr><td colspan=\"2\"><hr></td></tr>\n";
						echo "</table>\n";
					} else if($spicer != $user){
						echo "<table width=\"100%\" cellpadding=\".5px\" \n";
                                		echo "cellspacing=\"1px\" border=\"0\">\n";
                                		echo "<tr><td rowspan=\"3\"><img src=\"showimage.php?id=$recipeid\" \n";
                                		echo "width=\"80\" height=\"60\"></td>\n";
                                		echo "<td><a href=\"index.php?card=showrecipe&id=$recipeid\">\n";
                                		echo "$title</a><catname>$category</catname></td></tr>\n";
                                		echo "<tr><td><font size=\"1\" color=\"#ff9966\">posted by: \n";
                                		echo "<em>Chef $poster</em> and spiced by: <em>Chef $spicer</em>\n";
                                		echo "</td></tr>\n";
                                		echo "<tr><td><p>$shortdesc</p></td></tr>\n";
                                		echo "<tr><td colspan=\"2\"><hr></td></tr></table>\n";
					}
				}
			}
	/** The code after this point is used to count up the total recipes in the catalog
		minus the current user's recipes and displays a paging navigation bar if
		it's needed.
	**/
		if($thispage > 1)
		{
			$page = $thispage-1;
			$prevpage = "<a href=\"index.php?card=community&page=$page\">Previous</a>\n";
		}else
		{
			$prevpage = "";
		}
		$bar = "";
		if($totpages > 1)
		{
			for($page = 1; $page <= $totpages; $page++)
			{
				if($page == $thispage)
				{
					$bar .= " $page ";
				}else
				{
					$bar .= "<a href=\"index.php?card=community&page=$page\">$page</a>";
				}
			}
		}
		if($thispage < $totpages)
		{
			$page = $thispage+1;
			$nextpage = "<a href=\"index.php?card=community&page=$page\">Next</a>";
		}else
		{
			$nextpage = "";
		}

		echo "<table width=\"80%\" align=\"center\" cellspacing=\"5\" cellpadding=\"3\">\n";
        	echo "<tr><td colspan=\"3\" align=\"center\">Page: <page>$thispage</page> of <page>$totpages</page></td></tr>\n";
        	echo "<tr><td align=\"left\" width=\"35%\"><page>$prevpage</page></td>\n";
        	echo "<td align=\"center\"> <page>$bar</page> </td>\n";
        	echo "<td align=\"right\" width=\"30%\"><page>$nextpage</page></td></tr></table>";
	}
}else
{
	echo "\n";
}
?>
