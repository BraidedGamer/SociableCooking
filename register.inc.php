<?php

echo "<form action=\"index.php\" method=\"post\" target=\"_self\">\n";

echo "<table width=\"300\" border=\"0\" cellspacing=\"5\" cellpadding=\"0\" align=\"right\">\n";

echo "<tr><td colspan=\"2\"><h1><b>Sign-UP</b></h1></td></tr>\n";

echo "<tr><td colspan=\"2\"><p>Register at SociableCooking to share your recipes and \n";
echo "comments, as well as share your kitchen creativity \n";
echo "with others!<br>\n";
echo "Please enter you credientials below!</p></td></tr>\n";

echo "<tr><td colspan=\"2\"><hr></td></tr>\n";

echo "<tr><td align=\"right\"><b>UserName:</b></td>\n";
echo "<td align=\"left\"><input type=\"text\" name=\"useridREG\" id=\"useridREG\"></td></tr>\n";

echo "<tr><td align=\"right\"><b>Password:</b></td>\n";
echo "<td align=\"left\"><input type=\"password\" name=\"passwordREG\" id=\"passwordREG\"></td></tr>\n";

echo "<tr><td align=\"right\"><font size=\"1\">Confirm Password:</font></td>\n";
echo "<td align=\"left\"><input type=\"password\" name=\"confirmPASS\" id=\"confirmPASS\"></td></tr>\n";

echo "<tr><td align=\"right\"><b>Full name:</b></td>\n";
echo "<td align=\"left\"><input type=\"text\" size=\"40\" name=\"fullName\" id=\"fullName\"></td></tr>\n";

echo "<tr><td align=\"right\"><b>E-mail address:</b></td>\n";
echo "<td align=\"left\"><input type=\"email\" size=\"50\" name=\"email\" id=\"email\"></td></tr>\n";

echo "<tr><td><input type=\"hidden\" name=\"card\" value=\"adduser\"></td>\n";
echo "<td align=\"right\"><input type=\"submit\" value=\"Sign-UP\" id=\"signUPbtn\"></td></tr>\n";

echo "<tr><td align=\"left\" colspan=\"2\"><a href=\"index.php/card=forgotten\">Forgotten Password?</a></td></tr>\n";

echo "<tr><td colspan=\"2\"><hr></td></tr>\n";

echo "<tr><td colspan=\"2\"><p><font size=\"1\"><b>TERMS OF USE:</b> By logging in to this Web site you agree
  to abide by all the rules and regulations set forth in the TERMS OF USE policy. No foul language will be permitted 
  in the postings at any time. Please respect the opinions of others-no flame wars allowed. Any user caught violating
  these very simple rules will be terminated and not allowed back in. <b>Privacy Policy:</b> We do not share user
  information with third parties and try to take every possible precaution to ensure that your information remains
  safe and secure.</font></p></td></tr>\n";

echo "<tr><td colspan=\"2\" align=\"right\"><font size=\"1\" color=\"#cc9966\">&copy; " . 
	date("Y") . " Ted's Unique Area Graphics <br> All Rights Reserved</font></td></tr>\n";

echo "</table></form>\n";

?>

