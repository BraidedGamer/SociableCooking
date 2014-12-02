<?php
/** This file will be used to display all of your profile information.
    This information shall persist of your basic info, work experience,
    contact information, friends and much more!
**/
$userid = $_SESSION['recipeuser'];

echo "<h1>Chef $userid</h1>\n";

$query  = "SELECT * FROM users WHERE userid = '$userid'";
$result = mysql_query($query) or die('Could not retrieve user info: ' .mysql_error());

$row = mysql_fetch_array($result, MYSQL_ASSOC) or die('No records retrieved');

$firstName = $row['firstName'];
$lastName  = $row['lastName'];

echo "<b>Real Name:</b> <i>$lastName, $firstName</i><br>\n";

?>

