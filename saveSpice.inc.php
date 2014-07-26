<?php
$recipeid = $_POST['recipeid'];

$shortdesc = $_POST['shortdesc'];
$ingredients = $_POST['ingredients'];
$directions = $_POST['directions'];

if(get_magic_quotes_gpc())
{
        $shortdesc = stripslashes($shortdesc);
        $ingredients = stripslashes($ingredients);
        $directions = stripslashes($directions);
}
        $shortdesc = mysql_real_escape_string($shortdesc);
        $ingredients = mysql_real_escape_string($ingredients);
        $directions = mysql_real_escape_string($directions);


        $PictName = $_FILES['image']['name'];
   if ($PictName)
        {
                $thumbnail = getThumb($_FILES['image']);
                $thumbnail = mysql_real_escape_string($thumbnail);

                $query = "UPDATE recipes SET shortdesc='$shortdesc', image='$thumbnail', ingredients='$ingredients', directions='$directions' WHERE recipeid = $recipeid";
        } else
        {
                $query = "UPDATE recipes SET shortdesc='$shortdesc', ingredients='$ingredients', directions='$directions' WHERE recipeid = $recipeid";
        }
        $result = mysql_query($query) or die(mysql_error());
if($result)
{
        echo "<h1>Recipe Updated</h1>\n";
        echo "<p>You've successfully updated a recipe that you posted to the site. We here at Sociable Cooking are very thankful for\n";
        echo " your contributions to our catalog of recipes. Please continue to post new recipes!</p>\n";
}else
{
        echo "<h1>Recipe Update Failed</h1>\n";
        echo "<p>I'm sorry but an error as occurred while you were attempting to update your recipe. Please try again later!</p>\n";
}

?>
