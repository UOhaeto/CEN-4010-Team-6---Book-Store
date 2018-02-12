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

		<form class="example" action="/action_page.php" style="margin:auto;max-width:300px">


			<input type="text" placeholder="Search.." name="search"></input>
			<div style="clear:both;"></div>





		</form>

	</div>

	<div class="content" >

		<div id="book_container">

				<?php

				if(isset($_GET['search'])){

					$search_query = $_GET['user_query'];

					$get_b = "select * from books where book_title like '%$search_query%'";


				$run_b = mysqli_query($con, $get_b);

				while($row_b=mysqli_fetch_array($run_b)){

						//initializing variable with book name.
						$b_title = $row_b['book_title'];
						$b_author = $row_b['author'];
						$b_genre = $row_b['genre'];
						$b_release = $row_b['release_date'];
						$b_price = $row_b['price'];
						$b_rating = $row_b['rating'];
						$b_image = $row_b['book_image'];

						//primary key
						//used to display individual details page.
						$b_isbn = $row_b['isbn'];




						echo "
							<div id='single_book'>

								<h3>$b_title</h3>
								<a href='details.php?b_isbn=$b_isbn'><img src='admin/book_images/$b_image' width='150px' height='200px'  /></a>
								<p> $ $b_price </p>

								<div style='margin: auto;'>
								<a href='details.php?b_isbn=$b_isbn' style='float:left;'>More Info</a>

								<a href='index.php?b_isbn=$b_isbn'><button style='float:right'>Add to Cart</button></a>

								</div>
							</div>

						";

					}

				}



				 ?>


		</div>

	</div>

</body>
</html>
