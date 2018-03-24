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
    $id = filter($_SESSION['shpID']);
	
	if(isset($_SESSION['SESS_USERID'])) {
		if(!empty ($address))
		{
			$query = mysqli_query($con, "UPDATE shippingaddresses SET shippingStreet = '$address' WHERE shippingaddressID=2");
		}
		if(!empty ($city))
		{
			$query = mysqli_query($con, "UPDATE shippingaddresses SET shippingState = '$city' WHERE shippingaddressID=2");
		}
		if(!empty ($state))
		{
			$query = mysqli_query($con, "UPDATE shippingaddresses SET shippingCity = '$state' WHERE shippingaddressID=2");
		}
		if(!empty ($zip))
		{
			$query = mysqli_query($con, "UPDATE shippingaddresses SET shippingZip = '$zip' WHERE shippingaddressID=2");
		}
	}
	header('Location: addressManager.php');
	
?>