<?php

  $title = $_POST['title'];
  $poster = $_POST['poster'];
  $shortdesc = $_POST['shortdesc'];
  $ingredients = $_POST['ingredients'];
  $directions = $_POST['directions'];
  
  if(get_magic_quotes_gpc())
  {
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
  $thumbnail = mysql_real_escape_string($thumbnail);
  
  if (trim($poster == ''))
  {
     echo "<p>Sorry, each recipe must have a poster</p>\n";
  }else
  {
    $query = "INSERT INTO recipes (title, shortdesc, poster, image, ingredients, directions) " .
       " VALUES ('$title', '$shortdesc', '$poster', '$thumbnail', '$ingredients', '$directions')";

    $result = mysql_query($query) or die('Sorry, we could not post your recipe to the database at this time');

    if ($result)
    {
       echo "<h1>Recipe posted</h1>\n";
	   echo "<p>Your recipe was successfully posted to our database. To browse our current recipe selection \n";
	   echo "please follow the link below.</p><br><a href=\"index.php\">This Way Home</a>\n";
    }else
    {
      echo "<h1>Sorry</h1>\n";
	   echo "<p>Sorry, there was a problem posting your recipe</p>\n";
	 }
  }
?>
