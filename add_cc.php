<?php
session_start();
$errors = array();
    function filter($date)
    {
        return trim(htmlspecialchars($date));
    }

	include('functions/functions.php');

    $cc_name = filter($_POST['cc_name']);
    $cc_number = filter($_POST['cc_number']);
    $cc_exp_date = filter($_POST['cc_exp_date']);
    $cc_sec_code = filter($_POST['cc_sec_code']);
    $id = $_POST['ccID'];
	$userid = $_SESSION['SESS_USERID'];

	if (!(preg_match("/^[a-zA-Z]+$/", $cc_name))) {
		array_push($errors, "Please enter a valid name ");
	}

	if (!(preg_match("/^[0-9]{4}[0-9]{4}[0-9]{4}[0-9]{4}$/", $cc_number))) {
		array_push($errors, "Please enter a valid 16 digit credit card number ");
	}

	if (!(preg_match("/^\d{1,2}\/\d{2}$/", $cc_exp_date))) {
		array_push($errors, "Please enter a valid date in the format mm/yy ");
	}

	if (!(preg_match("/^[0-9]{3}$/", $cc_sec_code))) {
		array_push($errors, "Please enter a valid security code ");
	}
	
	if(isset($_SESSION['SESS_USERID']) && count($errors) == 0) {
		if(!empty ($cc_name))
		{
			$query = mysqli_query($con, "UPDATE credit_cards SET cc_name = '$cc_name' WHERE cc_ID=$id");
		}
		if(!empty ($cc_number))
		{
			$query = mysqli_query($con, "UPDATE credit_cards SET cc_number = '$cc_number' WHERE cc_ID=$id");
		}
		if(!empty ($cc_exp_date))
		{
			$query = mysqli_query($con, "UPDATE credit_cards SET exp_date = '$cc_exp_date' WHERE cc_ID=$id");
		}
		if(!empty ($cc_sec_code))
		{
			$query = mysqli_query($con, "UPDATE credit_cards SET sec_code = '$cc_sec_code' WHERE cc_ID=$id");
		}
	}
	
?>