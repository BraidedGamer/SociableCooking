<?php
/** This file contains secure information relating to database connection for the site. For this
  * we are excluding it from the repo due to security concerns.
 **/
function DataConnect() {
  $user = 'sociable_recipes';
  $password = 'The0d0re';
  $db = 'sociable_recipe';
  $host = 'localhost';
  $port = 3306;

  $link = mysqli_init();
  $success = mysqli_real_connect(
     $link,
     $host,
     $user,
     $password,
     $db,
     $port
  );
}

?>
