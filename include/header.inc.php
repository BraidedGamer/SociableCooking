<?php

if (isset($_SESSION['recipeuser']))
{
	include_once("login.inc.php");
} else
{
	include_once("navNEW.inc.php");
}

?>
