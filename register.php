<!DOCTYPE html>
<html>

<?php
	include("functions/functions.php");
	include("includes/db.php")
?>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="styles/new_style.css" media="all" </link>
  <h1 align="center"> <a href="index.php">Monsta Codes</a> </h1> <!-- TODO Possibly replace with site logo -->
</head>

<body>
  <div id="register" class="login_div">
    <form class="user" action="register.php" method="post" enctype="multipart/form-data">
      <label for="first_name"><b>First Name</b></label>
      <input type="text" name="first_name" required placeholder="First Name"/>

      <label for="last_name"><b><font face="helvetica">Last Name</font></b></label>
      <input class="user" type="text" name="last_name" required placeholder="Last Name"/>

      <label for="email"><b><font face="helvetica">Email Address</font></b></label>
      <input class="user" type="text" name="email" required placeholder="someemail@emails.com"/>

      <label for="con_email"><b><font face="helvetica">Re-enter Email Address</font></b></label>
      <input class="user" type="text" name="con_email" required placeholder="someemail@emails.com"/>

      <label for="password"><b>Password</b></label>
      <input type="password" name="password" required/>

      <label for="re_password"><b>Re-enter Password</b></label>
      <input type="password" name="re_password" required/>

      <!--
			<button class="signup_button"> Submit </button>
			-->
			<input type="submit" name="register_user" value="Create Account" />
    </form>
  </div>
</body>
</html>

<?php

	if(isset($_POST['register_user'])){

	$ip = getIp();

	//fetching user variables.
	$u_first_name = addslashes($_POST['first_name']);
	$u_last_name = addslashes($_POST['last_name']);

	$u_email = addslashes($_POST['email']);
	$u_con_email = addslashes($_POST['con_email']);

	$u_password = addslashes($_POST['password']);
	$u_re_password_ = addslashes($_POST['re_password']);

	$user_id = 4;
	$user_username = "user5";
	$user_address = "123 street";
	$user_city = "Miami";
	$user_state = "Florida";
	$user_zip = "33188";
	$user_nickname = "br";

/*
	$insert_u = "insert into users (fName, lName, email, password)
	values ('$u_first_name','$u_last_name','$u_con_email','$u_re_password_') ";
*/

$insert_u = "insert into users (userID, username, password, fName, lName, email, homeStreet, homeCity, homeZip, nickname)
values ('$user_id','$user_username','$u_password','$u_first_name','$u_last_name','$u_email','$user_address','$user_city', '$user_zip', '$user_nickname') ";

	$run_c = mysqli_query($con, $insert_u);

	if($run_c){
		echo "<script>alert('user registered successfully!')</script>";
	}
	else{
		echo "<script>alert('could not register user :\')</script>";
	}

}



?>
