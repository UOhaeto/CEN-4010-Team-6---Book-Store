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
  <h1 align="center"> <a href="index.php"><img src="images/Book Monster.png" alt="home_logo" width="250" height="80"></a> </h1> <!-- TODO Possibly replace with site logo -->
</head>

<body>
  <div id="register" class="login_div">
    <form class="user" action="register.php" method="post" enctype="multipart/form-data">

			<?php include('errors.php'); ?>
      <label for="first_name"><b>First Name</b></label>
			
      <input type="text" name="first_name" required placeholder="First Name"/>

      <label for="last_name"><b><font face="helvetica">Last Name</font></b></label>
      <input class="user" type="text" name="last_name" required placeholder="Last Name"/>

      <label for="email"><b><font face="helvetica">Email Address</font></b></label>
      <input class="user" type="text" name="email" required placeholder="someemail@emails.com"/>

      <label for="con_email"><b><font face="helvetica">Re-enter Email Address</font></b></label>
      <input class="user" type="text" name="con_email" required placeholder="someemail@emails.com"/>

      <label for="con_email"><b><font face="helvetica">Password</font></b></label>
      <input type="password" name="password" required/>

      <<label for="con_email"><b><font face="helvetica">Re-enter Password</font></b></label>
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
