<?php

if ($con)
{
	echo "<h1>Sorry</h1>";
	echo "<p>Sorry, we cannot process your request at this time, please try again later</p>\n";
	exit;
}

$useridREG = $_POST['useridREG'];
$gender    = $_POST['gender'];
$passwordREG = $_POST['passwordREG'];
$confirmPASS = $_POST['confirmPASS'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$baduser = 0;

if(get_magic_quotes_gpc())
{
	$useridREG = stripslashes($useridREG);
	$gender    = stripslashes($gender);
	$passwordREG = stripslashes($passwordREG);
	$confirmPASS = stripslashes($confirmPASS);
	$firstName = stripslashes($firstName);
	$lastName = stripslashes($lastName);
	$email = stripslashes($email);
}
	$useridREG = mysql_real_escape_string($useridREG);
	$gender    = mysql_real_escape_string($gender);
	$passwordREG = mysql_real_escape_string($passwordREG);
	$confirmPASS = mysql_real_escape_string($confirmPASS);
	$firstName = mysql_real_escape_string($firstName);
	$lastName = mysql_real_escape_string($lastName);
	$email = mysql_real_escape_string($email);

// Check if userid was entered
if (trim($useridREG) == '')
{
	echo "<p>Sorry, you must enter a username.<br>\n";
	echo "<a href=\"index.php\">Return to Home</a></p><br>\n";
	$baduser = 1;
}

// Check if password was entered
if (trim($passwordREG) == '')
{
	echo "<p>Sorry, you must enter a password.<br>\n";
	echo "<a href=\"index.php\">Return to Home</a></p><br>\n";
	$baduser = 1;
}

// Check if password and confirm password match
if ($passwordREG != $confirmPASS)
{
	echo "<p>Sorry, the passwords you entered did not match.<br>\n";
	echo "<a href=\"index.php\">Return to Home</a></p><br>\n";
	$baduser = 1;
}

// Check if userid is already in database
$query = "SELECT userid FROM users WHERE userid = '$useridREG'";
$result = mysql_query($query);
$row = mysql_fetch_array($result, MYSQL_ASSOC);

if ($row['userid'] == $useridREG)
{
	echo "<p>Sorry, that user name is already taken.<br>\n";
	echo "<a href=\"index.php\">Return to Home</a></p><br>\n";
	$baduser = 1;
}

if ($baduser != 1)
{
	//Everything passed, enter userid in database
	$query = "INSERT INTO users VALUES ('$useridREG','$gender', 1, PASSWORD('$passwordREG'), '$firstName', '$lastName', '$email')";
	$result = mysql_query($query) or die('Sorry, we are unable to process your request.' . mysql_error());

	if ($result)
	{
		$_SESSION['recipeuser'] = $useridREG;
		echo "<p>Your registration request has been approved and you are now logged in!\n";
		echo "<a href=\"index.php\">Return to Home</a></p><br>\n";
		exit;
	} else
	{
		echo "<p>Sorry, there was a problem processing your login request.<br>\n";
		echo "<a href=\"index.php\">Return to Home</a></p><br>\n";
	}
}
?>
