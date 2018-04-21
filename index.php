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
	  		<center><b><font color="black" face="Helvetica"> Welcome back
		<?php
			echo($_SESSION['SESS_USERNAME']);
		?>! </b></center>
	<div class="content" >

	<?php cart();  saveForLater();?>


		<div id="book_container">
			<?php getBook(); ?>


		</div>

	</div>

</body>
</html>
