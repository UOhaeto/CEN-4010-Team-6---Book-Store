<?php
	include("includes/db.php");

	session_start();

	$errors = array();

	if(isset($_POST['register_user'])){
		//maybe use later.
		//$ip = getIp();

	$user_id = "4";
	$user_username = addslashes($_POST['username']);
	$user_address = addslashes($_POST['address']);
	$user_city = addslashes($_POST['city']);
	$user_state = addslashes($_POST['state']);
	$user_zip = addslashes($_POST['zip']);
	$user_nickname = addslashes($_POST['nickname']);


	//fetching user variables.
	$u_first_name = addslashes($_POST['first_name']);
	$u_last_name = addslashes($_POST['last_name']);

	$u_email = addslashes($_POST['email']);
	$u_con_email = addslashes($_POST['con_email']);

	$u_password = addslashes($_POST['password']);
	$u_re_password = addslashes($_POST['re_password']);

	//Validation between passwords.
	if ($u_password != $u_re_password) {
		array_push($errors, "The two passwords do not match");
	}



	if (!filter_var($u_email, FILTER_VALIDATE_EMAIL)) {
	    array_push($errors, "Enter a valid email");
	}


	//making sure both emails are the same.
	if ($u_email != $u_con_email) {
		array_push($errors, "The two emails do not match");
	}

/*
	$insert_u = "insert into users (fName, lName, email, password)
	values ('$u_first_name','$u_last_name','$u_con_email','$u_re_password_') ";
*/

// a user does not already exist with the same username and/or email
$user_check_query = "SELECT * FROM users WHERE username='$user_username' OR email='$u_email' LIMIT 1";
$result = mysqli_query($con, $user_check_query);
$user = mysqli_fetch_assoc($result);

if ($user) { // if user exists
	if ($user['username'] === $user_username) {
		array_push($errors, "Username already exists");
	}

	if ($user['email'] === $u_email) {
		array_push($errors, "email already exists");
	}
}

  if (count($errors) == 0) {
			$insert_u = "insert into users (userID, username, password, fName, lName, email, homeStreet, homeCity, homeZip, nickname)
			values ('$user_id','$user_username','$u_password','$u_first_name','$u_last_name','$u_email','$user_address','$user_city', '$user_zip', '$user_nickname') ";

			$run_c = mysqli_query($con, $insert_u);


			//echo $insert_book = "insert into books (book_title, author, author_bio, genre, release_date, price, year, publisher, description, quantity, rating, book_image) values ('$book_title','$author','$author_bio','$genre','$release_date','$price','$year','$publisher', '$description','$quantity', '$rating', '$book_image')";

			echo $insert_u = "insert into users (userID, username, password, fName, lName, email, homeStreet, homeCity, homeZip, nickname) values ('$user_id','$user_username','$u_password','$u_first_name','$u_last_name','$u_email','$user_address','$user_city', '$user_zip', '$user_nickname')";

			if($run_c){
				echo "<script>alert('user registered successfully!')</script>";
			}
			else{
				echo "<script>alert('could not register user :\')</script>";
			}

		}
}



?>