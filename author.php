<!DOCTYPE html>
<html>

<?php
	include("functions/functions.php");
	echo file_get_contents("html/header.php");
	session_start();
?>

<body>
			
	<?php

		$book = null;
						
		if(isset($_GET['b_author'])){
								
		$author = $_GET['b_author'];	
							
		$get_b = "select * from books where author='$author'";
							
		$run_b = mysqli_query($con, $get_b);

		echo" <center> <h1> All Works from $author </h1> </center>";

		while($row_b=mysqli_fetch_array($run_b)){
			$i = 0;
			
			$b_isbn[$i] = $row_b['isbn'];
			$b_title[$i] = $row_b['book_title']; 
			$b_image[$i] = $row_b['book_image'];	
			$b_description[$i] = $row_b['description'];

			echo"
										
				<center> <h3>$b_title[$i]</h3>
				<a href='details.php?b_isbn=$b_isbn[$i]'> <img src='admin/book_images/$b_image[$i]' width='300px' height='400px' /> </a>	
				<p> Book Description: $b_description[$i] </center>
											
				";
			}
			
			$i = $i + 1;
		}	
				?>
</body>
</html>