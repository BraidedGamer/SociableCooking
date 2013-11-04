<?php

  $recipeid = $_POST['recipeid'];
  $poster = $_POST['poster'];
  $comment = $_POST['comment'];
  $date = date("Y-m-d");
  
  if(get_magic_quotes_gpc())
  {
  	$comment = stripslashes($comment);
  }
  $comment = mysql_real_escape_string($comment);

  $query = "INSERT INTO comments (recipeid, poster, date, comment) " .
       " VALUES ($recipeid, '$poster', '$date', '$comment')";

  $result = mysql_query($query);
  if ($result)
     echo "<h2>Comment posted</h2>\n";
  else
     echo "<p>Sorry, there was a problem posting your comment.</p>\n";

  echo "<a href=\"index.php?card=showrecipe&id=$recipeid\">Return to recipe</a>\n";

?>
