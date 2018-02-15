<!DOCTYPE html>
<html>

<?php
	include("functions/functions.php");
?>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="styles/new_style.css" media="all" </link>
  <h1 align="center"> Monsta Codes </h1>
</head>

<body>
  <div id="register" class="login_div">
    <form>
      <label for="first_name"><b>First Name</b></label>
      <input type="text" name="first_name" required placeholder="First Name"/>

      <label for="last_name"><b>Last name</b></label>
      <input type="text" name="last_name" required placeholder="Last Name"/>

      <label for="email"><b>Email</b></label>
      <input type="text" name="email" required placeholder="someemail@emails.com"/>

      <label for="con_email"><b>Re-enter Email</b></label>
      <input type="text" name="con_email" required placeholder="someemail@emails.com"/>

      <label for="password"><b>Password</b></label>
      <input type="text" name="password" required/>

      <label for="re_password"><b>Re-enter Password</b></label>
      <input type="text" name="re_password" required/>

      <button class="signup_button"> Submit </button>
    </form>
  </div>
</body>
</html>