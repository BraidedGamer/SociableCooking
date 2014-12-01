<?php

$userid = $_POST['id'];
$password = $_POST['password'];
$confirm = $_POST['confirm'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$baduser = 0;

if(get_magic_quotes_gpc())
{
	$password = stripslashes($password);
	$confirm = stripslashes($confirm);
	$firstName = stripslashes($firstName);
	$lastName = stripslashes($lastName);
	$email = stripslashes($email);
}
$password = mysql_real_escape_string($password);
$confirm = mysql_real_escape_string($confirm);
$firstName = mysql_real_escape_string($firstName);
$lastName = mysql_real_escape_string($lastName);
$email = mysql_real_escape_string($email);

// Check if password was entered
if (trim($password) == '')
{
	echo "<p>Sorry, you must enter a password.<br>\n";
	echo "<a href=\"index.php?card=myaccount\">Back to Account</a></p>\n";
	$baduser = 1;
}

// Check if password and confirm password match
if ($password != $confirm)
{
	echo "<p>Sorry, the passwords you entered did not match.<br>\n";
	echo "<a href=\"index.php?card=myaccount\">Back to Account</a><br>\n";
	$baduser = 1;
}

if ($baduser != 1)
{
	//Everything passed, Update credientials in database
	$query = "UPDATE users SET password=PASSWORD('$password'), firstName='$firstName', lastName='$lastName', email='$email' WHERE userid = '$userid'";
	$result = mysql_query($query) or die('Sorry, we are unable to process your request.' . mysql_error());
	
	if ($result)
	{
		$_SESSION['recipeuser'] = $userid;
		echo "<p>Your credientials have been updated!</p>\n";
		exit;
	} else
	{
		echo "<p>Sorry, there was a problem processing your login request.<br>\n";
		echo "<a href=\"index.php?card=myaccount\">Back to Account</a></p>\n";
	}
}
?>
