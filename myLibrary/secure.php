<?php
/** This file contains secure information relating to database connection for the site. For this
  * we are excluding it from the repo due to security concerns.
 **/
function DataConnect() {
	$username = 'sociable_recipes';
	$password = 'The0d0re';

	$pdo = new PDO('mysql:host=localhost;port=3306;dbname=sociable_recipe', $username, $password);
}

?>
