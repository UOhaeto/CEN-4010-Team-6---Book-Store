<!DOCTYPE html>
<html>
<?php
	session_start();
	
	include("functions/functions.php");
	echo file_get_contents("html/header.php");
	
	$id=$_SESSION['SESS_USERID'];
	$query = mysqli_query($con, "SELECT * FROM users INNER JOIN shippingaddresses WHERE userID=$id");
	while($result = mysqli_fetch_array($query))
	{
    $fname = $result['fName'];
    $lname = $result['lName'];
    $nickname = $result['nickname'];
    $email = $result['email'];
    $entireNumber = $result['entireNumber'];
    $homeStreet = $result['homeStreet'];
    $homeCity = $result['homeCity'];
    $homeState = $result['homeState'];
    $homeZip = $result['homeZip'];
    $shippingStreet = $result['shippingStreet'];
    $shippingCity = $result['shippingCity'];
    $shippingState = $result['shippingState'];
    $shippingZip = $result['shippingZip'];
	}
?>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="styles/new_style.css" media="all" </link>
</head>
<body>

	<div class="myAccountPage">
		<div class="userProfileName">
			<h2 style="margin-bottom: 0px; padding-left: 10px;"><b><?php echo $fname ?> <?php echo $lname ?></b></h2>
			<h4 style="margin-top: 0px; padding-left: 10px;"><b><?php echo $nickname ?></b></h4>
		</div>
		<div class="myAccountSideBox">
        <a href="creditCardManager.php">Credit Cards</a>
        <a href="addressManager.php">Shipping Addresses</a>
				<a href="edit_profile_information.php">Edit Profile</a>
  	</div>

	</div>

	<div class="myAccountPage" style="font-family: Helvetica;">
		<div style="float: left; width: 30%; padding-left: 10px;">
			<h3 style="margin-bottom: 0;">Home Address</h3>
			<p style="margin-top: 0; margin-bottom: 0;"><?php echo $homeStreet ?></p>
			<p style="margin-top: 0; margin-bottom: 0;"><?php echo $homeCity ?></p>
			<p style="margin-top: 0; margin-bottom: 0;"><?php echo $homeState ?>,<?php echo $homeZip ?></p>
		</div>

		<div style="float: right; width: 30%; padding-right: 400px; margin-top: 20px;">
			<h3 style="margin-top: 0; margin-bottom: 0;">Email Address</h3>
			<p style="margin-top: 0px; margin-bottom: 10px;"><?php echo $email ?></p>

			<h3 style="margin-bottom: 0;">Phone Number</h3>
			<p style="margin-top: 0; margin-bottom: 0;"><?php echo $entireNumber ?></p>
		</div>
	</div>

</body>
</html>
