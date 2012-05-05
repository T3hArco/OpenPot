<?php
	session_start();

	include "includes/config.php";
	include "includes/db.php";

	define('INCLUDED_BY_MAIN', true); //Do not allow files to be accessed unless included.

	$db = db::build($config['db']);

	if ($config['debug']['enabled'] == true) {
		error_reporting(E_ALL);
	} else {
		error_reporting(0);
	}


	if (!isset($_GET['page'])) {
		$pageInclude = "partials/home.php";
	} elseif (isset($_GET['page'])) {
	switch($_GET['page']) {
		default:
			$pageInclude = "partials/home.php";
			}
		}
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<title><?php print $config['site']['title']; ?></title>
		<link rel="stylesheet" href="style.css" type="text/css" media="screen">
	</head>
	<body id="container">
		<div>
			<p>
				<?php
					include $pageInclude;
				?>
			</p>
		</div>
		<div id="footer">
			<center>&copy; <?php print date('Y'); ?> OpenPot - All rights reserved</center>
		</div>
	</body>
</html>
