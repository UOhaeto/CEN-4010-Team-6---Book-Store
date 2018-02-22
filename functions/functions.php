<?php

	//connect to database. //server, user, password, database
	$con = mysqli_connect("localhost","root","","geek_text");

	if(mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_errno();
	}

//getting customer IP
	function getIp() {
	$ip = $_SERVER['REMOTE_ADDR'];

	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			$ip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}

	return $ip;
}

	//function to get genres
	function getGenres(){

		if(!isset($_GET['genre'])){

			//make variable global
			global $con;

			//variable that gets items from book_genres table
			$get_genres = "select * from book_genres order by genre_type";

			$run_genres =  mysqli_query($con, $get_genres);

			//loop that runs depending on the amount of rows on the book_genres table
			while($row_genres=mysqli_fetch_array($run_genres)){
				//fetching the information from the genre_type table on database
				$genre_id = $row_genres['genre_id'];
				$genre_type = $row_genres['genre_type'];
				//display genres
				echo "<li><a href='genres.php?genre=$genre_id'>$genre_type </a></li>";
			}

		}

	}

	//function to display books on main page.
	function getBook(){

		if(!isset($_GET['genre'])){

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
	}




	function getBookGenre(){

		if(isset($_GET['genre'])){

			//getting book genre from url
			$book_genre = $_GET['genre'];

			//connection to db
			global $con;

			//get 6 random books
			$get_books_genre = "select * from books where genre ='$book_genre' LIMIT 0,6";
			$run_books_genre = mysqli_query($con, $get_books_genre);
			$book_counter = mysqli_num_rows($run_books_genre);

			if($book_counter == 0){
					echo "<h2>There are no books on this genre!</h2>";
			}
			else{
				while($row_books_genre=mysqli_fetch_array($run_books_genre)){

						//initializing variable with book name.
					$b_title = $row_books_genre['book_title'];
					$b_author = $row_books_genre['author'];
					$b_genre = $row_books_genre['genre'];
					$b_release = $row_books_genre['release_date'];
					$b_price = $row_books_genre['price'];
					$b_rating = $row_books_genre['rating'];
					$b_image = $row_books_genre['book_image'];
						//primary key
						//used to display individual datails page.
					$b_isbn = $row_books_genre['isbn'];
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
		}
	}


	function getGUID(){
    if (function_exists('com_create_guid')){
        return com_create_guid();
    }
    else {
        mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $hyphen = chr(45);// "-"
        $uuid = chr(123)// "{"
            .substr($charid, 0, 8).$hyphen
            .substr($charid, 8, 4).$hyphen
            .substr($charid,12, 4).$hyphen
            .substr($charid,16, 4).$hyphen
            .substr($charid,20,12)
            .chr(125);// "}"
        return $uuid;
    }
}

?>
