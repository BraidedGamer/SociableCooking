<?php
	$recipeid = $_GET['id'];
	
	$query = "SELECT COUNT(commentid) FROM comments WHERE recipeid = $recipeid";
	$result = mysql_query($query);
	$row=mysql_fetch_array($result);

	if ($row[0] == 0)
	{
		echo "<table width=\"100%\" border=\"0\" cellspacing=\"5\" cellpadding=\"0\" align=\"left\">\n";
		echo "<tr><td>No comments posted yet.</td></tr>\n";
		echo "<tr><td><hr></td></tr>\n";
		echo "</table>\n";
	} else
	{
   		$totrecords = $row[0];
   		echo "<table width=\"100%\" border=\"0\" cellspacing=\"5\" cellpadding=\"0\" align=\"left\">\n";
   		echo "<tr><td>" . $row[0] . "\n";
   		echo " comments posted.  </td></tr>\n";
   		echo "<tr><td><hr></td></tr>\n";
   		echo "<tr><td><h1>Comments</h1></td></tr>\n";
   		echo "</table>\n";
   
    	if (!isset($_GET['page']))
    		$thispage = 1;
		else
			$thispage = $_GET['page'];
	
			$recordsperpage = 5;
			$offset = ($thispage - 1) * $recordsperpage;
			$totpages = ceil($totrecords / $recordsperpage);

		   	$query = "SELECT date,poster,comment FROM comments WHERE recipeid = $recipeid ORDER BY commentid
   						DESC LIMIT $offset, $recordsperpage";
   			$result = mysql_query($query) or die('Could not retrieve comments');
   			
		while($row = mysql_fetch_array($result, MYSQL_ASSOC))
   		{
       			$date = $row['date'];
       			$poster = $row['poster'];
   				$comment = $row['comment'];
    			$comment = nl2br($comment);

   			echo "<table width=\"100%\" border=\"0\" cellspacing=\"5\" cellpadding=\"0\" align=\"left\" valign=\"bottom\">\n";
       		echo "<tr><td><p>$comment</p></td></tr>\n";
       		echo "<tr><td><font size=\"1\" color=\"ff9966\">posted by: chef <em>$poster</em> on $date</td></tr>\n";
   			echo "<tr><td><hr></td></tr>\n";
   			echo "</table>\n";
   		}

		if ($thispage > 1)
   		{
   			$page = $thispage - 1;
			$prevpage = "<pagePREV><a href=\"index.php?card=showrecipe&id=$recipeid&page=$page\">Previous</a></pagePREV>";
		} else
		{
			$prevpage = "<pagePREV>Previous</pagePREV>";
		}
			$bar = '';

			if  ($totpages > 1)
		{
			for($page = 1; $page <= $totpages; $page++)
			{
				if ($page == $thispage)
				{
					$bar .= " <pageBAR>$page</pageBAR> ";
				} else
				{
					$bar .= "<pageBAR><a href=\"index.php?card=showrecipe&id=$recipeid&page=$page\">$page</a></pageBAR> ";
				}
			}
		}
	
		if ($thispage < $totpages)
		{
			$page = $thispage + 1;
			$nextpage = "<pageNEXT><a href=\"index.php?card=showrecipe&id=$recipeid&page=$page\">Next</a></pageNEXT>";
		} else
		{
			$nextpage = "<pageNEXT>Next</pageNEXT>";
		}
		
		echo "<table width=\"80%\" border=\"0\" cellspacing=\"5\" cellpadding=\"0\" align=\"left\">\n";
		echo "<tr><td width=\"100\" align=\"center\">GoTo:</td>" . "<td width=\"50\" align=\"left=\">$prevpage</td>"
		. "<td width=\"200\">$bar</td>" . "<td width=\"50\" align=\"right\">$nextpage</td></tr></table>\n";
		}
	} else
	{
		echo "<h2>Sorry, your not logged in!</h2><br>\n";
		echo "<p>I'm sorry but you must be logged in using your member credientials in order to use this site!</p>\n";
	}

?>