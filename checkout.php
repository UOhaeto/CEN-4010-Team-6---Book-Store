<!DOCTYPE html>
<html>

<?php
	include("functions/functions.php");
  echo file_get_contents("html/header.php");
?>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="styles/new_style.css" media="all" </link>
</head>
<body>

	<div class="content" >

		<?php cart(); ?>
			Your Cart: <?php total_books();?> Total Price: <?php total_price(); ?>



	<?php
	if(!isset($_SESSION['customer_email'])){

			include("login.php");

	}
	else {

			include("payment.php");

	}




	?>


		<div id="book_container">

		</div>

	</div>

</body>
</html>
