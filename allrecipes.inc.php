<?php
/** This included file will allow people to browse the current recipe catalog
	before signing-up. They will be able to view every recipe in the
	catalog on the internet, but must sign-up or login to the site before
	they can post their recipes, edit them, comment on a recipe. As well 
	printing will not be a standard function unitl they sign-up or login.
**/
$query = "SELECT count(recipeid) FROM recipes";
$result= mysql_query($query);
$row   = mysql_fetch_array($result);

if($row[0] == 0)
{
	echo "<h1>Recipe Catalog</h1>\n";
	echo "No one has posted any recipes. Please use the registration form ";
	echo "to the right to register your free account. If you already have ";
	echo "an account please use the login form within the header bar ";
	echo "to post a recipe to the public catalog.\n";
}else
{
	echo "<h1>Recipe Catalog</h1>\n";

	$totrecipes = $row[0];
	if(!isset($_GET['page']))
		$thispage = 1;
	else
		$thispage = $_GET['page'];
		$recipesperpage = 4;
		$offset = ($thispage - 1) * $recipesperpage;
		$totpages = ceil($totrecipes / $recipesperpage);
		$query = "SELECT * FROM recipes ORDER BY recipeid DESC LIMIT
				$offset, $recipesperpage";
		$result = mysql_query($query) or die('Could not retrieve recipes: ' .mysql_error());
		
		while($row = mysql_fetch_array($result, MYSQL_ASSOC))
		{
			$recipeid = $row['recipeid'];
			$catid    = $row['catid'];
			$title    = $row['title'];
			$poster   = $row['poster'];
			$spicer   = $row['spicer'];
			$shortdesc= $row['shortdesc'];
			
			$catquery = "SELECT * FROM categories WHERE catid = $catid";
			$catresult = mysql_query($catquery) or die('Could not retrieve category identification: ' .mysql_error());
			while($catrow = mysql_fetch_array($catresult, MYSQL_ASSOC)) {
				$category = $catrow['name'];
				if($spicer == '') {
					echo "<table width=\"95%\" cellpadding=\"0\" \n";
					echo "cellspacing=\"5\" border=\"0\" align=\"center\">\n";
					echo "<tr><td rowspan=\"3\"><img src=\"showimage.php?id=$recipeid\" \n";
					echo "width=\"80\" height=\"60\"></td>\n";
					echo "<td><a href=\"index.php?card=showrecipe&id=$recipeid\">\n";
					echo "$title</a><catname>$category</catname></td></tr>\n";
					echo "<tr><td><font size=\"1\" color=\"#ff9966\">posted by: \n";
					echo " <em>Chef $poster</em></font></td></tr>\n";
					echo "<tr><td><p>$shortdesc</p></td></tr>\n";
					echo "<tr><td colspan=\"2\"><hr></td></tr></table>\n";
				} else {
					echo "<table width=\"95%\" cellpadding=\"0\" \n";
					echo "cellspacing=\"5\" border=\"0\" align=\"center\">\n";
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
	/** the code after this point is used to count up the total recipes inthe catalogand display 
		only four at a time with a pagination bar at the bottom if it's required.
	**/
	if($thispage > 1)
	{
		$page = $thispage - 1;
		$prevpage = "<a href=\"index.php?card=myrecipes&page=$page\">Previous</a>";
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
				$bar .= "<a href=\"index.php?card=myrecipes&page=$page\">$page</a>";
			}
		}
	}
	if($thispage < $totpages)
	{
		$page = $thispage + 1;
		$nextpage = "<a href=\"index.php?card=myrecipes&page=$page\">Next</a>";
	}else
	{
		$nextpage = "";
	}
	echo "<table width=\"80%\" align=\"center\" cellspacing=\"5\" cellpadding=\"3\">\n";
	echo "<tr><td colspan=\"3\" align=\"center\">Page: <page>$thispage</page> of <page>$totpages</pages></td></tr>\n";
	echo "<tr><td align=\"left\" width=\"35%\"><page>$prevpage</page></td>\n";
	echo "<td align=\"center\"> <page>$bar</page> </td>\n";
	echo "<td align=\"right\" width=\"30%\"><page>$nextpage</page></td></tr></table>\n";
}
?>
