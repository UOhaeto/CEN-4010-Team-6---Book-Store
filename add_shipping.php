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
    $id = filter($_GET['shp_id']);
	
	if(isset($_SESSION['SESS_USERID'])) {
		if(!empty ($address))
		{
			$query = mysqli_query($con, "UPDATE shippingaddressmapper SET shippingStreet = '$address' WHERE shippingaddressID='$id'");
		}
		if(!empty ($city))
		{
			$query = mysqli_query($con, "UPDATE shippingaddressmapper SET shippingState = '$city' WHERE shippingaddressID='$id'");
		}
		if(!empty ($state))
		{
			$query = mysqli_query($con, "UPDATE shippingaddressmapper SET shippingCity = '$state' WHERE shippingaddressID='$id' ");
		}
		if(!empty ($zip))
		{
			$query = mysqli_query($con, "UPDATE shippingaddressmapper SET shippingZip = '$zip' WHERE shippingaddressID='$id'");
		}
	}
	header('Location: addressManager.php');
	
?>