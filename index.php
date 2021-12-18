<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Sociable Cooking</title>
		<link rel="Shortcut Icon" href="images/sociable-logo.ico" />
		<link rel="stylesheet" type="text/css" href="stylesheets/layout.css" />
		<link rel="stylesheet" type="text/css" href="stylesheets/textStyles.css" />
		<link rel="stylesheet" type="text/css" href="stylesheets/fieldStyle.css" />
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Condiment" />
	</head>
	<body>
		<?php
		require_once("myLibrary/secure.php");
		?>
		<div id="wrapper">
			<div id="headerBar"><?php include_once("include/header.inc.php"); ?>
			</div>
			<div id="dashboard">
				<?php
					if(!isset($_REQUEST['card']))
						include_once("include/myrecipes.inc.php");
					else {
						$card = $_REQUEST['card'];
						$nextpage = $card . ".inc.php";
						include_once($nextpage);
					}
				?>
			</div>
			<div id="sideBar">
				<?php
					if(!isset($_SESSION['recipeuser']))	{
						include_once("include/register.inc.php");
					} else if(isset($_SESSION['recipeuser'])) {
						if($card != 'myaccount' && $card != 'changecred' && $card != 'savecred') {
							include_once("include/profile.inc.php");
						}
					}
					?>
			</div>
			<div id="footer">
				<?php
				include_once("footer.inc.php");
				?>
			</div>
		</div>
	</body>
</html>
