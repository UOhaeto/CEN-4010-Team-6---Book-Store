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
		<a href="index.php">Home</a>
		<a href="#news">Books</a>
		<a href="#top_sellers">Top Sellers</a>
		<a class="active" href="genres.php">Genres</a>
		<a href="#contact_us">Contact Us</a>
		
		<form class="example" action="/action_page.php" style="margin:auto;max-width:300px">
			
			
			<input type="text" placeholder="Search.." name="search"></input>
			<div style="clear:both;"></div>
			
			
			
		</form>
		
	</div>

	<div class="content" >
	
		<div id="book_container">
			<?php getGenres(); ?>
			<?php getBookGenre(); ?>
		</div>
		
	</div>

</body>
</html>
