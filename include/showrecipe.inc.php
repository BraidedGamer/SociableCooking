<?php
	$recipeid = $_GET['id'];

	$query = "SELECT catid,title,poster,spicer,shortdesc,ingredients,directions from recipes where recipeid = $recipeid";
	$result = mysql_query($query) or die('Sorry, could not find recipe requested');
	$row = mysql_fetch_array($result, MYSQL_ASSOC) or die('No records retrieved');

		$catid = $row['catid'];
		$title = $row['title'];
		$poster = $row['poster'];
		$spicer = $row['spicer'];
		$shortdesc = $row['shortdesc'];
		$ingredients = $row['ingredients'];
		$directions = $row['directions'];

		$ingredients = nl2br($ingredients);
		$directions = nl2br($directions);

		$catquery = "SELECT * FROM categories WHERE catid = $catid";
                $catresult = mysql_query($catquery) or die('Could not retrieve category identification: ' .mysql_error());
                $catrow = mysql_fetch_array($catresult, MYSQL_ASSOC);
                $category = $catrow['name'];


	if($spicer == '') {
		echo "<table width=\"100%\" border=\"0\" cellspacing=\"5\" cellpadding=\"0\" align=\"center\">\n";

		echo "<tr><td rowspan=\"7\" valign=\"top\" align=\"center\" width=\"180px\">\n";
		echo "<img src=\"showimage.php?id=$recipeid\" width=\"180px\" height=\"280px\"></td>\n";
		echo "<td valign=\"bottom\"><recipeTIT>$title</recipeTIT><catname>$category</catname></td></tr>\n";
		echo "<tr><td valign=\"top\"><font size=\"1\" color=\"#ff9966\">posted by: <em>Chef $poster</em></font></td></tr>\n";

		echo "<tr><td valign=\"top\"><p>$shortdesc</p></td></tr>\n";
		echo "<tr><td valign=\"bottom\"><ingredients>Ingredients</ingredients></td></tr>\n";
		echo "<tr><td valign=\"top\">" . $ingredients . "</td></tr>\n";

		echo "<tr><td valign=\"bottom\"><directions>Directions</directions></td></tr>\n";
		echo "<tr><td valign=\"top\">" . $directions . "</td></tr>\n";

		echo "</table>\n";
	} else {
		echo "<table width=\"100%\" border=\"0\" cellspacing=\"5\" cellpadding=\"0\" align=\"center\">\n";

                echo "<tr><td rowspan=\"7\" valign=\"top\" align=\"center\" width=\"180px\">\n";
                echo "<img src=\"showimage.php?id=$recipeid\" width=\"180px\" height=\"280px\"></td>\n";
                echo "<td valign=\"bottom\"><recipeTIT>$title</recipeTIT><catname>$category</catname></td></tr>\n";
                echo "<tr><td valign=\"top\"><font size=\"1\" color=\"#ff9966\">posted by: <em>Chef $poster</em>\n";
		echo " and spiced by: <em>Chef $spicer</em></font></td></tr>\n";

                echo "<tr><td valign=\"top\"><p>$shortdesc</p></td></tr>\n";
                echo "<tr><td valign=\"bottom\"><ingredients>Ingredients</ingredients></td></tr>\n";
                echo "<tr><td valign=\"top\">" . $ingredients . "</td></tr>\n";

                echo "<tr><td valign=\"bottom\"><directions>Directions</directions></td></tr>\n";
                echo "<tr><td valign=\"top\">" . $directions . "</td></tr>\n";

                echo "</table>\n";
	}

	$query = "SELECT COUNT(commentid) FROM comments WHERE recipeid = $recipeid";
	$result = mysql_query($query);
	$row=mysql_fetch_array($result);

	if ($row[0] == 0)
	{
		echo "<table width=\"100%\" border=\"0\" cellspacing=\"5\" cellpadding=\"0\" align=\"left\">\n";
		echo "<tr><td><h1>Comments</h1></td></tr>\n";
		echo "<tr><td>No comments posted yet.\n";
		echo "<tr><td><hr class=\"peach\"></td></tr>\n";
		echo "</table>\n";
	} else
	{
   		$totrecords = $row[0];
   		echo "<table width=\"100%\" border=\"0\" cellspacing=\"5\" cellpadding=\"0\" align=\"left\">\n";
   		echo "<tr><td><h1>Comments</h1></td></tr>\n";
   		echo "<tr><td>" . $row[0] . "\n";
   		echo " comments posted.  \n";
   		echo "<tr><td><hr></td></tr>\n";
   		echo "</table>\n";

    	if (!isset($_GET['page']))
    		$thispage = 1;
		else
			$thispage = $_GET['page'];

			$recordsperpage = 2;
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

					$date = date("l M jS, Y", strtotime($date));

   			echo "<table width=\"100%\" border=\"0\" cellspacing=\"5\" cellpadding=\"0\" align=\"left\">\n";
       		echo "<tr><td><p>$comment</p></td></tr>\n";
       		echo "<tr><td><font size=\"1\" color=\"ff9966\">posted by: <em>$poster</em> on $date</td></tr>\n";
   			echo "<tr><td><hr></td></tr>\n";
   			echo "</table>\n";
   		}

		if ($thispage > 1)
   		{
   			$page = $thispage - 1;
			$prevpage = "<a href=\"index.php?card=showrecipe&id=$recipeid&page=$page\">Previous</a>";
		} else
		{
			$prevpage = "Previous";
		}
			$bar = '';

			if  ($totpages > 1)
		{
			for($page = 1; $page <= $totpages; $page++)
			{
				if ($page == $thispage)
				{
					$bar .= " $page ";
				} else
				{
					$bar .= "<a href=\"index.php?card=showrecipe&id=$recipeid&page=$page\">$page</a> ";
				}
			}
		}

		if ($thispage < $totpages)
		{
			$page = $thispage + 1;
			$nextpage = "<a href=\"index.php?card=showrecipe&id=$recipeid&page=$page\">Next</a>";
		} else
		{
			$nextpage = "Next";
		}

		echo "<table width=\"100%\" border=\"0\" cellspacing=\"3\" cellpadding=\"5\" align=\"left\">\n";
		echo "<tr><td width=\"50\" align=\"right\">GoTo:</td>" . "<td width=\"50\" align=\"left=\"><page>$prevpage</page></td>"
		. "<td width=\"250\" align=\"center\"> <page>$bar</page> </td>" . "<td width=\"50\" align=\"right\"><page>$nextpage</page></td></tr></table>\n";
		}
?>
