<?PHP
include('../secure.con.php');

function allRecipesDisplay() {
	/** This function is used to call forth all recipes from the database and display them
	  * as a catalog.
	**/
	$db = dataConnect();

	$count = "SELECT count(recipeid) FROM recipes";
	$recipeCount= $db->query($count);
	$row   = $recipeCount->fetchAll(PDO::FETCH_ASSOC);

	$recipeQuery = $db->query('SELECT recipeid, catid, title, poster, spicer, shortdesc FROM recipes');
	$recipes = $recipeQuery->fetchAll(PDO::FETCH_ASSOC);
	return $recipes;

			echo "<h1>Recipe Catalog</h1>\n";
			
		$recipeid = $recipes['recipeid'];
		$catid    = $recipes['catid'];
		$title    = $recipes['title'];
		$poster   = $recipes['poster'];
		$spicer   = $recipes['spicer'];
		$shortdesc= $recipes['shortdesc'];
		
		if($spicer == null) {
				echo "<table width=\"100%\" cellpadding=\".5px\" \n";
				echo "cellspacing=\"1px\" border=\"0\" align=\"center\">\n";
				echo "<tr><td rowspan=\"3\"><img src=\"showimage.php?id=$recipeid\" \n";
				echo "width=\"80\" height=\"60\"></td>\n";
				echo "<td><a href=\"index.php?card=showrecipe&id=$recipeid\">\n";
				echo "$title</a><catname>$category</catname></td></tr>\n";
				echo "<tr><td><font size=\"1\" color=\"#ff9966\">posted by: \n";
				echo " <em>Chef $poster</em></font></td></tr>\n";
				echo "<tr><td><p>$shortdesc</p></td></tr>\n";
				echo "<tr><td colspan=\"2\"><hr></td></tr></table>\n";
		} else {
				echo "<table width=\"100%\" cellpadding=\".5px\" \n";
				echo "cellspacing=\"1px\" border=\"0\" align=\"center\">\n";
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
function myRecipes() {

}

function Community() {

}
?>
