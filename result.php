<!DOCTYPE html>
<html>

<?php

	include("functions/functions.php");
  echo file_get_contents("html/adv_search.php");
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

					if(isset($_GET['sort'])){
						$sort = $_GET['sort'];
					}else{
						$sort = "";
					}

					//No filter.
				$get_b = "select * from books where book_title like '%$search_query%'";


				//<!--Author Filter  -->
				if($sort == "author"){
					$get_b = "SELECT * FROM books WHERE book_title like '%$search_query%' ORDER BY author";
					//echo "<script>alert('Author Query')</script>";
				}

				//<!-- Low to High Price -->

				if($sort == "low-price"){
					$get_b = "SELECT * FROM books WHERE book_title like '%$search_query%' ORDER BY price ASC";
				//	echo "<script>alert('low-price Query')</script>";
				}
				//<!-- High to Low Price -->

				if($sort == "high-price"){
					$get_b = "SELECT * FROM books WHERE book_title like '%$search_query%' ORDER BY price DESC";
				//	echo "<script>alert('high-price Query')</script>";
				}
				//<!-- Year: new to old -->

				if($sort == "new-release"){
					$get_b = "SELECT * FROM books WHERE book_title like '%$search_query%' ORDER BY year DESC";
				//	echo "<script>alert('new-release Query')</script>";
				}
				//<!-- Year: old to new -->
				if($sort == "old-release"){
					$get_b = "SELECT * FROM books WHERE book_title like '%$search_query%' ORDER BY year ASC";
				//	echo "<script>alert('old-release Query')</script>";
				}

				//<!-- Book Title  -->
				if($sort == "title"){
					$get_b = "SELECT * FROM books WHERE book_title like '%$search_query%' ORDER BY book_title";
				//	echo "<script>alert('Title Query')</script>";
				}






				$run_b = mysqli_query($con, $get_b);
				while($row_b=mysqli_fetch_array($run_b)){
						//initializing variable with book name.
						$b_title = $row_b['book_title'];
						$b_author = $row_b['author'];
						$b_genre = $row_b['genre'];
						$b_release = $row_b['year'];
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
								<p>Author: $b_author</p>
								<p>Year: $b_release</p>


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
