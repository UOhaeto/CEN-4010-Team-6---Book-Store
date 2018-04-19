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


	

	<form action = "" method = "post" enctype="multipart/form-data">

			<table align = "center" width = "700" bgcolor = "gray">

					<tr align = "center">
								<th>Books</th>
								<th>Quantity</th>
								<th>Total Price</th>
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

				<?php

				$cart_isbn = "";

				$cart_query = "select * from cart";

				$order_isbn = array();

 				echo $cart_isbn;

				if(isset($_POST['place_order'])){
				$run_isbn = mysqli_query($con, $cart_query);

				while($row_b=mysqli_fetch_array($run_isbn)){
						$temp_isbn = $row_b['book_id'];
						$same_isbn = "select * from books where isbn = '$temp_isbn'";
						$run_temp = mysqli_query($con, $same_isbn);
						//array_push($order_isbn, $run_temp);
						$usernum = $_SESSION['SESS_USERID'];
						//$cur_isbn = $run_temp['isbn'];
						$run_lib = mysqli_query($con, "insert into myLibrary (userID, bookID) values ({$usernum}, {$temp_isbn})");

						while($rowb_temp=mysqli_fetch_array($run_temp)){
								$sold_amnt = $rowb_temp['sold'];
								$sold_amnt = $sold_amnt + 1;
								$sql_update = "update books set sold = '$sold_amnt' where isbn = '$temp_isbn'";
								$update_run = mysqli_query($con, $sql_update);
								$delete_sql = "delete from cart where book_id = '$temp_isbn'";
								$run_dlt = mysqli_query($con, $delete_sql);
						}	//Closes second while

				}	//Closes first while


			}	//Closes if statement

				?>


				<?php

				//$userlogg_in = "select userID from users where userID= {$_SESSION['SESS_USERID']}";
				//$run_login = mysqli_query($con, $userlogg_in);
				//$book_code = "select isbn from books where sold > 0";
				//$run_code = mysqli_query($con, $book_code);

				//if(isset($_POST['place_order']) && ($_SESSION['SESS_USERID'] > 0) ){

					//while($row_c=mysqli_fetch_array($run_login)&&($row_ctemp=mysqli_fetch_array($run_code))){
							//$currlogg_in = $row_c['userID'];
							//$bk_code


							//echo $bk_sold;
					//}			//Close first while
					//echo $currlogg_in;



				//}



				?>


				<tr align = "right">
						<td colspan="4"><b>Total:</b></td>
						<td><?php echo "$" . $total; ?></td>
				</tr>

				<tr align = "center">
							<td><button><a href = "shoppingcart.php" style="text-decoration: none; color:black;">Back to Cart</a></button></a></td>
							<td colspan ="2"><input type= "submit" name= "place_order" value= "Place Order" style= "text-decoration: underline;"/></td>
							<td></td>

							<?php //if user clicks place order, this will take him to the order review page.
								if(isset($_POST['place_order'])){
									echo "<script>window.open('orderreview.php','_self')</script>";
								}
							 ?>
				</tr>




		</div>

	</div>

</body>
</html>
