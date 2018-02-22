<!DOCTYPE html>
<html>

<?php
	include("functions/functions.php");
	require_once('authorize.php');
	echo("Logged in as: ");
	echo($_SESSION['SESS_USERNAME']);
	echo file_get_contents("html/header.html");
	

?>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="styles/new_style.css" media="all" </link>
</head>
<body>

	<div class="content" >

		<div id="book_container">
			<?php getBook(); ?>
		</div>

	</div>

</body>
</html>
