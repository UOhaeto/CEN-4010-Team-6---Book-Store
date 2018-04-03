<!DOCTYPE html>
<html>

<?php
	include("html/header.php");
	require_once('authorize.php');
?>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="styles/new_style.css" media="all" </link>
</head>
<body>
	  		<center><b><font color="black"> Welcome back
		<?php
			echo($_SESSION['SESS_USERNAME']);
		?>! </b></center>
	<div class="content" >

	<?php cart(); ?>
		Your Cart: <?php total_books();?> Total Price: <?php total_price(); ?>

		<div id="book_container">
			<?php getBook(); ?>

			<?php
			$limit = 3;
			if(isset($_GET['page'])) {
				$page = $_GET['page'];
			}else {
				$page = 1;
				}
			$start_from = ($page -1) * $limit;
			$sql = "SELECT COUNT(isbn) FROM books";
			$rs_result = mysqli_query($con, $sql);
			$row = mysqli_fetch_row($rs_result);
			$total_records = $row[0];
			$total_pages = ceil($total_records / $limit);
			$pagLink = "<div class='pagination'>";
			for ($i=1; $i<=$total_pages; $i++) {
									 $pagLink .= "<a href='index.php?page=".$i."'>".$i."</a>";
			};
			echo $pagLink . "</div>";

 ?>
		</div>

	</div>

</body>
</html>
