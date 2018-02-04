<?php

	//connect to database. //server, user, password, database
	$con = mysqli_connect("localhost","root","","geek_text");

	//function to get genres
	function getGenres(){
		
		//make variable global
		global $con;
		
		//variable that gets items from book_genres table
		$get_genres = "select * from book_genres";
		
		
		$run_genres =  mysqli_query($con, $get_genres);
		
		//loop that runs depending on the amount of rows on the book_genres table
		
		while($row_genres=mysqli_fetch_array($run_genres)){
			
		
			//fetching the information from the genre_type table on database
			$genre_id = $row_genres['genre_id'];
			$genre_type = $row_genres['genre_type'];

			//display genres
			echo "<li><a href='#'> $genre_id $genre_type </a></li>";
		}
		
	}
	
	//function to display books on main page.
	function getBook(){
		
		//connection to db
		global $con;
		
		//get 6 random books
		$get_b = "select * from books order by RAND() LIMIT 0,6";
		
		
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


				echo "
					<div id='single_book'>
					
						<h3>$b_title</h3>
						<img src='admin/book_images/$b_image' width='150px' height='200px' />
						<p> $ $b_price </p>
						
						<a href='details.php' style='float:left;'>More Info</a>
						<a href='index.php'><button style='float:right'>Add to Cart</button></a>
					</div>
				
				";
			
		}
	}






?>