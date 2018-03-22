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
			
			<?php
						
				//check url for the isbn
				if(isset($_GET['b_isbn'])){
								
				$isbn = $_GET['b_isbn'];
								
							
							
				// query that gets the isbn
				$get_b = "select * from books where isbn='$isbn'";
							
				//running query
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
					$b_description = $row_b['description'];
					$b_a_description = $row_b['author_bio'];
					$b_a_description = $row_b['author_bio'];

					//primary key
					//used to display individual datails page.
					$b_isbn = $row_b['isbn'];

					echo "
						<div id='single_book' width: 70%; height: auto;>
										
						<h3>$b_title</h3>
						<img src='admin/book_images/$b_image' width='300px' height='400px' />
										
						<p> $ $b_price </p>
						<p> Book Description: $b_description

						<div style='margin: auto; '>
						<a href='index.php' style='float:left;'> Go Back</a>
											
											
											
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
