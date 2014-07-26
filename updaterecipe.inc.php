<?php
	$recipeid = $_GET['id'];
	$query = "SELECT recipeid, title, poster, shortdesc, ingredients, directions FROM recipes WHERE recipeid = $recipeid";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result, MYSQL_ASSOC);
	
	$recipeid = $row['recipeid'];
	$title = $row['title'];
	$poster = $row['poster'];
	$shortdesc = $row['shortdesc'];
	$ingredients = $row['ingredients'];
	$directions = $row['directions'];
	
if (!isset($_SESSION['recipeuser'])) {
	echo "<h1>Sorry, your not logged in</h1>\n";
	echo "<p>Sorry, you do not have permission to post recipes. For you to post a recipe you must first register. If you are new here please use the following link to get to the registeration page. There are no subscription fees associated with this site.\n";
	echo "<br><br><a href=\"index.php?card=register\">Registration This Way</a></p>\n";
	echo "<p>If you are a returning user please use the following link to login.</p>\n";
	echo "<a href=\"index.php?card=login\">Please login to post recipes</a>\n";
} else if($poster != $_SESSION['recipeuser']) {
        echo "<h1>Sorry, this is not your recipe</h1>\n";
        echo "<p>Sorry, but you do not have the proper permissions to edit this recipe. Please don't think we're trying to be mean, we're simply trying to be professional with the site.\n";
        echo "<br><br><a href=\"index.php\">This Way Home</a></p>\n";
} else {
	$userid = $_SESSION['recipeuser'];
	echo "<form enctype=\"multipart/form-data\" action=\"index.php\" method=\"post\">\n";
	echo "<table width=\"80%\" border=\"0\" cellspacing=\"5\" cellpadding=\"0\" align=\"left\">";
	echo "<tr><td align=\"center\" colspan=\"2\"><h1>Update Your Recipe</h1></td></tr>\n";
	echo "<tr><td align=\"left\" colspan=\"2\"><recipeTIT>$title</recipeTIT></td></tr>\n";
	echo "<tr><td align=\"left\" colspan=\"2\"><font size=\"1\" color=\"#ff9966\">posted by: <em>$poster</em></font></td></tr>\n";
	
   echo "<tr><td><h3>Image</h3></td><td><img src=\"showimage.php?id=$recipeid\" width=\"80\" height=\"60\"></td></tr>\n";
   echo "<tr><td><h3>Update Image</h3></td><td><input type=\"file\" name=\"image\"></td></tr>\n";
   echo "<tr><td colspan=\"2\"><em>Please ensure that your image is no larger than 80px x 60px. As well ensure that all images are jpeg filetypes.</td></tr>\n";

	echo "<tr><td align=\"left\" colspan=\"2\"><b>Short Description:</b></td></tr>\n";
	echo "<tr><td align=\"left\" colspan=\"2\"><textarea rows=\"5\" cols=\"50\" name=\"shortdesc\" id=\"shortdesc\">$shortdesc</textarea></td></tr>\n";
	echo "<tr><td align=\"left\" colspan=\"2\"><ingredients>Ingredients (one item per line)</ingredients></td></tr>\n";
	echo "<tr><td align=\"left\" colspan=\"2\"><textarea rows=\"10\" cols=\"50\" name=\"ingredients\" id=\"ingredients\">$ingredients</textarea></td></tr>\n";
	echo "<tr><td align=\"left\" colspan=\"2\"><directions>Directions:</directions></td></tr>\n";
	echo "<tr><td align=\"left\" colspan=\"2\"><textarea rows=\"10\" cols=\"50\" name=\"directions\" id=\"directions\">$directions</textarea></td></tr>\n";
	echo "<tr><td align=\"left\" colspan=\"2\"><input type=\"submit\" value=\"Save\" id=\"updatebtn\"></td></tr>\n";
	echo "</table>\n";
	
	echo "<input type=\"hidden\" name=\"recipeid\" value=\"$recipeid\"><br>\n";
	echo "<input type=\"hidden\" name=\"card\" value=\"saverecipe\">\n";
	echo "</form>\n";
}
?>
