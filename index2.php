<!DOCTYPE html>
<html>
<?php
	session_start();
	
	include("functions/functions.php");
	echo file_get_contents("html/header.php");
	
	$query = $con->query("
	  SELECT books.isbn, books.book_title, AVG(book_ratings.rating) AS rating
	  FROM books
	  LEFT JOIN book_ratings
	  ON books.isbn = book_ratings.book
	  GROUP BY books.isbn
	");
	$books = [];
	while($row = $query->fetch_object()){
		$books[] = $row;
	}
?>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="styles/new_style.css" media="all" </link>
<body>
	<?php foreach($books as $book): ?>
      <div class="book">
        <h3><a href="book.php?isbn=<?php echo $book->isbn; ?>"><?php echo $book->book_title; ?></a></h3>
        <div class="book-rating">Rating: <?php echo round($book->rating); ?>/5</div>
      </div>
    <?php endforeach; ?>
</body>
</head>
</html>
