<!DOCTYPE html>
<html>
<?php
	session_start();
	
	include("functions/functions.php");
	echo file_get_contents("html/header.php");
	
	if(isset($_GET['book'], $_GET['rating'])){
		$book = (int)$_GET['book'];
		$rating = (int)$_GET['rating'];
		if(in_array($rating, [1, 2, 3, 4, 5])){
			$exists = $con->query("SELECT isbn FROM books WHERE isbn = {$book}")->num_rows ? true : false;
			if($exists){
				$con->query("INSERT INTO book_ratings (book, rating) VALUES ({$book}, {$rating})");
			}
		}
		header('Location: index.php');
}
?>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="styles/new_style.css" media="all" </link>

	Your rating has been submited.
	<p> <a href='index.php'> Continue shopping... </a> </p>
</head>
</html>
