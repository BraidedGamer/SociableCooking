<?php
echo "<table width=\"50%\" border=\"0\" cellspacing=\"5\" cellpadding=\"0\" align=\"left\">\n";

echo "<tr><td><appname><a href=\"index.php\">Braided Kitchen</a></appname></td></tr>\n";
echo "</table>\n";

echo "<div id=\"login\">\n";

echo "<form action=\"index.php\" method=\"post\" target=\"_self\">\n";

echo "<table width=\"50%\" border=\"0\" cellspacing=\"2.5\" cellpadding=\"0\" align=\"right\">\n";
echo "<tr><td align=\"right\"><font color=\"#ffffff\">\n";
echo "<b>UserName:</b>\n";
echo "</font></td>\n";
echo "<td align=\"left\">\n";
echo "<input type=\"text\" name=\"userid\" id=\"userid\">\n";
echo "</td>\n";
echo "<td align=\"right\"><font color=\"#ffffff\">\n";
echo "<b>Password:</b>\n";
echo "</font></td>\n";
echo "<td align=\"left\">\n";
echo "<input type=\"password\" name=\"password\" id=\"password\">\n";
echo "</td>\n";
echo "<td><input type=\"submit\" name=\"login\" id=\"loginbtn\" value=\"Login\"></td></tr>\n";
echo "<tr><td colspan=\"5\"><input type=\"hidden\" value=\"validate\" name=\"card\"></td></tr>\n";

echo "</table></form></div>\n";

?>
