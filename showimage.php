<?php
header("Content-type: image/jpeg");

$recipeid = $_GET['id'];
$con = mysql_connect("localhost","sociable_recipes","The0d0re") or die('');
mysql_select_db("sociable_recipe",$con);

$query = "SELECT image from recipes WHERE recipeid = $recipeid";
$result = mysql_query($query);
$row = mysql_fetch_array($result, MYSQL_ASSOC);
$picture = $row['image'];

echo $picture;

?>