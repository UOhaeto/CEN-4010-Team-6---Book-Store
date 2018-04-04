<!DOCTYPE html>
<html>

<?php
	session_start();
	include('functions/functions.php');
  echo file_get_contents("html/header.php");
?>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="styles/new_style.css" media="all" </link>
</head>
<body>


	<div class= "shopping_cart" >

		<head>
		<title> Review Order</title>
		</head>
		<body>

		<?php echo '<h1>' . '</h1>'; ?>
		<p align = "center"> <b>Review your Order</b></p>
		<style type = "text/text/css">
		p {
			font-size: 20px;
			color: blue;
			text-decoration: underline;
			font-family: Times;
		}
		</style>
		</body>


	<?php cart(); ?>

	<form action = "" method = "post" enctype="multipart/form-data">

			<table align = "center" width = "700" bgcolor = "gray">

					<tr align = "center">
								<th>Books</th>
								<th>Quantity</th>
								<th>Book Price</th>
					</tr>

					<?php
					global $con;
					$total = 0;

					$ip = getIp();

					$sel_price = "select * from cart where ip_add= '$ip'";

					$run_price = mysqli_query($con, $sel_price);

					while ($p_price=mysqli_fetch_array($run_price)){

							$pro_id = $p_price['book_id'];

							$bk_quantity = $p_price['quantity'];

							$pro_price = "select * from books where isbn='$pro_id'";

							$run_book_price = mysqli_query($con, $pro_price);

							while ($b_price = mysqli_fetch_array($run_book_price)){

									$book_price = array($b_price['price']);

									$book_tit = $b_price['book_title'];

									$book_img = $b_price['book_image'];

									$single_price = $b_price['price'];

									$values = array_sum($book_price);

									$total +=$values;


					?>



					<tr align = "center">

							<td>
							<img src='admin/book_images/<?php echo $book_img;?>' width ='150' height='200'/>
							</td>
							<td><?php echo $bk_quantity; ?><br>
							<?php

							if(isset($_POST['update_cart'])){

								//if quantity is set
									if(is_numeric($_POST['quantity'])){

											$qty = $_POST['quantity'];

											$update_qty = "update cart set quantity='$qty'";

											$run_qty = mysqli_query($con, $update_qty);

											$_SESSION['quantity'] = $qty;

											$total = $total * $qty;
										}
										//checking if remove checkbox was set
										if(isset($_POST['remove'])){
										foreach ($_POST['remove'] as $remove_id) {

											$delete_book = "delete from cart where book_id= '$remove_id' AND ip_add = '$ip'";

											$run_delete = mysqli_query($con, $delete_book);

											if($run_delete){
												echo "<script>window.open('shoppingcart.php','_self')</script>";

											}

										}//end of for each

									}//end of remove if

							}//end of outer if


							?>



							<td><?php echo "$" . $single_price; ?></td>
					</tr>


				<?php } } ?><!--end of the while loops-->

				<tr align = "right">
						<td colspan="4"><b>Total:</b></td>
						<td><?php echo "$" . $total; ?></td>
				</tr>

				<tr align = "center">
							<td><button><a href = "shoppingcart.php" style="text-decoration: none; color:black;">Back to Cart</a></button></a></td>
							<td colspan ="2"><button><a href = "orderreview.php" style="text-decoration: underline; color:black;">Place Order</a></button></a></td>
							<td></td>

							<?php //if user clicks continue shopping, this will take him back to the main page
								if(isset($_POST['continue'])){
									echo "<script>window.open('index.php','_self')</script>";
								}
							 ?>
				</tr>


		</div>

	</div>

</body>
</html>
