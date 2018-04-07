<!DOCTYPE html>
<html>

<?php
	include("functions/functions.php");
	echo file_get_contents("html/header.php");
	session_start();
?>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="styles/new_style.css" media="all" </link>
</head>
<body>

	<div class="content" >
	
		<div id="book_container">
			
			<?php

				$book = null;
						
				//check url for the isbn
				if(isset($_GET['b_isbn'])){
								
				$isbn = $_GET['b_isbn'];	
							
				// query that gets the isbn
				$get_b = "select *, AVG(book_ratings.rating) AS rating from books LEFT JOIN book_ratings
				ON books.isbn = book_ratings.book where isbn='$isbn'";
							
				//running query
				$run_b = mysqli_query($con, $get_b);
						
				while($row_b=mysqli_fetch_array($run_b)){
									
					//initializing variable with book name.
					$b_title = $row_b['book_title']; 
					$b_author = $row_b['author']; 
					$b_genre = $row_b['genre']; 
					$b_release = $row_b['release_date'];
					$b_price = $row_b['price']; 
					$b_image = $row_b['book_image'];	
					$b_description = $row_b['description'];
					$b_a_description = $row_b['author_bio'];
					$b_a_description = $row_b['author_bio'];
					$b_rating = round ($row_b['rating']);

					//primary key
					//used to display individual datails page.
					$b_isbn = $row_b['isbn'];

					echo "
						<div id='single_book' width: 70%; height: auto;>";

					?>
					
					Rate this book:
					<?php 
					foreach(range(1, 5) as $rating): ?>
  						<a href="rate.php?book=<?php echo $b_isbn; ?>&rating=<?php echo $rating; ?>"><?php echo $rating; ?></a>
  					<?php endforeach;

					echo"
										
						<h3>$b_title</h3>
						<p> <a href='author.php?b_author=$b_author'>by $b_author </a> </p>
						<img src='admin/book_images/$b_image' class='thumbnail' width='300px' height='400px' />
										
						<p> $ $b_price </p>
						<p> Rating: $b_rating/5</p>
						<p> Book Description: $b_description
						<p> Rate this book: </p>

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

	<?php 
	$filename = "comments/" . $isbn . 'comments.html';

	if($_POST){
		$name = $_SESSION['SESS_USERNAME'];
		$comment = $_POST['commentArea'];
		if($name != 'guest'){
			$handle = fopen($filename, "a");
			fwrite($handle, "<b>" . $name. "</b>:</br>" . $comment . "</br>" );
			fclose($handle);
		}
		else{
			header('Location: login.php');
		}
	}
	?>
				<form action = "" method = "POST">
				Comments: <textarea rows = "10" cols = "30" name = "commentArea"></textarea></br>
				<input type = "submit" value = "Post">
				</form>
				<?php include	$filename; ?>
</body>
</html>
