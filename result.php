<!DOCTYPE html>
<html>

<?php

	include("functions/functions.php");
  echo file_get_contents("html/header.php");
?>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="styles/new_style.css" media="all" </link>
</head>
<body>
	<div class="content" >

		<div id="book_container">

				<?php
				if(isset($_GET['search'])){
					$search_query = $_GET['search'];

					echo "<script>alert($search_query)</script>";

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
