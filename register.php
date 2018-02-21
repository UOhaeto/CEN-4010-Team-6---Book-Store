<!DOCTYPE html>
<html>

<?php
	include("functions/functions.php");
	include("includes/db.php");
	include('register_server.php');
?>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="styles/new_style.css" media="all" </link>
  <h1 align="center"> Monsta Codes </h1>
</head>

<body>
  <div id="register" class="login_div">
    <form action="register.php" method="post" enctype="multipart/form-data">

			<?php include('errors.php'); ?>
      <label for="first_name"><b>First Name</b></label>
      <input type="text" name="first_name" required placeholder="First Name"/>

      <label for="last_name"><b>Last name</b></label>
      <input type="text" name="last_name" required placeholder="Last Name"/>

      <label for="email"><b>Email</b></label>
      <input type="text" name="email" required placeholder="someemail@emails.com"/>

      <label for="con_email"><b>Re-enter Email</b></label>
      <input type="text" name="con_email" required placeholder="someemail@emails.com"/>

      <label for="password"><b>Password</b></label>
      <input type="password" name="password" required/>

      <label for="re_password"><b>Re-enter Password</b></label>
      <input type="password" name="re_password" required/>


			<label for="username"><b>Username</b></label>
			<input type="text" name="username" required placeholder="Username"/>

			<label for="address"><b>Address</b></label>
			<input type="text" name="address" required placeholder="Address"/>

			<label for="city"><b>City</b></label>
			<input type="text" name="city" required placeholder="City"/>

			<label for="state"><b>State</b></label>
			<input type="text" name="state" required placeholder="State"/>

			<label for="zip"><b>Zip</b></label>
			<input type="text" name="zip" required placeholder="Zip"/>

			<label for="nickname"><b>Nickname</b></label>
			<input type="text" name="nickname" required placeholder="Nickname"/>

      <!--
			<button class="signup_button"> Submit </button>
			-->
			<input type="submit" name="register_user" value="Create Account" />
    </form>
  </div>
</body>
</html>
