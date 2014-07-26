<?php
	$recipeid =$_GET['id'];
	$query    = "SELECT * FROM recipes WHERE recipeid = $recipeid";
	$result   = mysql_query($query);
	$row      = mysql_fetch_array($result, MYSQL_ASSOC);

	$recipeid    = $row['recipeid'];
	$title       = $row['title'];
	$poster      = $row['poster'];
	$spicer      = $row['spicer'];
	$shortdesc   = $row['shortdesc'];
	$ingredients = $row['ingredients'];
	$directions  = $row['directions'];

if(!isset($_SESSION['recipeuser'])) {
	echo "<h1> Sorry, your not logged in</h1>\n";
	echo "<p>Sorry, but you do not have the proper permissions to post or update any recipes on this site. Please, use the form to your right to register for the site and you can join our culinary community.\n";
	echo "<br><br><a href=\"index.php?card=register\">Registration This Way</a></p>\n";
	echo "<a href=\"index.php?card=login\">Please login to post recipes</a>\n";
} else if($spicer != $_SESSION['recipeuser']) {
	echo "<h1>Sorry, this is not your recipe</h1>\n";
	echo "<p>Sorry, but you do not have the proper permissions to edit this spiced recipe. Please don't think we're trying to be mean, we're simply trying to be professional with the site.\n";
	echo "<br><br><a href=\"index.php\">This Way Home</a></p>\n";
} else {
	$userid = $_SESSION['recipeuser'];
	echo "<form enctype=\"multipart/form-data\" action=\"index.php\" method=\"post\">\n";
        echo "<table width=\"80%\" border=\"0\" cellspacing=\"5\" cellpadding=\"0\" align=\"left\">";
        echo "<tr><td align=\"center\" colspan=\"2\"><h1>Update Your Recipe</h1></td></tr>\n";
        echo "<tr><td align=\"left\" colspan=\"2\"><recipeTIT>$title</recipeTIT></td></tr>\n";
        echo "<tr><td align=\"left\" colspan=\"2\"><font size=\"1\" color=\"#ff9966\">posted by: <em>$poster</em> and spiced by: <em>$spicer</em></font></td></tr>\n";

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
        echo "<input type=\"hidden\" name=\"card\" value=\"saveSpice\">\n";
        echo "</form>\n";
}
?>

