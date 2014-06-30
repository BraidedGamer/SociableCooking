<?php
$title = $_POST['title'];
$poster = $_POST['poster'];
$spicer = $_POST['spicer'];
$shortdesc = $_POST['shortdesc'];
$ingredients = $_POST['ingredients'];
$directions = $_POST['directions'];

if(get_magic_quotes_gpc()) {
	$title = stripslashes($title);
	$shortdesc = stripslashes($shortdesc);
	$ingredients = stripslashes($ingredients);
	$directions = stripslashes($directions);
}
$title = mysql_real_escape_string($title);
$shortdesc = mysql_real_escape_string($shortdesc);
$ingredients = mysql_real_escape_string($ingredients);
$directions = mysql_real_escape_string($directions);

$thumbnail = getThumb($_FILES['image']);
$thumbnail = mysql_real_escape_string($thumbnail);)

if(trim($spicer == $_SESSION['recipeuser'])) {
	echo "<p>My apologies but, your the poster of this recipe and cannot \n";
	echo "are not elegible to spice your own recipes at this time. \n";
	echo "If you want to change the original recipe then please use our edit \n";
	echo "form. We created this spice form for the community to be able to \n";
	echo "create their own version of your recipe.</p>\n";
}else {
	$query = "INSERT INTO spiced (title, shortdesc, poster, spicer, image, ingredients, directions)" .
		" VALUES('$title', '$shortdesc', '$poster', '$thumbnail', '$ingredients', '$directions')";
	$result = mysql_query($query) or die('Sorry, we could not post your recipe to the database at this time');
	if($result) {
		echo "<h1>Recipe Has Been Spiced</h1>\n";
		echo "<p>You've successfully spiced up $poster's recipe for \n";
		echo "$title. This new version is now offically considered yours \n";
		echo "<a href=\"index.php\">please follow us home</a></p>\n"; 
	}else {
		echo "<h1>Sorry</h1>\n";
		echo "<p>We apologize, but something broke and we were unable to \n";
		echo "spice this recipe for you!</p>\n";
	}
}
?>
