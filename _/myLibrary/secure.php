<?php
/** This file contains secure information relating to database connection for the site. For this
  * we are excluding it from the repo due to security concerns.
 **/
function connect() {
  $con = mysql_connect("localhost", "sociable_recipes", "The0d0re") or
  die('Could not connect to server');
  mysql_select_db("sociable_recipe", $con) or die('Could not connect to database');
} 

?>
