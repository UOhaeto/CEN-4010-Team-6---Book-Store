<!DOCTYPE html>
<html>

<?php
	include("html/header.php");
	include("functions/functions.php");
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


		</div>

	</div>

</body>
</html>
