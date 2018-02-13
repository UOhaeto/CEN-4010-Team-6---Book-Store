<!DOCTYPE html>
<html>

<?php
	include("functions/functions.php");
  echo file_get_contents("html/header.html");
?>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="styles/new_style.css" media="all" </link>
</head>
<body>
	<div class="content" >
	
		<div id="book_container">
			<?php getGenres(); ?>
			<?php getBookGenre(); ?>
		</div>
		
	</div>

</body>
</html>
