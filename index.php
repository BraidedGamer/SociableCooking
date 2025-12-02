<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Braided Kitchen - Opening the Kitchen Environment</title>
		<link rel="Shortcut Icon" href="images/sociable-logo.ico" />
		<link rel="stylesheet" type="text/css" href="stylesheets/layout.css" />
		<link rel="stylesheet" type="text/css" href="stylesheets/textStyles.css" />
		<link rel="stylesheet" type="text/css" href="stylesheets/fieldStyle.css" />
		<link href='http://fonts.googleapis.com/css?family=Condiment' rel='stylesheet' type='text/css'>

		<!-- Bootstrap CSS CDN link -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

		<!-- viewport is a meta tag that will help with proper page responsive behavior with bootstrap -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<?php
			include_once("myLibrary/secure.con.php");
			include("myLibrary/functions.php");
			include("myLibrary/recipe_display.func.php");
		?>

		<!-- <div id="wrapper"> -->
			<div class="headerBar">
				<?php 
					include_once("include/header.inc.php");
				?>
			</div>
			<div class="dashboard">
				<?php
					if(isset($_REQUEST['card'])) {
						$card = $_REQUEST['card'];
						$nextpage = "include/" . $card . ".inc.php";
						include_once($nextpage);
					} else {
				}
				?>
			</div>
			<div class="sideBar">
				<?php
					include_once("include/register.inc.php")
				?>

			</div>
			<div class="footer">
				<?php
					include_once("include/footer.inc.php");
				?>
			</div>
		<!--</div>-->
	</body>
</html>

