<?php
session_start();
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
	
	if(isset($_SESSION['SESS_USERID'])) {
		if ($id != "-") {
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
		else if ($id == "-") {
			if(!empty ($cc_name))
			{
				$query = mysqli_query($con, "INSERT INTO `credit_cards` (`cc_ID`, `cc_name`) VALUES (2, $cc_name)");
			}
			if(!empty ($cc_number))
			{
				$query = mysqli_query($con, "INSERT INTO `credit_cards` (`cc_number`) VALUES ($cc_number)");
			}
			if(!empty ($cc_exp_date))
			{
				$query = mysqli_query($con, "INSERT INTO `credit_cards` ('exp_date`) VALUES ($cc_exp_date)");
			}
			if(!empty ($cc_sec_code))
			{
				$query = mysqli_query($con, "INSERT INTO `credit_cards` (`sec_code`) VALUES ($cc_sec_code)");
			}

			$query = mysqli_query($con, "INSERT INTO `credit_cards_mapper` (`userID`, `cc_ID`, `cc_order`) VALUES (2, $userid, 2),");
		} 
	}
	header('Location: creditCardManager.php');
	
?>