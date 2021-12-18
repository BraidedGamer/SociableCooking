<?php

if (!isset($_SESSION['recipeuser']))
{
	echo "<h1>Welcome to SociableCooking</h1>\n";

	echo "<h3><font color='#BE2625'>\n";
	echo "SociableCooking is dedicated to getting your creative \n";
	echo "jucies flowing in the kitchen. We are here to inspire \n";
	echo "your kitchen creativity.\n";
	echo "</font></h3>\n";

	include_once("allrecipe.inc.php");
} else
{
	$user = $_SESSION['recipeuser'];
	// Code for displaying only the recipes of the current users 
echo "<h1>My Recipe Catalog</h1>\n";

$query = "SELECT count(recipeid) from recipes WHERE poster = '$user' OR spicer = '$user'";
$result = mysql_query($query);
$row = mysql_fetch_array($result);

if ($row[0] == 0)
{
	echo "No Recipes Have Been Posted \n";
	echo "<a href=\"index.php?card=newrecipe\">Post A Recipe</a>\n";
} else
{
	$totrecipes = $row[0];
if (!isset($_GET['page']))
	$thispage = 1;
else
	$thispage = $_GET['page'];
$recipesperpage = 4;
$offset = ($thispage - 1) * $recipesperpage;
$totpages = ceil($totrecipes / $recipesperpage);
$query = "SELECT * FROM recipes WHERE poster = '$user' OR spicer = '$user' ORDER BY recipeid DESC LIMIT $offset, $recipesperpage";
$result = mysql_query($query) or die('Could not retrieve recipes: ' . mysql_error());
while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
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
			echo "<table width=\"100%\" cellpadding=\".5px\" cellspacing=\"1\" border=\"0\">\n";
			echo "<tr><td rowspan=\"3\"><img src=\"showimage.php?id=$recipeid\" width=\"80\" height=\"60\"></td>\n";
			echo "<td><a href=\"index.php?card=showrecipe&id=$recipeid\">$title</a><catname>$category</catname></td></tr>\n";
			echo "<tr><td><font size=\"1\" color=\"#ff9966\">posted by: <em>Chef " . $poster . "</em></font></td></tr>\n";
			echo "<tr><td><p>" . $shortdesc . "</p></td></tr>\n";
			echo "<tr><td colspan=\"2\"><hr></td></tr>\n";
			echo "</table>\n";
		} else if($poster != $spicer && $poster != $user) {
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

	//	Paging on main page

if ($thispage > 1)
{
	$page = $thispage - 1;
	$prevpage = "<a href=\"index.php?card=myrecipes&page=$page\">Previous</a>";
} else
{
	$prevpage = "";
}
	$bar = "";
	
if ($totpages > 1)
{
	for ($page = 1; $page <= $totpages; $page++)
	{
		if ($page == $thispage)
		{
			$bar .= " $page ";
		} else
		{
			$bar .= "<a href=\"index.php?card=myrecipes&page=$page\">$page</a>";
		}
	}
}
if ($thispage < $totpages)
{
	$page = $thispage + 1;
	$nextpage = "<a href=\"index.php?card=myrecipes&page=$page\">Next</a>";
} else
{
	$nextpage = "";
}
	echo "<table width=\"80%\" align=\"center\" cellspacing=\"5\" cellpadding=\"3\">\n";
	echo "<tr><td colspan=\"3\" align=\"center\">Page: <page>$thispage</page> of <page>$totpages</page></td></tr>\n";
	echo "<tr><td align=\"left\" width=\"35%\"><page>$prevpage</page></td>\n";
	echo "<td align=\"center\"> <page>$bar</page> </td>\n";
	echo "<td align=\"right\" width=\"30%\"><page>$nextpage</page></td></tr></table>";

}
}
?>
