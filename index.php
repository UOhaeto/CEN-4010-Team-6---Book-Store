<!DOCTYPE html>
<html>

<?php
	include("functions/functions.php");
?>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="styles/new_style.css" media="all" </link>
</head>
<body>

	<div class="topnav">
		<a class="active" href="index.php">Home</a>
		<a href="#news">Books</a>
		<a href="#top_sellers">Top Sellers</a>
		<a href="genres.php">Genres</a>
		<a >Contact Us</a>

		<form  method="get" class="example" action="result.php" style="margin:auto;max-width:300px">
			<input type="text" placeholder="Search..." name="user_query"></input>
			<input type="submit" name="search" value="Search" style="float: right;"/>
			<div style="clear:both;"></div>

		</form>

	</div>

	<div class="content" >

		<div id="book_container">
			<?php getBook(); ?>

		</div>

	</div>

</body>
</html>
