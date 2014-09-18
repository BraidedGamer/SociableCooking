<?php
	
if (!isset($_SESSION['recipeuser']))
{
	echo "<h1>Sorry, your not logged in</h1>\n";
	echo "<p>Sorry, you do not have permission to post recipes. For you to post a recipe you must first register. If you are new here please use the following link to get to the registeration page. There are no subscription fees associated with this site.\n";
	echo "If you are a returning users please use the following link to login.</p>\n";
} else
{
	$userid = $_SESSION['recipeuser'];
	echo "<form enctype=\"multipart/form-data\" action=\"index.php\" method=\"post\">\n";
	echo "<table width=\"80%\" border=\"0\" cellspacing=\"5\" cellpadding=\"0\" align=\"left\">";
	echo "<tr><td colspan=\"2\" align=\"center\"><h1>Enter your Recipe</h1></td></tr>\n";
	echo "<tr><td align=\"left\"><b>Title:</b></td><td align=\"left\"><input type=\"text\" size=\"40\" name=\"title\" id=\"title\"></td></tr>\n";
	echo "<tr><td align=\"left\"><b>Category:</b></td><td align=\"left\"><select name=\"category\">\n";
	echo "<option value=\"default\">Please select a category</option>\n";
	$query = "SELECT catid,name FROM categories";
	$result = mysql_query($query);
	while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$catid = $row['catid'];
		$name = $row['name'];
		echo "<option value=\"$catid\">$name</option>\n";
	}
	echo "</select></td></tr>\n";	

	echo "<input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"1024000\">\n";
   echo "<tr><td>Picture</td><td><input type=\"file\" name=\"image\"></td></tr>\n";
   echo "<tr><td colspan=\"2\"><em>Please ensure that your image is no larger than 80px x 60px. As well ensure that all images are jpeg filetypes.</td></tr>\n"; 
	
	echo "<tr><td align=\"left\" colspan=\"2\"><b>Short Description</b></td></tr>\n";
	echo "<tr><td align=\"right\" colspan=\"2\"><textarea rows=\"5\" cols=\"50\" name=\"shortdesc\" id=\"shortdesc\"></textarea></td></tr>\n";
	echo "<tr><td align=\"left\" colspan=\"2\"><ingredients>Ingredients (one item per line)</ingredients></td></tr>\n";
	echo "<tr><td align=\"right\" colspan=\"2\"><textarea rows=\"10\" cols=\"50\" name=\"ingredients\" id=\"ingredients\"></textarea></td></tr>\n";
	echo "<tr><td align=\"left\" colspan=\"2\"><directions>Directions</directions></td></tr>\n";
	echo "<tr><td align=\"right\" colspan=\"2\"><textarea rows=\"10\" cols=\"50\" name=\"directions\" id=\"directions\"></textarea></td></tr>\n";
	echo "<tr><td align=\"right\" colspan=\"2\"><input type=\"submit\" value=\"Archive\" id=\"archivebtn\"></td></tr>\n";
	echo "</table>\n";

	echo "<input type=\"hidden\" name=\"poster\" value=\"$userid\"><br>\n";
	echo "<input type=\"hidden\" name=\"card\" value=\"addrecipe\">\n";
	echo "</form>\n";
}
?>
