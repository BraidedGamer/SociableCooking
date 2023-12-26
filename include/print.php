<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="Shortcut Icon" href="images/RecipeLogo.png" />
<link rel="stylesheet" type="text/css" href="stylesheets/layout.css" />
<link rel="stylesheet" type="text/css" href="stylesheets/textStyles.css" />
<link rel="stylesheet" type="text/css" href="stylesheets/fieldStyle.css" />
<link href='http://fonts.googleapis.com/css?family=Condiment' rel='stylesheet' type='text/css'>
<style type="text/css">
table {
	border: 1px dashed #cc9966;
}
td, tr {
	border: 0;
}
body {
	margin: 0px;
	padding: 0px;

	background-color: #FFFFFF;
	background-image: none;

	text-align: justify;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #000000;
}
</style>
<title>Sociable Cooking ~ Printer Friendly Page</title>
</head>
<body>
<?php
if(isset($_SESSION['recipeuser']))
{
	include("myLibrary/functions.php");
	include("myLibrary/secure.php");
	connect();
	
	$recipeid = $_GET['id'];
	
	$query = "SELECT catid,title,poster,spicer,shortdesc,ingredients,directions FROM recipes WHERE recipeid = $recipeid";
	$result = mysql_query($query) or die('Could not find recipe');
	$row = mysql_fetch_array($result, MYSQL_ASSOC) or die('No records retrieved');
	
	$catid = $row['catid'];
	$title = $row['title'];
	$poster = $row['poster'];
	$spicer = $row['spicer'];
	$shortdesc = $row['shortdesc'];
	$ingredients = $row['ingredients'];
	$directions = $row['directions'];
	
	$ingredients = nl2br($ingredients);
	$directions = nl2br($directions);

	$catquery = "SELECT * FROM categories WHERE catid = $catid";
        $catresult = mysql_query($catquery) or die('Could not retrieve category identification: ' .mysql_error());
        $catrow = mysql_fetch_array($catresult, MYSQL_ASSOC);
        $category = $catrow['name'];

	if($spicer == '') {
		echo "<table width=\"500px\" height=\"200px\" align=\"center\">\n";
		echo "<tr><td rowspan=\"3\" valign=\"top\"><img src=\"showimage.php?id=$recipeid\" width=\"80px\" height=\"60px\"></td>\n";
		echo "<td height=\"10\"><prinTIT>$title</prinTIT><catPrint>$category</catPrint></td></tr>\n";
		echo "<tr><td height=\"10\">posted by: <em>Chef $poster</em></td></tr>\n";
		echo "<tr><td height=\"10\">$shortdesc</td></tr>\n";
		echo "<tr><td colspan=\"2\"><hr id=\"printHR\"></td></tr>\n";
		echo "<tr><td colspan=\"2\"><ingredients>Ingredients:</ingredients></td></tr>\n";
		echo "<tr><td colspan=\"2\" valign=\"top\">$ingredients</td></tr>\n";
		echo "<tr><td colspan=\"2\"><directions>Directions:</directions></td></tr>\n";
		echo "<tr><td colspan=\"2\" valign=\"top\">$directions</td></tr>\n";
		echo "<tr><td colspan=\"2\" align=\"right\" valign=\"bottom\"><prinMARK>SociableCooking.com</prinMARK></td></tr>\n";
		echo "</table>\n";
	} else {
		echo "<table width=\"500px\" height=\"200px\" align=\"center\">\n";
                echo "<tr><td rowspan=\"3\" valign=\"top\"><img src=\"showimage.php?id=$recipeid\" width=\"80px\" height=\"60px\"></td>\n";
                echo "<td height=\"10\"><prinTIT>$title</prinTIT><catPrint>$category</catPrint></td></tr>\n";
                echo "<tr><td height=\"10\">posted by: <em>Chef $poster</em> and spiced by: <em>Chef $spicer</em></td></tr>\n";
                echo "<tr><td height=\"10\">$shortdesc</td></tr>\n";
                echo "<tr><td colspan=\"2\"><hr id=\"printHR\"></td></tr>\n";
                echo "<tr><td colspan=\"2\"><ingredients>Ingredients:</ingredients></td></tr>\n";
                echo "<tr><td colspan=\"2\" valign=\"top\">$ingredients</td></tr>\n";
                echo "<tr><td colspan=\"2\"><directions>Directions:</directions></td></tr>\n";
                echo "<tr><td colspan=\"2\" valign=\"top\">$directions</td></tr>\n";
                echo "<tr><td colspan=\"2\" align=\"right\" valign=\"bottom\"><prinMARK>SociableCooking.com</prinMARK></td></tr>\n";
                echo "</table>\n";
	}
}
?>
</body>
</html>
