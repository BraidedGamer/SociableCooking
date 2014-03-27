<?php
/*
 *This is the forgotten password screen with a form to submit your email to a 
 *mysql database along with a uniqueid identifier to ensure you are who you say
 *you are.
*/

echo "<h1>Sorry For The Inconvience</h1>\n";
echo "<p>So you've forgotten your password, well luckily we've thought ahead.";
echo " Please fill out the following form and you should recieve an email ";
echo "shortly. Said email will contain a link to the reset password form.</p>";

echo "<form action=\"index.php\" method=\"post\" target=\"_self\">\n";
echo "<table width=\"200px\" border=\"0\" cellspacing=\"2.5px\" cellpadding=\"0\" align=\"center\">\n";
echo "<tr><td align=\"right\"><font color=\"#000\">\n";
echo "<b>E-Mail</b></font></td>\n";
echo "<td align=\"left\">\n";
echo "<input type=\"text\" name=\"email-retrieval\" id=\"emailRetrieval\">\n";
echo "</td></tr>\n";
echo "<tr><td colspan=\"2\" align=\"right\">\n";
echo "<input type=\"submit\" name=\"forgotten\" id=\"emailRetrievalbtn\" value=\"Forgotten Password\"></td></tr>\n";
echo "<tr><td><input type=\"hidden\" value=\"reset-request\" name=\"card\"></td></tr>\n";
echo "</table></form>\n";

?>
