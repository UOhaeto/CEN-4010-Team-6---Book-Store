<?php
session_start();
    function filter($date)
    {
        return trim(htmlspecialchars($date));
    }

	include('functions/functions.php');

    $address = filter($_POST['address']);
    $city = filter($_POST['city']);
    $state = filter($_POST['state']);
    $zip = filter($_POST['zip']);
    $id = $_POST['shpID'];
	$userid = $_SESSION['SESS_USERID'];
	
	if(isset($_SESSION['SESS_USERID'])) {
		if ($id != "-") {
			if(!empty ($address))
			{
				$query = mysqli_query($con, "UPDATE shippingaddresses SET shippingStreet = '$address' WHERE shippingaddressID=$id");
			}
			if(!empty ($city))
			{
				$query = mysqli_query($con, "UPDATE shippingaddresses SET shippingState = '$state' WHERE shippingaddressID=$id");
			}
			if(!empty ($state))
			{
				$query = mysqli_query($con, "UPDATE shippingaddresses SET shippingCity = '$city' WHERE shippingaddressID=$id");
			}
			if(!empty ($zip))
			{
				$query = mysqli_query($con, "UPDATE shippingaddresses SET shippingZip = '$zip' WHERE shippingaddressID=$id");
			}
		} 
		else if ($id == "-") {
			if(!empty ($address))
			{
				$query = mysqli_query($con, "INSERT INTO `shippingaddresses` (`shippingaddressID`, `shippingStreet`) VALUES (2, $address)");
			}
			if(!empty ($city))
			{
				$query = mysqli_query($con, "INSERT INTO `shippingaddresses` (`shippingState`) VALUES ($state)");
			}
			if(!empty ($state))
			{
				$query = mysqli_query($con, "INSERT INTO `shippingaddresses` ('shippingCity`) VALUES ($city)");
			}
			if(!empty ($zip))
			{
				$query = mysqli_query($con, "INSERT INTO `shippingaddresses` (`shippingZip`) VALUES ($zip)");
			}

			$query = mysqli_query($con, "INSERT INTO `shippingaddressmapper` (`users_userID`, `shippingaddresses_shippingaddressID`, `address_order`) VALUES (2, $userid, 2),");
		} 
	}
	header('Location: addressManager.php');
	
?>