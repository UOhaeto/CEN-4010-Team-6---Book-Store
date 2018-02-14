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
  <div id="login" class="login_div">
    <form>
      <label for="login_email"><b>Username</b></label>
      <input type="text" name="login_email" required placeholder="Enter email"/>
      <label for="login_pass"><b>Password</b></label>
      <input type="password" name="login_pass" required placeholder="password"/>
      <button class="login_button"> Log In </button>
      <p> New user? <a href="/register.php"> Sign Up </a> </p>
    </form>
  </div>
</body>
</html>
